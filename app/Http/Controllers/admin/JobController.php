<?php


namespace App\Http\Controllers\admin;


use App\Helpers\FakerURL;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Job;
use App\Models\Priority;
use App\Models\PropertyType;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::where('is_deleted', '0')->with('user', 'category', 'subcategory')->latest()->get();
        return view('admin.jobs.index', compact('jobs'));
    }

    public function create()
    {
        $categories = Category::all();
        $priorities = Priority::latest()->get();
        $users = User::where('user_type', 'client')->get();
        $propertyTypes = PropertyType::latest()->get();
        return view('admin.jobs.create', compact('categories', 'priorities', 'propertyTypes', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'nullable|exists:sub_categories,id',
            'property_type' => 'nullable|string|max:255',
            'priority' => 'nullable|string|max:255',
            'job_file.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
            'description' => 'nullable|string',
            'postal_code' => 'required|string|max:10',
        ]);

//        dd($request->all());

        $postalCodeInput = str_replace(' ', '', $request->postal_code);

        $postal = DB::table('postal_codes')
            ->whereRaw("REPLACE(postal_code, ' ', '') = ?", [$postalCodeInput])
            ->where('is_active', 1)
            ->first();

        if (!$postal) {
            return back()->withInput()->withErrors(['postal_code' => 'Invalid postal code']);
        }

        $postalCode = $postal->postal_code;
        $city = $postal->city;
        $country = $postal->country;

        $files = [];
        if ($request->hasFile('job_file')) {
            foreach ($request->file('job_file') as $file) {
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/job/files'), $filename);
                $files[] = 'uploads/job/files/' . $filename;
            }
        }

        Job::create([
            'user_id'         => $request->user_id,
            'title'           => $request->title,
            'category_id'     => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'property_type'   => $request->property_type,
            'priority'        => $request->priority,
            'postal_code'     => $postalCode,
            'city'            => $city,
            'country'         => $country,
            'description'     => $request->description,
            'job_files'       => $files,
            'status'          => 'pending',
            'is_active'       => 1,
        ]);

        return redirect()->route('admin.manage.job')->with('success', 'Job created successfully!');
    }


    public function getSubcategories(Request $request)
    {
        $categoryId = $request->category_id;
        $subcategories = Subcategory::where('category_id', $categoryId)->get();
        return response()->json($subcategories);
    }

    public function getPostalCode(Request $request)
    {
        $postalCode = str_replace(' ', '', $request->postal_code);

        $postal = DB::table('postal_codes')
            ->whereRaw("REPLACE(postal_code, ' ', '') = ?", [$postalCode])
            ->where('is_active', 1)
            ->first();

        if ($postal) {
            return response()->json([
                'success' => true,
                'city' => $postal->city,
                'country' => $postal->country
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Postal Code'
            ]);
        }
    }

    public function edit($id)
    {
        $job = Job::findOrFail(FakerURL::id_d($id));
        $categories = Category::all();
        $priorities = Priority::latest()->get();
        $users = User::where('user_type', 'client')->get();
        $propertyTypes = PropertyType::latest()->get();
        $subcategories = Subcategory::where('category_id', $job->category_id)->get();

        return view('admin.jobs.edit', compact('categories', 'priorities', 'propertyTypes', 'users', 'job', 'subcategories'));
    }


    public function update(Request $request, $id)
    {
        $job = Job::findOrFail(FakerURL::id_d($id));

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'sub_category_id' => 'nullable|exists:sub_categories,id',
            'postal_code' => 'required|string|max:10',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
        ]);

        // Files
        $postal = DB::table('postal_codes')
            ->where('postal_code', preg_replace('/\s+/','',$request->postal_code))
            ->where('country', 'Canada')
            ->first();

        if (!$postal) {
            return redirect()->back()
                ->withInput()
                ->withErrors(['postal_code' => 'Invalid postal code.']);
        }

        $files = $job->job_files ?? [];
        if ($request->hasFile('job_files')) {
            foreach ($request->file('job_files') as $file) {
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/job/files'), $filename);
                $files[] = 'uploads/job/files/' . $filename;
            }
        }

        $job->update([
            'user_id' => $request->user_id,
            'title' => $request->title,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'property_type' => $request->property_type,
            'priority' => $request->priority,
            'postal_code' => preg_replace('/\s+/','',$request->postal_code),
            'city' => $postal->city,    // Auto-fill city from DB
            'country' => $postal->country, // Auto-fill country from DB
            'description' => $request->description,
            'job_files' => $files,
            'status' => $request->status ?? $job->status,
            'is_active' => $request->is_active ?? $job->is_active,
        ]);

        return redirect()->route('admin.edit.job', $job->faker_id)
            ->with('success', 'Job updated successfully.');
    }

    public function destroy($id)
    {
        $job = Job::findOrFail(FakerURL::id_d($id));
        $job->is_deleted = '1';
        $job->save();
        return redirect()->back()->with('success', 'Job Delete successfully.');
    }

    public function show($id)
    {
        $job = Job::with(['user', 'category', 'subcategory'])->findOrFail(FakerURL::id_d($id));
        return view('admin.jobs.show', compact('job'));
    }


}