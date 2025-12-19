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
                                    <div><h4>Notifications</h4></div>
                                    <div>
                                        <a href="{{ route('admin.notifications.markAll') }}"
                                           class="btn btn-primary p-2 rounded-0 ms-auto">
                                            Mark All as Read
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Title</th>
                                            <th>Message</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($notifications as $key => $notification)

                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $notification->title }}</td>
                                                <td>{{ $notification->message }}</td>
                                                <td>
                                                    @if($notification->is_read)
                                                        <div class="badge badge-success">Read</div>
                                                    @else
                                                        <div class="badge badge-warning">Unread</div>
                                                    @endif
                                                </td>
                                                <td>{{ $notification->created_at->format('Y-m-d H:i') }}</td>
                                                <td>
                                                    @if(!$notification->is_read)
                                                        <a href="{{ route('admin.notifications.read', $notification->id) }}"
                                                           class="btn btn-info btn-sm">
                                                            Mark as Read
                                                        </a>
                                                    @endif
                                                    <a href="{{ route('admin.notifications.delete', $notification->id) }}"
                                                       class="btn btn-danger btn-sm"
                                                       onclick="return confirm('Are you sure you want to delete this notification?')">
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>

                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">No notifications found</td>
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
