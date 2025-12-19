@extends('frontend.provider.partials.master')

@section('title', 'My Notifications')

@push('styles')
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endpush

@section('provider-dashboard-content')
    <div class="col-xl-12 col-lg-12">
        <div class="breadcrumb-bar text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <h2 class="breadcrumb-title mb-2">Dashboard</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('provider.dashboard') }}">
                                        <i class="ti ti-home-2"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item">Provider</li>
                                <li class="breadcrumb-item active" aria-current="page">My Notifications</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="breadcrumb-bg">
                    <img src="{{ asset('frontend-assets/img/bg/breadcrumb-bg-01.png') }}" class="breadcrumb-bg-1" alt="Img">
                    <img src="{{ asset('frontend-assets/img/bg/breadcrumb-bg-02.png') }}" class="breadcrumb-bg-2" alt="Img">
                </div>
            </div>
        </div>

        <div class="container">
            <div class="col-12">
                <div class="d-flex align-items-center mb-4">
                    <h4 class="mb-0">My Notifications</h4>
                    <a href="{{ route('provider.notifications.markAll') }}" class="btn btn-outline-danger ms-auto">
                        Mark All as Read
                    </a>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered notifications-table">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Message</th>
                            <th>Created At</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($notifications as $notification)
                            <tr class="{{ $notification->is_read ? '' : 'table-warning' }}">
                                <td>{{ $notification->title }}</td>
                                <td>
                                    <a href="{{ $notification->url }}" target="_blank">
                                        {{ $notification->message }}
                                    </a>
                                </td>
                                <td>{{ $notification->created_at->diffForHumans() }}</td>
                                <td>
                                    @if($notification->is_read)
                                        <span class="badge bg-success">Read</span>
                                    @else
                                        <span class="badge bg-danger">Unread</span>
                                    @endif
                                </td>
                                <td>
                                    @if(!$notification->is_read)
                                        <a href="{{ route('provider.notifications.read', $notification->id) }}"
                                           class="btn btn-info btn-sm">
                                            Mark as Read
                                        </a>
                                    @endif
                                    <a href="{{ route('provider.notifications.delete', $notification->id) }}"
                                       class="btn btn-danger btn-sm"
                                       onclick="return confirm('Are you sure you want to delete this notification?')">
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
