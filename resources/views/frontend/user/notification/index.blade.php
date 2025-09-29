@extends('frontend.user.partials.master')

@section('title', 'My Notifications')

@push('styles')
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endpush

@section('user-main-content')
    <div class="col-xl-9 col-lg-8">
        <div class="d-flex align-items-center mb-4">
            <h4 class="mb-0">My Notifications</h4>
            <a href="{{ route('client.notifications.markAll') }}" class="btn btn-danger ms-auto">
                Mark All as Read
            </a>
        </div>

        <div id="notification-data">
            <div class="card">
                <div class="card-body p-2">
                    <table class="table table-striped mb-0 notifications-table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Message</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($notifications as $key => $notification)
                            <tr class="{{ $notification->is_read ? '' : 'table-warning' }}">
                                <td>{{ $key+1 }}</td>
                                <td>{{ $notification->title }}</td>
                                <td>
                                    @if($notification->url)
                                        <a href="{{ $notification->url }}" target="_blank">{{ $notification->message }}</a>
                                    @else
                                        {{ $notification->message }}
                                    @endif
                                </td>
                                <td>
                                    @if($notification->is_read)
                                        <span class="badge bg-success">Read</span>
                                    @else
                                        <span class="badge bg-danger">Unread</span>
                                    @endif
                                </td>
                                <td>{{ $notification->created_at->format('d M Y, h:i A') }}</td>
                                <td>
                                    @if(!$notification->is_read)
                                        <a href="{{ route('client.notifications.read', $notification->id) }}"
                                           class="btn btn-sm btn-info">
                                            Mark as Read
                                        </a>
                                    @endif

                                    <a href="{{ route('client.notifications.delete', $notification->id) }}"
                                       class="btn btn-sm btn-danger"
                                       onclick="return confirm('Are you sure you want to delete this notification?');">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
            $('.notifications-table').DataTable({
                pageLength: 10,
                lengthMenu: [5, 10, 25, 50, 100],
                ordering: true,
                searching: true,
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search notifications..."
                }
            });
        });
    </script>
@endpush
