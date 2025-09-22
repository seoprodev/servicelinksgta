<?php


namespace App\Http\Controllers\frontend;


use App\Helpers\FakerURL;
use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{

    public function index()
    {
        $tickets = Ticket::where('user_id', auth()->id())
            ->latest()
            ->get();

        if (auth()->user()->user_type == 'provider'){
            return view('frontend.provider.tickets.index', compact('tickets'));
        }
        return view('frontend.user.tickets.index', compact('tickets'));
    }



    public function create()
    {
        if (auth()->user()->user_type == 'provider'){
            return view('frontend.provider.tickets.create');
        }
        return view('frontend.user.tickets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject'      => 'required|string|max:255',
            'priority'     => 'required|in:low,medium,high',
            'message'      => 'required|string',
            'attachments.*'=> 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:4096',
        ]);

        $files = [];
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/tickets'), $filename);
                $files[] = 'uploads/tickets/' . $filename;
            }
        }

        Ticket::create([
            'user_id'     => auth()->id(),
            'subject'     => $request->subject,
            'priority'    => $request->priority,
            'message'     => $request->message,
            'attachments' => json_encode($files),
            'status'      => 'pending',
        ]);

        return redirect()->back()->with('success', 'Ticket created successfully!');
    }

    public function destroy($id)
    {
        $ticket = Ticket::where('user_id', auth()->id())->findOrFail(FakerURL::id_d($id));

        // delete files if exist
        if ($ticket->attachments) {
            foreach (json_decode($ticket->attachments, true) as $file) {
                $path = public_path($file);
                if (file_exists($path)) {
                    unlink($path);
                }
            }
        }

        $ticket->delete();

        return redirect()->back()->with('success', 'Ticket deleted successfully!');
    }


}