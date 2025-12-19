@extends('admin.partials.master')

@push('styles')
    <link rel="stylesheet" href="{{ asset('admin-assets/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endpush

@section('main-content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-header">
                                <div class="d-flex justify-content-between w-100">
                                    <div><h4>Ticket Management</h4></div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Subject</th>
                                            <th>User</th>
                                            <th>Status</th>
                                            <th>Priority</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($tickets as $key => $ticket)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $ticket->subject }}</td>
                                                <td>{{ $ticket->user->name ?? 'N/A' }}</td>
                                                <td>
                                                    @if($ticket->status === 'open')
                                                        <div class="badge badge-success">Open</div>
                                                    @elseif($ticket->status === 'pending')
                                                        <div class="badge badge-warning">Pending</div>
                                                    @else
                                                        <div class="badge badge-danger text-capitalize">{{ $ticket->status }}</div>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($ticket->priority === 'high')
                                                        <div class="badge badge-danger">High</div>
                                                    @elseif($ticket->priority === 'medium')
                                                        <div class="badge badge-warning">Medium</div>
                                                    @else
                                                        <div class="badge badge-secondary">Low</div>
                                                    @endif
                                                </td>
                                                <td>{{ $ticket->created_at->format('Y-m-d') }}</td>
                                                <td>
                                                    <a href="{{ route('admin.show.ticket', $ticket->faker_id) }}" class="btn btn-info btn-sm">Detail</a>
                                                    <a href="{{ route('admin.edit.ticket', $ticket->faker_id) }}" class="btn btn-primary btn-sm">Edit</a>

                                                    <form action="{{ route('admin.delete.ticket', $ticket->faker_id) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                                class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Are you sure you want to delete this ticket?')">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center">No tickets found</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('admin-assets/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('admin-assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin-assets/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('admin-assets/js/page/datatables.js') }}"></script>
@endpush
