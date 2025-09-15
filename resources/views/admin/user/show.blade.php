@extends('admin.partials.master')
@push('styles')
@endpush
@section('main-content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 p-4">
                        <h3 class="pb-2">User Detail</h3>
                        <div class="card p-4">

                            <!-- Avatar -->
                            <div class="form-group text-center">
                                <img src="{{ $user->profile->avatar ? asset($user->profile->avatar) : asset('admin-assets/img/no-image-found.png') }}"
                                     width="200px" height="200px"
                                     class="rounded-circle author-box-picture">
                            </div>

                            <!-- First/Last Name -->
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" value="{{ $user->profile->first_name }}" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" value="{{ $user->profile->last_name }}" disabled>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" value="{{ $user->email }}" disabled>
                            </div>

                            <!-- User Type & Phone -->
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>User Type</label>
                                    <input type="text" class="form-control" value="{{ ucfirst($user->user_type) }}" disabled>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" value="{{ $user->profile->phone }}" disabled>
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" value="{{ $user->profile->address }}" disabled>
                            </div>

                            <!-- Bio -->
                            <div class="form-group">
                                <label>Bio</label>
                                <textarea class="form-control" rows="3" disabled>{{ $user->profile->bio }}</textarea>
                            </div>

                            <!-- Status -->
                            <div class="form-group">
                                <label>Status</label><br>
                                @if($user->is_active)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                            </div>
                            <div class="card-footer">
                                <a href="{{ url()->previous() }}" class="btn btn-dark" ><- Back To List</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('scripts')
@endpush
