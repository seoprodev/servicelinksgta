@extends('admin.partials.master')
@push('styles')

@endpush
@section('main-content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 p-4">
                        <h3 class="pb-2">Create User</h3>
                        <div class="card p-2">

                            <form method="post" action="{{ route('admin.store.user') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <!-- User Details Section -->
                                    <h4>User Details</h4>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="first_name">First Name</label>
                                            <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name" required value="{{ old('first_name') }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="last_name">Last Name</label>
                                            <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name" required value="{{ old('last_name') }}">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Email</label>
                                            <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email" required value="{{ old('email') }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">Password</label>
                                            <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password" required value="{{ old('password') }}">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <div class="form-group">
                                                <label for="userType">User Type</label>
                                                <select id="user_type" name="user_type" class="form-control">
                                                    <option value="">Select User Type</option>
                                                    <option value="client">Client</option>
                                                    <option value="provider">Provider</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <div class="form-group">
                                                <label for="phone">Phone</label>
                                                <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone number" value="{{ old('phone') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="avatar">Avatar</label>
                                        <input type="file" name="avatar" class="form-control" id="avatar">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAddress">Address</label>
                                        <input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St" value="{{ old('address') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="bio">Bio</label>
                                        <textarea name="bio" class="form-control" id="bio" rows="3" placeholder="Short bio...">{{ old('bio') }}</textarea>
                                    </div>
                                    </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
@push('scripts')

@endpush