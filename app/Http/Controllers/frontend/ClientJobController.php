<?php


namespace App\Http\Controllers\frontend;


use App\Helpers\FakerURL;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Job;
use App\Models\Priority;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class ClientJobController extends Controller
{
    public function myJobs()
    {
        $userJobs = Job::where('user_id', auth()->id())->latest()->get();
        return view('frontend.user.client-jobs', compact('userJobs'));
    }

    public function myJobShow($id)
    {
        $userJob = Job::with('user', 'category')->findOrFail(FakerURL::id_d($id));
//        dd($userJob);
        return view('frontend.user.job-detail', compact('userJob'));
    }

    public function createJob()
    {

        $jobCategories = Category::where(['is_active' => 1, 'is_deleted' => '0'])->get();
        $propertyType = PropertyType::get();
        $priority = Priority::get();

        return view('frontend.user.create-job', compact('jobCategories', 'propertyType', 'priority'));

    }

    public function getSubcategories($id)
    {

        $category = Category::where('id', $id)->first();

        $subcategories = $category->subcategories()->select('id', 'name')->get();


        return response()->json($subcategories);
    }

    public function storeJob(Request $request)
    {
        $request->validate([
            'title'           => 'required|string|max:255',
            'category_id'     => 'required|exists:categories,id',
            'sub_category_id' => 'nullable|exists:categories,id',
            'property_type'   => 'required|string|max:100',
            'priority'        => 'nullable|string|max:100',
            'postal_code'     => 'required|string',
            'description'     => 'nullable|string',
            'job_file.*'      => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:4096',
        ]);

        // Postal Code Mapping
        $validPostalCodes = [
            'M5V3L9' => ['city' => 'Toronto', 'country' => 'Canada'],
            'H3A1B9' => ['city' => 'Montreal', 'country' => 'Canada'],
            'V6B3K9' => ['city' => 'Vancouver', 'country' => 'Canada'],
            'T5J3N5' => ['city' => 'Edmonton', 'country' => 'Canada'],
            'R3C4T3' => ['city' => 'Winnipeg', 'country' => 'Canada'],
        ];

        $postalCode = strtoupper(str_replace(' ', '', $request->postal_code));
        $city = $validPostalCodes[$postalCode]['city'] ?? null;
        $country = $validPostalCodes[$postalCode]['country'] ?? null;

        if (!$city || !$country) {
            return back()->withErrors(['postal_code' => 'Invalid postal code'])->withInput();
        }

        // Upload files
        $files = [];
        if ($request->hasFile('job_file')) {
            foreach ($request->file('job_file') as $file) {
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/job/files'), $filename);
                $files[] = 'uploads/job/files/' . $filename;
            }
        }

        // Save Job
        Job::create([
            'user_id'         => auth()->id(),
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

        return redirect()->back()->with('success', 'Job posted successfully!');
    }
}