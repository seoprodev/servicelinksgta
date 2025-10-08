<?php


namespace App\Http\Controllers\frontend;


use App\Helpers\FakerURL;
use App\Http\Controllers\Controller;
use App\Mail\EmailVerificationMail;
use App\Mail\SendOtpMail;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Pusher\Pusher;


class FrontAuthController extends Controller
{
    public function PusherAuth(Request $request)
    {
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            [
                'cluster' => env('PUSHER_APP_CLUSTER'),
                'useTLS' => true
            ]
        );

        return $pusher->socket_auth(
            $request->channel_name,
            $request->socket_id
        );
    }
    
    public function registerProvider(Request $request)
    {
        $request->validate([
            'company__name'          => 'required|string|max:100',
            'username'              => 'required|string|max:100',
            'email'                 => 'required|email|unique:users,email',
            'phone'                 => 'required|string|min:10|max:12',
            'password'              => 'required|min:6',
            'business_license_file' => 'required|mimes:jpg,jpeg,png,pdf|max:2048',
            'government_doc'        => 'required|mimes:jpg,jpeg,png,pdf|max:2048',
            'terms_policy'          => 'accepted',
        ]);

        $uploadPath = public_path('uploads/user/doc');
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0777, true);
        }

        $businessLicensePath = null;
        $governmentDocPath   = null;

        if ($request->hasFile('business_license_file')) {
            $businessFile = $request->file('business_license_file');
            $businessName = time().'_'.uniqid().'.'.$businessFile->getClientOriginalExtension();
            $businessFile->move($uploadPath, $businessName);
            $businessLicensePath = 'uploads/user/doc/'.$businessName;
        }

        if ($request->hasFile('government_doc')) {
            $govFile = $request->file('government_doc');
            $govName = time().'_'.uniqid().'.'.$govFile->getClientOriginalExtension();
            $govFile->move($uploadPath, $govName);
            $governmentDocPath = 'uploads/user/doc/'.$govName;
        }

        try {
            DB::beginTransaction();

            $fullName = trim($request->username);
            $nameParts = explode(' ', $fullName, 2); // 2 parts max
            $firstName = $nameParts[0] ?? '';
            $lastName  = $nameParts[1] ?? '';

            $user = User::create([
                'name'      => $request->username,
                'email'     => $request->email,
                'password'  => Hash::make($request->password),
                'user_type' => 'provider',
                'is_active' => 0,
            ]);

            $verificationCode = rand(100000, 999999);

            UserProfile::create([
                'user_id'               => $user->id,
                'first_name'            => $firstName,
                'last_name'             => $lastName,
                'company_name'          => $request->company__name,
                'username'              => $request->username,
                'phone'                 => $request->phone,
                'accept_terms'          => $request->terms_policy,
                'business_license'      => $businessLicensePath,
                'government_doc'        => $governmentDocPath,
                'verification_code'     => $verificationCode,
            ]);

            Mail::to($user->email)->send(new EmailVerificationMail($user, $verificationCode));
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Registration successful! Please check your email for verification code.',
                'redirect_url' => route('verify.email', ['token' => Crypt::encryptString($user->email)])
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            if ($businessLicensePath && file_exists(public_path($businessLicensePath))) {
                unlink(public_path($businessLicensePath));
            }
            if ($governmentDocPath && file_exists(public_path($governmentDocPath))) {
                unlink(public_path($governmentDocPath));
            }

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong! ' . $e->getMessage(),
            ], 500);
        }
    }



    public function registerUser(Request $request)
    {
        $request->validate([
            'client_first_name' => 'required|string|max:50',
            'client_last_name'  => 'required|string|max:50',
            'client_username'   => 'required|string|unique:users,name',
            'client_email'      => 'required|email|unique:users,email',
            'client_phone'      => 'required|string|min:10|unique:user_profiles,phone',
            'client_password'   => 'required|string|min:6',
        ]);

        DB::beginTransaction();
        try {

            $user = User::create([
                'name'   => $request->client_username,
                'email'      => $request->client_email,
                'password'   => Hash::make($request->client_password),
                'user_type'       => 'client',
                'is_active'  => 0,
            ]);
            $verificationCode = rand(100000, 999999);

            UserProfile::create([
                'user_id' => $user->id,
                'first_name' => $request->client_first_name,
                'last_name'  => $request->client_last_name,
                'phone'   => $request->client_phone,
                'verification_code'=> $verificationCode,
            ]);

            Mail::to($user->email)->send(new EmailVerificationMail($user, $verificationCode));

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Registration successful! Please check your email for verification code.',
                'redirect_url' => route('verify.email', ['token' => Crypt::encryptString($user->email)])
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again.',
                'error'   => $e->getMessage()
            ], 500);
        }
    }

    public function userLoginProcess(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string|min:6',
        ]);



        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            if ($user->is_active == 0) {
                Auth::logout();
                return response()->json([
                    'success' => false,
                    'message' => 'Your account is not active. Please verify your email.'
                ], 403);
            }
            if ($user->is_deleted == 1) {
                Auth::logout();
                return response()->json([
                    'success' => false,
                    'message' => 'Your account is not active. Please verify your email.'
                ], 403);
            }



            if ($user->user_type === 'provider'){
                return response()->json([
                    'success' => true,
                    'message' => 'Login successful!',
                    'redirect_url' => route('provider.dashboard')
                ]);
            }elseif($user->user_type === 'client'){
                return response()->json([
                    'success' => true,
                    'message' => 'Login successful!',
                    'redirect_url' => route('user.dashboard')
                ]);
            }else{
                Auth::logout();
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid credentials or inactive account.'
                ], 401);
            }


        }

        return response()->json([
            'success' => false,
            'message' => 'Invalid credentials or inactive account.'
        ], 401);
    }

    public function userLogout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        return redirect()->route('front.home')->with('success', 'You have been logged out successfully.');
    }

    public function sendResetOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->email)->first();

        $otp = rand(100000, 999999);

        $user->update([
            'reset_otp' => $otp,
            'reset_otp_expires_at' => now()->addMinutes(15),
        ]);

        Mail::to($user->email)->send(new SendOtpMail($user, $otp));
        return response()->json([
            'success' => true,
            'message' => 'OTP sent successfully! Please check your email.',
            'redirect_url' => route('reset.password.form', ['token' => Crypt::encryptString($user->email)])
        ]);
    }


    public function showVerifyPage($token)
    {
        try {
            $email = Crypt::decryptString($token);
        } catch (\Exception $e) {
            abort(403, 'Invalid or expired verification link.');
        }

        return view('frontend.verify-email', compact('email'));
    }

    public function verifyCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'code'  => 'required|digits:6',
        ]);

        $user = User::where('email', $request->email)->first();
        $profile = UserProfile::where('user_id', $user->id)->first();

        if ($profile && $profile->verification_code == $request->code) {
            $user->is_active = 1;
            $user->save();

            $profile->verification_code = 'email-verified';
            $profile->save();

            Auth::login($user);

            if ($user->user_type === 'provider'){
                return redirect()->route('provider.dashboard')->with('success', 'Your account has been verified successfully.');
            }else{
                return redirect()->route('user.dashboard')->with('success', 'Your account has been verified successfully.');
            }
        }

        return back()->withErrors(['code' => 'Invalid verification code.']);
    }

    public function resendCode($token)
    {
        try {
            $email = Crypt::decryptString($token);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['email' => 'Invalid or expired token.']);
        }

        $user = User::where('email', $email)->first();
        if (!$user) {
            return redirect()->back()->withErrors(['email' => 'User not found.']);
        }

        $profile = UserProfile::where('user_id', $user->id)->first();
        if (!$profile) {
            return redirect()->back()->withErrors(['profile' => 'User profile not found.']);
        }

        $newCode = rand(100000, 999999);
        $profile->verification_code = $newCode;
        $profile->save();
        
        Mail::to($user->email)->send(new EmailVerificationMail($user, $newCode));

        return redirect()->back()->with('success', 'A new verification code has been sent to your email.');
    }

    public function profileShow()
    {
        $user = Auth::user();
        return view('frontend.user.profile', compact('user'));
    }

    public function userUpdateProfile(Request $request)
    {
        $request->validate([
            'first_name'   => 'required|string|max:255',
            'last_name'    => 'required|string|max:255',
            'name'         => 'required|string|max:255',
            'phone'        => 'required|string|max:20',
            'gender'       => 'required|in:male,female',
            'dob'          => 'required|date',
            'address'      => 'required|string|max:255',
            'country'      => 'required|string|max:100',
            'state'        => 'required|string|max:100',
            'city'         => 'required|string|max:100',
            'postal_code'  => 'required|string|max:20',
        ]);

        DB::beginTransaction();

        try {
            $user = User::findOrFail($request->id);

            $user->update([
                'name'  => $request->name,
                'email' => $user->email, // readonly
            ]);

            $profile = $user->profile ?? new UserProfile(['user_id' => $user->id]);

            $profile->first_name  = $request->first_name;
            $profile->last_name   = $request->last_name;
            $profile->phone       = $request->phone;
            $profile->gender      = $request->gender;
            $profile->dob         = $request->dob;
            $profile->bio         = $request->bio;
            $profile->address     = $request->address;
            $profile->country     = $request->country;
            $profile->state       = $request->state;
            $profile->city        = $request->city;
            $profile->postal_code = $request->postal_code;

            if ($request->hasFile('avatar')) {
                $avatarName = time() . '_' . uniqid() . '.' . $request->file('avatar')->getClientOriginalExtension();
                $request->file('avatar')->move(public_path('uploads/user/profile/'), $avatarName);
                $profile->avatar = 'uploads/user/profile/' . $avatarName;
            }

            if ($request->hasFile('business_license_file')) {
                $blName = time() . '_' . uniqid() . '.' . $request->file('business_license_file')->getClientOriginalExtension();
                $request->file('business_license_file')->move(public_path('uploads/user/doc/'), $blName);
                $profile->business_license = 'uploads/user/doc/' . $blName;
            }

            if ($request->hasFile('government_doc')) {
                $idName = time() . '_' . uniqid() . '.' . $request->file('government_doc')->getClientOriginalExtension();
                $request->file('government_doc')->move(public_path('uploads/user/doc/'), $idName);
                $profile->government_doc = 'uploads/user/doc/' . $idName;
            }

            $profile->save();

            DB::commit();

            return redirect()->back()->with('success', 'Profile updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }


    public function verifyPhone($id, Request $request)
    {
        $user = User::findOrFail(FakerURL::id_d($id));
        $phone = $request->query('phone');
        return view('frontend.verify-phone', compact('user', 'phone'));
    }

    public function phoneVerified(Request $request)
    {

        $user = User::findOrFail(FakerURL::id_d($request->id));
        $user->profile->phone = $request->phone;
        $user->profile->phone_verified_at = now();
        $user->profile->save();

        return response()->json(['success' => true]);
    }

    public function ResetPasswordShow()
    {
        $user = Auth::user();
        return view('frontend.user.reset-password', compact('user'));
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password does not match']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password updated successfully!');
    }




}