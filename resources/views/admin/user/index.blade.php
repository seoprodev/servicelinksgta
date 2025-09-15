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
                                    <div><h4>User Management</h4></div>
                                    <div><a href="{{ route('admin.create.user') }}" class="btn btn-primary p-2 rounded-0 ms-auto">Create New User</a></div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>User Type</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Avatar</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($users as $key => $user)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $user->profile->first_name ?? '' }} {{ $user->profile->last_name ?? '' }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td><div class="badge badge-info">{{ ucfirst($user->user_type) }}</div></td>
                                                <td>{{ $user->profile->phone ?? '-' }}</td>
                                                <td>{{ $user->profile->address ?? '-' }}</td>
                                                <td>
                                                    @if(!empty($user->profile->avatar))
                                                        <img src="{{ asset($user->profile->avatar) }}" alt="avatar" width="40" height="40" class="rounded-circle">
                                                    @else
                                                        <span>No Avatar</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($user->is_active)
                                                        <div class="badge badge-success">Active</div>
                                                    @else
                                                        <div class="badge badge-danger">Inactive</div>
                                                    @endif
                                                </td>
                                                <td>{{ $user->created_at->format('Y-m-d') }}</td>
                                                <td>
                                                    <a href="{{ route('admin.edit.user', $user->faker_id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                    <a href="{{ route('admin.show.user', $user->faker_id) }}" class="btn btn-info btn-sm">Detail</a>

                                                    <a href="javascript:void(0)"
                                                       onclick="if(confirm('Are you sure you want to delete this user?')) {
                                                               document.getElementById('delete-user-{{ $user->id }}').submit();
                                                               }"
                                                       class="btn btn-danger btn-sm">
                                                        Delete
                                                    </a>

                                                    <form id="delete-user-{{ $user->id }}"
                                                          action="{{ route('admin.delete.user', $user->faker_id) }}"
                                                          method="POST" style="display:none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>

                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="10" class="text-center">No users found</td>
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