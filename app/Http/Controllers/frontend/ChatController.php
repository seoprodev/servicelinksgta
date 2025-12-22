<?php

namespace App\Http\Controllers\Frontend;

use App\Events\MessageSent;
use App\Helpers\NotificationHelper;
use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;


class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $authUser = auth()->user();

        $chatUsers = User::whereIn('id', function ($q) use ($authUser) {
            $q->select('receiver_id')
                ->from('messages')
                ->where('user_id', $authUser->id);
        })
            ->orWhereIn('id', function ($q) use ($authUser) {
                $q->select('user_id')
                    ->from('messages')
                    ->where('receiver_id', $authUser->id);
            })
            ->where('id', '!=', $authUser->id)
            ->get();


        if ($authUser->user_type === 'client'){
            return view('frontend.user.chat-index', compact('chatUsers'));

        }elseif($authUser->user_type === 'provider'){
            return view('frontend.provider.chat', compact('chatUsers'));
        }elseif($authUser->user_type === 'admin'){
            return view('admin.chat.index', compact('chatUsers'));
        }

    }
    
    

    public function show($userId)
    {
        $authUser = auth()->user();
        $otherUser = User::findOrFail($userId);

        return view('frontend.user.chat', compact('otherUser'));
    }

    public function messages($userId)
    {
        $authUser = auth()->user();

        $messages = Message::with('sender')
            ->where(function ($q) use ($authUser, $userId) {
                $q->where('user_id', $authUser->id)
                    ->where('receiver_id', $userId);
            })
            ->orWhere(function ($q) use ($authUser, $userId) {
                $q->where('user_id', $userId)
                    ->where('receiver_id', $authUser->id);
            })
            ->orderBy('created_at')
            ->get();

        return response()->json($messages);
    }

    public function send(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:2000',
            'receiver_id' => 'required|exists:users,id',
        ]);

        $authUser = $request->user();

        $abusiveWords = config('abusive_words.list');

        $lowerMessage = strtolower($request->message);
        foreach ($abusiveWords as $word) {
//            if (str_contains($lowerMessage, $word)) {
//                return response()->json([
//                    'error' => 'Your message contains inappropriate language.'
//                ], 422);
//            }

            if (preg_match("/\b" . preg_quote($word, '/') . "\b/i", $lowerMessage)) {
                return response()->json([
                    'error' => "Your message contains inappropriate language."
                ], 422);
            }

        }

        $message = Message::create([
            'user_id'     => $authUser->id,
            'receiver_id' => $request->receiver_id,
            'body'        => $request->message,
            'read'        => false,
        ]);

        broadcast(new MessageSent($message))->toOthers();




        $receiver = User::findOrFail($request->receiver_id);

        if ($receiver->user_type == 'provider') {
            $url = route('provider.chat.index');
        } elseif($receiver->user_type == 'client') {
            $url = route('chat.index');
        }elseif($receiver->user_type == 'admin'){
            $url = route('admin.chat.index');
        }

        NotificationHelper::create(
            $request->receiver_id,
            'new_message',
            "You received a new message from {$authUser->name}",
            $url,
            "New Message"
        );

        return response()->json($message);
    }


    public function searchProvider(Request $request)
    {
        $q = $request->input('q');

        $client = auth()->user();

        $users = $client->providers()
            ->where('users.name', 'like', "%$q%")
            ->with('profile')
            ->limit(10)
            ->get(['users.id', 'users.name']);

        $data = $users->map(function ($user) {
            return [
                'id'     => $user->id,
                'name'   => $user->name,
                'avatar' => $user->profile && $user->profile->avatar
                    ? asset($user->profile->avatar)
                    : asset('frontend-assets/img/user-default.jpg'),
            ];
        });

        return response()->json($data);
    }

    public function searchClient(Request $request)
    {
        $q = $request->input('q');

        $provider = auth()->user();

        $users = $provider->clients()
            ->where('users.name', 'like', "%$q%")
            ->with('profile')
            ->limit(10)
            ->get(['users.id', 'users.name']);

        $data = $users->map(function ($user) {
            return [
                'id'     => $user->id,
                'name'   => $user->name,
                'avatar' => $user->profile && $user->profile->avatar
                    ? asset($user->profile->avatar)
                    : asset('frontend-assets/img/user-default.jpg'),
            ];
        });

        return response()->json($data);
    }

    public function adminSearchUser(Request $request)
    {
        $q = trim($request->input('q'));

        $query = User::query()
            ->where('name', 'like', "%{$q}%")
            ->with('profile')
            ->limit(10);

        $users = $query->get(['id', 'name', 'user_type']);

        $data = $users->map(function ($user) {
            return [
                'id'       => $user->id,
                'name'     => $user->name,
                'type'     => ucfirst($user->user_type),
                'avatar'   => $user->profile && $user->profile->avatar
                    ? asset($user->profile->avatar)
                    : asset('frontend-assets/img/user-default.jpg'),
            ];
        });

        return response()->json($data);
    }





//    public function startConversation(Request $request)
//    {
//        $request->validate([
//            'user_id' => 'required|exists:users,id',
//        ]);
//
//        $authUser = auth()->user();
//        $otherUserId = $request->user_id;
//
//        $conversation = Conversation::whereHas('users', function ($q) use ($authUser) {
//            $q->where('user_id', $authUser->id);
//        })
//            ->whereHas('users', function ($q) use ($otherUserId) {
//                $q->where('user_id', $otherUserId);
//            })
//            ->first();
//
//        if (! $conversation) {
//            $otherUser = User::findOrFail($otherUserId);
//
//            $conversation = Conversation::create([
//                'title' => 'Chat between ' . $authUser->name . ' and ' . $otherUser->name,
//            ]);
//
//            $conversation->users()->attach([$authUser->id, $otherUserId]);
//        }
//
//        return response()->json([
//            'status'       => 'success',
//            'conversation' => $conversation,
//            'redirect_url' => route('chat.index', ['conversation' => $conversation->id]),
//        ]);
//    }

}
