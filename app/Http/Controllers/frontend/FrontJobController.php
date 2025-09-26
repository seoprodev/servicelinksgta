<?php


namespace App\Http\Controllers\frontend;


use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Job;
use App\Models\UserSubscription;
use Illuminate\Http\Request;

class FrontJobController extends Controller
{

    public function index(Request $request)
    {
        $activeSubscription = null;

        $query = Job::with(['category', 'subCategory'])
            ->where('is_active', 1);

        if (auth()->check()) {
            $user = auth()->user();

            $activeSubscription = UserSubscription::where('user_id', $user->id)
                ->where('is_active', 1)
                ->where('subscription_status', 'active')
                ->where('is_deleted', 0)
                ->latest()
                ->first();
        }

        if (!$activeSubscription) {
            $query->where('created_at', '<=', now()->subHours(6));
        }

//        $jobs = $query->latest()->get();

        /** --------------------------
         *  Filters
         * -------------------------- */

        // 🔹 Keyword Search (title, description)
        if ($request->filled('keywords')) {
            $keyword = $request->keywords;
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', "%{$keyword}%")
                    ->orWhere('description', 'like', "%{$keyword}%");
            });
        }

        // 🔹 Categories
        if ($request->filled('cate')) {
            $query->whereIn('category_id', $request->cate);
        }

        // 🔹 Location (city or country)
        if ($request->filled('location')) {
            $query->where(function ($q) use ($request) {
                $q->where('city', 'like', "%{$request->location}%")
                    ->orWhere('country', 'like', "%{$request->location}%");
            });
        }

        // 🔹 Sorting
        if ($request->filled('sortprice')) {
            if ($request->sortprice === 'highl') {
                $query->orderBy('budget', 'desc');
            } else {
                $query->orderBy('budget', 'asc');
            }
        } else {
            $query->latest();
        }

        $jobs = $query->get();

        // 🔹 Extra data for filter form
        $categories = Category::all();
        $locations = Job::select('city')->distinct()->get();

//        dd($locations);

        return view('frontend.service', compact('jobs', 'categories', 'locations'));

    }


}