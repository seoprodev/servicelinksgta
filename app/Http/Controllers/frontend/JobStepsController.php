<?php


namespace App\Http\Controllers\frontend;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Country;
use App\Models\Job;
use App\Models\Priority;
use App\Models\PropertyType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class JobStepsController extends Controller
{
    public function postJobCategory(Request $request)
    {
        $request->validate([
            'categoryId' => 'required|exists:categories,id',
        ]);

        $category = Category::findOrFail($request->categoryId);


        return redirect()->route('front.post.job', $category->slug);
    }

    public function postJob($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        return view('frontend.post-a-job', compact('category'));
    }

//    public function validatePostalCode(Request $request)
//    {
//        $request->validate([
//            'postal_code' => 'required|string|max:10'
//        ]);
//
//        // Canada ke test postal codes (sample)
//        $validPostalCodes = [
//            'M5V3L9' => ['city' => 'Toronto', 'country' => 'Canada'],
//            'H3A1B9' => ['city' => 'Montreal', 'country' => 'Canada'],
//            'V6B3K9' => ['city' => 'Vancouver', 'country' => 'Canada'],
//            'T5J3N5' => ['city' => 'Edmonton', 'country' => 'Canada'],
//            'R3C4T3' => ['city' => 'Winnipeg', 'country' => 'Canada'],
//        ];
//
//        $postal = strtoupper(str_replace(' ', '', $request->postal_code)); // normalize (remove spaces, uppercase)
//
//        if (array_key_exists($postal, $validPostalCodes)) {
//            return response()->json([
//                'success' => true,
//                'city'    => $validPostalCodes[$postal]['city'],
//                'country' => $validPostalCodes[$postal]['country'],
//            ]);
//        }
//
//        return response()->json([
//            'success' => false,
//            'message' => 'Invalid Canadian postal code.'
//        ]);
//    }


    public function validatePostalCode(Request $request)
    {
        $request->validate([
            'postal_code' => 'required|string|max:10'
        ]);

        $postal = strtoupper(str_replace(' ', '', $request->postal_code));

        $country = Country::whereRaw("REPLACE(UPPER(postal_code), ' ', '') = ?", [$postal])->first();

        if ($country) {
            return response()->json([
                'success' => true,
                'city'    => $country->city,
                'state'   => $country->state,
                'country' => $country->country,
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Postal code not found in our database.'
        ]);
    }

    public function getSubcategories(Request $request)
    {
        $request->validate([
            'category_slug' => 'required|exists:categories,slug',
        ]);

        $category = Category::where('slug', $request->category_slug)->first();

        $subCategories = $category->subcategories()->select('id', 'name')->get();

        return response()->json([
            'success' => true,
            'data'    => $subCategories
        ]);
    }

    public function getPropertyTypes()
    {
        $types = PropertyType::where('status', 1)->get(['id', 'name']);
        return response()->json([
            'success' => true,
            'data' => $types
        ]);
    }

    public function getPriorities()
    {
        $priorities = Priority::where('status', 1)
            ->orderByDesc('id')
            ->get(['id','name']);
        return response()->json([
            'success' => true,
            'data' => $priorities
        ]);
    }

    public function uploadTemp(Request $request)
    {
        if ($request->hasFile('job_file')) {
            $file = $request->file('job_file');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/job/files'), $filename);

            return response()->json([
                'success' => true,
                'path' => 'uploads/job/files/' . $filename // relative path
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'No file uploaded.'
        ], 400);
    }

    public function submitJobFormData(Request $request)
    {
        $request->validate([
            'postal_code'   => 'required|string',
            'job_category'  => 'required|exists:categories,slug',
            'subcategory'   => 'nullable|exists:sub_categories,id',
            'property'      => 'nullable|string',
            'priority'      => 'nullable|exists:priorities,id',
            'email'         => 'required|email',
            'full_name'     => 'required|string|max:191',
            'password'      => 'required|min:6',
            'phone'         => 'nullable|string|max:20',

        ]);

        DB::beginTransaction();

        try {

            $fullName = trim($request->full_name);
            $nameParts = explode(' ', $fullName, 2); // 2 parts max
            $firstName = $nameParts[0] ?? '';
            $lastName  = $nameParts[1] ?? '';



            $user = User::firstOrCreate(
                ['email' => $request->email],
                [
                    'name'     => $fullName,
                    'user_type'     => 'client',
                    'password' => Hash::make($request->password),
                    'is_active' => '1',
                ]
            );

            $user->profile()->updateOrCreate(
                ['user_id' => $user->id],
                [
                    'phone'      => $request->phone,
                    'first_name' => $firstName,
                    'last_name'  => $lastName,
                ]
            );


            // Postal codes (Canada only)
//            $validPostalCodes = [
//                'M5V3L9' => ['city' => 'Toronto', 'country' => 'Canada'],
//                'H3A1B9' => ['city' => 'Montreal', 'country' => 'Canada'],
//                'V6B3K9' => ['city' => 'Vancouver', 'country' => 'Canada'],
//                'T5J3N5' => ['city' => 'Edmonton', 'country' => 'Canada'],
//                'R3C4T3' => ['city' => 'Winnipeg', 'country' => 'Canada'],
//            ];

//            $city = $validPostalCodes[$request->postal_code]['city'] ?? null;
//            $country = $validPostalCodes[$request->postal_code]['country'] ?? null;


            $postal = strtoupper(str_replace(' ', '', $request->postal_code));
            $countryData = Country::whereRaw("REPLACE(UPPER(postal_code), ' ', '') = ?", [$postal])->first();
            $city    = $countryData->city    ?? null;
            $country = $countryData->country ?? null;

            $category = Category::where('slug', $request->job_category)->first();
            $propertyType = PropertyType::findOrFail($request->property);
            $jobPriority = Priority::findOrFail($request->priority);

            $title = "Looking for {$category->name} services for my {$propertyType->name} in {$city}";

            $job = Job::create([
                'user_id'        => $user->id,
                'title'        => $title,
                'category_id'    => $category->id ?? null,
                'sub_category_id'=> $request->subcategory,
                'property_type'  => $propertyType->name,
                'priority'       => $jobPriority->name,
                'job_files'      => $request->job_files ?? [],
                'postal_code'    => $request->postal_code,
                'description'    => $request->description,
                'city'           => $city,
                'country'        => $country,
                'status'         => 'active',
                'is_active'      => 1,
            ]);

            DB::commit();
            Auth::login($user);
            return response()->json([
                'success' => true,
                'message' => 'Job submitted successfully!',
                'redirect_url' => route('front.home')
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong: ' . $e->getMessage()
            ], 500);
        }
    }




}