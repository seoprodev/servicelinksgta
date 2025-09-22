<?php


namespace App\Http\Controllers\admin;


use App\Helpers\FakerURL;
use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::latest()->get();
        return view('admin.tickets.index', compact('tickets'));
    }

    public function show($id)
    {
        $ticket = Ticket::with('user')->findOrFail(FakerURL::id_d($id));
        return view('admin.tickets.show', compact('ticket'));
    }

    public function edit($id)
    {
        $ticket = Ticket::findOrFail(FakerURL::id_d($id));
        return view('admin.tickets.edit', compact('ticket'));
    }

    public function update(Request $request, $id)
    {
        $ticket = Ticket::findOrFail(FakerURL::id_d($id));

        $request->validate([
            'subject' => 'required|string|max:255',
            'status'  => 'required|in:open,complete,pending',
            'message' => 'nullable|string',
        ]);

        $ticket->update([
            'subject' => $request->subject,
            'status'  => $request->status,
            'message' => $request->message,
        ]);

        return redirect()->route('admin.manage.ticket')->with('success', 'Ticket updated successfully.');
    }

    public function destroy($id)
    {
        $ticket = Ticket::findOrFail(FakerURL::id_d($id));
        $ticket->delete();

        return redirect()->route('admin.manage.ticket')->with('success', 'Ticket deleted successfully.');
    }

}