<div class="card">
    <div class="card-body p-0">
        <table class="table table-striped mb-0 tickets-table">
            <thead>
            <tr>
                <th>#</th>
                <th>Subject</th>
                <th>Priority</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Attachments</th>
                <th>Action</th> {{-- new column --}}
            </tr>
            </thead>
            <tbody>
            @forelse($tickets as $key => $ticket)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $ticket->subject }}</td>
                    <td>
                        <span class="badge
                            @if($ticket->priority == 'high') bg-danger
                            @elseif($ticket->priority == 'medium') bg-warning
                            @else bg-secondary @endif">
                            {{ ucfirst($ticket->priority) }}
                        </span>
                    </td>
                    <td>
                        <span class="badge
                            @if($ticket->status == 'pending') bg-warning
                            @elseif($ticket->status == 'open') bg-success
                            @else bg-secondary @endif">
                            {{ ucfirst($ticket->status) }}
                        </span>
                    </td>
                    <td>{{ $ticket->created_at->format('d M Y, h:i A') }}</td>
                    <td>
                        @if($ticket->attachments)
                            @foreach(json_decode($ticket->attachments, true) as $file)
                                <a href="{{ asset($file) }}" target="_blank" class="btn btn-sm btn-link">
                                    View
                                </a>
                            @endforeach
                        @else
                            No Attachment Found!
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('user.tickets.destroy', $ticket->faker_id) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Are you sure you want to delete this ticket?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="ti ti-trash"></i> Delete
                            </button>
                        </form>
                    </td>

                </tr>
            @empty
            @endforelse
            </tbody>
        </table>
    </div>
</div>
