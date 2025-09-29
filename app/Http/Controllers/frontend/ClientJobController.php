<?php


namespace App\Http\Controllers\frontend;


use App\Helpers\FakerURL;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Country;
use App\Models\Job;
use App\Models\Priority;
use App\Models\PropertyType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientJobController extends Controller
{
    public function clientDashboardIndex()
    {
        $user = Auth::user();

        $totalJobs = Job::where('user_id', $user->id)->count();
        $activeJobs = Job::where('user_id', $user->id)->where('status', 'active')->count();
        $completedJobs = Job::where('user_id', $user->id)->where('status', 'completed')->count();

        $recentJobs = Job::where('user_id', $user->id)
            ->latest()
            ->take(3)
            ->get();

        return view('frontend.user.dashboard', compact(
            'user',
            'totalJobs',
            'activeJobs',
            'completedJobs',
            'recentJobs'
        ));
    }
    
    
    public function myJobs()
    {
        $userJobs = Job::where('user_id', auth()->id())->latest()->get();
        return view('frontend.user.job.index', compact('userJobs'));
    }

    public function myJobShow($id)
    {
        $userJob = Job::with('user', 'category')->findOrFail(FakerURL::id_d($id));
        return view('frontend.user.job.detail', compact('userJob'));
    }

    public function createJob()
    {

        $jobCategories = Category::where(['is_active' => 1, 'is_deleted' => '0'])->get();
        $propertyType = PropertyType::get();
        $priority = Priority::get();

        return view('frontend.user.job.create', compact('jobCategories', 'propertyType', 'priority'));

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
            'budget'          => 'required|string|max:100',
            'postal_code'     => 'required|string',
            'description'     => 'nullable|string',
            'job_file.*'      => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:4096',
        ]);

        $postalCode = strtoupper(str_replace(' ', '', $request->postal_code));
        $countryData = Country::whereRaw("REPLACE(UPPER(postal_code), ' ', '') = ?", [$postalCode])->first();

        if (!$countryData) {
            return back()->withErrors(['postal_code' => 'Invalid postal code'])->withInput();
        }

        $city    = $countryData->city;
        $country = $countryData->country;

        $files = [];
        if ($request->hasFile('job_file')) {
            foreach ($request->file('job_file') as $file) {
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/job/files'), $filename);
                $files[] = 'uploads/job/files/' . $filename;
            }
        }

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

    public function editMyJob($id)
    {
        $job = Job::findOrFail(FakerURL::id_d($id));

        $jobCategories = Category::all();
        $propertyType = PropertyType::all();
        $priority = Priority::all();

        $subcategories = $job->category ? $job->category->subcategories : null;

        return view('frontend.user.job.edit', compact(
            'job', 'jobCategories', 'propertyType', 'priority', 'subcategories'
        ));
    }

    public function updateMyJob(Request $request, $id)
    {
        $job = Job::findOrFail(FakerURL::id_d($id));
        $data = $request->only([
            'title', 'category_id', 'sub_category_id', 'status',
            'property_type', 'priority', 'postal_code', 'description', 'budget'
        ]);

        $files = [];
        if ($request->hasFile('job_file')) {
            foreach ($request->file('job_file') as $file) {
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/job/files'), $filename);
                $files[] = 'uploads/job/files/' . $filename;
            }
        }

        $existingFiles = $job->job_files ?? [];
        $data['job_files'] = array_merge($existingFiles, $files);

        $job->fill($data);
        $job->save();

        return redirect()->route('user.job.detail', $job->faker_id)
            ->with('success', 'Job updated successfully!');
    }


    public function deleteAttachment($jobId, $index)
    {
        $job = Job::where('id', $jobId)->where('user_id', auth()->id())->firstOrFail();

        $files = $job->job_files ?? [];
        if (isset($files[$index])) {
            $filePath = public_path($files[$index]);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            unset($files[$index]);
            $job->job_files = array_values($files);
            $job->save();
        }

        return back()->with('success', 'Attachment deleted successfully.');
    }

    public function showProviderProfile($id)
    {
        $provider = User::with(['profile', 'reviews.client'])->findOrFail(FakerURL::id_d($id));
        $reviews = $provider->reviews()->with('client')->latest()->get();
        $averageRating = $reviews->avg('rating');

        return view('frontend.user.provider.detail', compact('provider', 'reviews', 'averageRating'));
    }
}