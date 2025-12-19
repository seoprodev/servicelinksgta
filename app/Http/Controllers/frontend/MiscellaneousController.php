<?php


namespace App\Http\Controllers\frontend;


use App\Helpers\FakerURL;
use App\Helpers\NotificationHelper;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\ContactUs;
use App\Models\Notification;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MiscellaneousController extends Controller
{
    public function contactSubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'message' => 'required|string|max:2000',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $contact = ContactUs::create($validator->validated());

        NotificationHelper::create(
            1,
            'contact_message',
            "New contact message from {$contact->name}",
            route('admin.contact.show', $contact->faker_id)
        );

        return response()->json(['success' => 'Thank you for your message. We will contact you soon.']);
    }

    public function storeSubscriber(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subscriber_email' => 'required|email|unique:subscribers,email',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'errors' => $validator->errors()
            ]);
        }

        Subscriber::create([
            'email' => $request->subscriber_email,
        ]);

        return response()->json([
            'status' => 1,
            'message' => 'Thank you for subscribing!'
        ]);
    }

    public function contactIndex()
    {
        $contacts = ContactUs::latest()->get();
        return view('admin.contact.index', compact('contacts'));
    }

    public function contactShow($id)
    {
        $contact = ContactUs::findOrFail(FakerURL::id_d($id));

        if (!$contact->is_view) {
            $contact->is_view = 1;
            $contact->save();
        }

        return view('admin.contact.show', compact('contact'));
    }

    public function contactDestroy($id)
    {
        $contact = ContactUs::findOrFail(FakerURL::id_d($id));
        $contact->delete();

        return redirect()->route('admin.contact.index')->with('success', 'Message deleted successfully.');
    }

    public function indexSubscriber()
    {
        $subscribers = Subscriber::latest()->get();
        return view('admin.subscriber.index', compact('subscribers'));
    }

    public function destroySubscriber($id)
    {
        $subscriber = Subscriber::findOrFail(FakerURL::id_d($id));
        $subscriber->delete();

        return redirect()->route('admin.subscriber.index')->with('success', 'Subscriber deleted successfully.');
    }

    public function frontendBlogIndex()
    {
        $blogs = Blog::where('is_active', '1')->latest()->get();
        return view('frontend.blog', compact('blogs'));
    }

    public function frontendBlogDetail($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        $relatedBlogs = Blog::where('id', '!=', $blog->id)
            ->latest()
            ->take(3)
            ->get();

        return view('frontend.blog-detail', compact('blog', 'relatedBlogs'));
    }


    public function notifications()
    {
        $user = Auth::user();
        $notifications = NotificationHelper::all($user->id);
        if ($user->user_type == 'admin'){
            return view('admin.notification.index', compact('notifications'));

        }elseif($user->user_type == 'provider'){

            return view('frontend.provider.notification.index', compact('notifications'));
        }elseif ($user->user_type == 'client'){
            return view('frontend.user.notification.index', compact('notifications'));

        }else{
            return abort(404);
        }
    }

    public function markAllNotifications()
    {
        $userId = Auth::id();
        NotificationHelper::markAllAsRead($userId);
        return redirect()->back()->with('success', 'All notifications marked as read.');
    }


    public function readNotification($id)
    {
        $notification = Notification::findOrFail($id);
        NotificationHelper::markAsRead($notification->id);

        if ($notification->url){

            return redirect($notification->url ?? route('admin.dashboard'));
        }else{
            return redirect()->back();
        }
    }

    public function NotificationDelete($id)
    {
        $notification = Notification::find($id);

        if (!$notification) {
            return redirect()->back()->with('error', 'Notification not found.');
        }

        $notification->delete();

        return redirect()->back()->with('success', 'Notification deleted successfully.');
    }



}