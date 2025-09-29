<?php


namespace App\Http\Controllers\frontend;


use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ClientReviewController extends Controller
{

    public function index()
    {
        $client = auth()->user();

        $reviews = Review::where('client_id', $client->id)
            ->with('provider')
            ->latest()
            ->get();

        return view('frontend.user.review.index', compact('reviews'));
    }

    public function create()
    {
        $client = auth()->user();

        $providers = $client->providers()->get();

        return view('frontend.user.review.create', compact('providers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'provider_id' => 'required|exists:users,id',
            'rating'      => 'required|integer|min:1|max:5',
            'title'       => 'required|string|max:255',
            'message'     => 'required|string',
            'attachments.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048'
        ]);

        $client = auth()->user();

        // File upload handle
        $attachments = [];
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $filename = time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
                $file->move(public_path('uploads/reviews/attachments'), $filename);
                $attachments[] = 'uploads/reviews/attachments/'.$filename;
            }
        }

        // Save review
        $review = Review::create([
            'client_id'   => $client->id,
            'provider_id' => $request->provider_id,
            'rating'      => $request->rating,
            'title'       => $request->title,
            'message'     => $request->message,
            'attachments' => !empty($attachments) ? json_encode($attachments) : null,
        ]);

        return redirect()->route('client.review.index')
            ->with('success', 'Review submitted successfully.');
    }

}