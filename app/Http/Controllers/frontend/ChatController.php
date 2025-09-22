<?php

namespace App\Http\Controllers\Frontend;

use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;


class ChatController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
//
//    // List all conversations for logged in user
//    public function index()
//    {
//        $user = auth()->user();
//
//        $conversations = $user->conversations()
//            ->with('users')
//            ->get();
//
//        if ($user->user_type === 'client'){
//            return view('frontend.user.chat-index', compact('conversations'));
//
//        }else{
//            return view('frontend.provider.chat', compact('conversations'));
//        }
//
//    }
//
//    // Show chat page for one conversation
//    public function show($conversationId)
//    {
//        return view('frontend.user.chat', compact('conversationId'));
//    }
//
//    // Fetch messages (AJAX)
//
//    public function messages($conversationId)
//    {
//        $conversation = Conversation::with('messages.user')->findOrFail($conversationId);
//
//        return response()->json($conversation->messages);
//    }
//
//
//    // Send message
//    public function send(Request $request)
//    {
//        $request->validate([
//            'message' => 'required|string|max:2000',
//            'conversation_id' => 'required|integer|exists:conversations,id',
//        ]);
//
//
//        $message = $conversation->messages()->create([
//            'user_id' => $request->user()->id,
//            'body' => $request->message,
//        ]);
//
//        $message->load('user'); // for username, avatar etc
//
//        // 🔥 Fire event for realtime broadcasting
//        broadcast(new \App\Events\MessageSent($message))->toOthers();
//
//
//        return response()->json($message);
//    }




    public function __construct()
    {
        $this->middleware('auth');
    }

    // ✅ saari chats list karni (unique users jinhon ny msg kia ya receive kia)
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

        }else{
            return view('frontend.provider.chat', compact('chatUsers'));
        }

//        return view('frontend.user.chat-index', compact('chatUsers'));
    }

    // ✅ ek user k sath chat show karna
    public function show($userId)
    {
        $authUser = auth()->user();
        $otherUser = User::findOrFail($userId);

        return view('frontend.user.chat', compact('otherUser'));
    }

    // ✅ do users k darmiyan msgs lana (ajax)
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

    // ✅ naya msg send karna
    public function send(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:2000',
            'receiver_id' => 'required|exists:users,id',
        ]);

        $authUser = $request->user();

        $message = Message::create([
            'user_id'     => $authUser->id,
            'receiver_id' => $request->receiver_id,
            'body'        => $request->message,
            'read'        => false,
        ]);

//        $message->load('sender');

        // realtime event
        broadcast(new MessageSent($message))->toOthers();

        return response()->json($message);
    }


    // User search for starting new conversation
    public function searchProvider(Request $request)
    {
        $q = $request->input('q');

        $client = auth()->user();

        $users = $client->providers()
            ->where('users.name', 'like', "%$q%")
            ->limit(10)
            ->get(['users.id', 'users.name']); // 👈 prefix added

        return response()->json($users);
    }

    public function searchClient(Request $request)
    {
        $q = $request->input('q');

        $provider = auth()->user();

        $users = $provider->clients()
            ->where('users.name', 'like', "%$q%")
            ->limit(10)
            ->get(['users.id', 'users.name']);

        return response()->json($users);
    }

    // Start new conversation
    public function startConversation(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $authUser = auth()->user();
        $otherUserId = $request->user_id;

        // Check if conversation already exists between auth user & other user
        $conversation = Conversation::whereHas('users', function ($q) use ($authUser) {
            $q->where('user_id', $authUser->id);
        })
            ->whereHas('users', function ($q) use ($otherUserId) {
                $q->where('user_id', $otherUserId);
            })
            ->first();

        // If not found → create new conversation
        if (! $conversation) {
            $otherUser = User::findOrFail($otherUserId);

            $conversation = Conversation::create([
                'title' => 'Chat between ' . $authUser->name . ' and ' . $otherUser->name,
            ]);

            // Attach both users to the pivot table
            $conversation->users()->attach([$authUser->id, $otherUserId]);
        }

        // --- Return JSON response for AJAX ---
        return response()->json([
            'status'       => 'success',
            'conversation' => $conversation,
            'redirect_url' => route('chat.index', ['conversation' => $conversation->id]),
        ]);
    }

}
