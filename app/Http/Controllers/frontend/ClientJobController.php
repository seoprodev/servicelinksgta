<?php


namespace App\Http\Controllers\frontend;


use App\Helpers\FakerURL;
use App\Http\Controllers\Controller;
use App\Models\Job;

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
}