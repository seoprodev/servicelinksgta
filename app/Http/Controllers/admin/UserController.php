<?php

namespace App\Http\Controllers\admin;

use App\Helpers\FakerURL;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::whereIn('user_type', ['provider', 'client'])
            ->where('is_deleted', 0) // only active (not deleted) users
            ->with('profile')
            ->latest()
            ->get();

        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|string|email|unique:users,email',
            'password'   => 'required|string|min:6',
            'user_type'  => 'required|string|in:client,provider',
            'phone'      => 'nullable|string|max:20',
            'address'    => 'nullable|string|max:255',
            'bio'        => 'nullable|string',
            'avatar'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        // Create User
        $user = User::create([
            'name'      => $data['first_name'] . ' ' . $data['last_name'],
            'email'     => $data['email'],
            'password'  => Hash::make($data['password']),
            'user_type' => $data['user_type'],
            'is_active' => 1,
        ]);

        // Handle Avatar Upload
        $avatarPath = null;
        if ($request->hasFile('avatar')) {
            $file     = $request->file('avatar');
            $filename = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
            $destinationPath = public_path('uploads/user-profiles');
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }
            $file->move($destinationPath, $filename);
            $avatarPath = 'uploads/user-profiles/'.$filename;
        }

        // Create Profile
        UserProfile::create([
            'user_id'    => $user->id,
            'first_name' => $data['first_name'],
            'last_name'  => $data['last_name'],
            'phone'      => $data['phone'] ?? null,
            'address'    => $data['address'] ?? null,
            'bio'        => $data['bio'] ?? null,
            'avatar'     => $avatarPath,
        ]);

        return redirect()->route('admin.manage.user')
            ->with('success', 'User created successfully!');
    }



    public function show($id)
    {

        $user = User::with('profile')->findOrFail(FakerURL::id_d($id));
        return view('admin.user.show', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::with('profile')->findOrFail($id);

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email,' . $user->id,
            'user_type'  => 'required|string|in:client,provider',
            'phone'      => 'nullable|string|max:20',
            'address'    => 'nullable|string|max:255',
            'bio'        => 'nullable|string',
            'avatar'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'is_active'  => 'required|boolean',
        ]);

        $data = $request->all();

        // Update user table
        $user->update([
            'email'     => $data['email'],
            'user_type' => $data['user_type'],
            'is_active' => $data['is_active'],
        ]);

        // Handle avatar upload
        if ($request->hasFile('avatar')) {
            $file     = $request->file('avatar');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('uploads/user-profiles');

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            // Delete old avatar if exists
            if ($user->profile->avatar && file_exists(public_path($user->profile->avatar))) {
                unlink(public_path($user->profile->avatar));
            }

            $file->move($destinationPath, $filename);
            $data['avatar'] = 'uploads/user-profiles/' . $filename;
        } else {
            unset($data['avatar']); // if no new avatar uploaded
        }

        // Update profile
        $user->profile->update([
            'first_name' => $data['first_name'],
            'last_name'  => $data['last_name'],
            'phone'      => $data['phone'] ?? null,
            'address'    => $data['address'] ?? null,
            'bio'        => $data['bio'] ?? null,
            'avatar'     => $data['avatar'] ?? $user->profile->avatar,
        ]);

        return redirect()->route('admin.manage.user')->with('success', 'User updated successfully!');
    }

    public function edit($id)
    {
        $user = User::with('profile')->findOrFail(FakerURL::id_d($id));
        return view('admin.user.edit', compact('user'));
    }

    public function destroy($id)
    {
        $package = User::where('id', FakerURL::id_d($id))
            ->where('is_deleted', 0)
            ->firstOrFail();

        $package->update(['is_deleted' => 1]);

        return redirect()->route('admin.manage.user')->with('success', 'Package deleted successfully.');
    }
}
