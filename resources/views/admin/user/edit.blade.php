@extends('admin.partials.master')
@push('styles')
@endpush
@section('main-content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 p-4">
                        <h3 class="pb-2">Edit User</h3>
                        <div class="card p-4">

                            <form method="post" action="{{ route('admin.update.user', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <!-- Avatar -->
                                <div class="form-group text-center">
                                    <div class="position-relative d-inline-block">
                                        @if($user->profile)
                                            <img id="avatarPreview"
                                                 src="{{ $user->profile->avatar ? asset($user->profile->avatar) : asset('admin-assets/img/no-image-found.png') }}"
                                                 width="200px" height="200px"
                                                 class="rounded-circle author-box-picture border">
                                        @endif
                                        <input type="file" name="avatar" id="avatarInput"
                                               class="d-none" accept="image/*"
                                               onchange="previewAvatar(event)">
                                        <label for="avatarInput"
                                               class="btn btn-sm btn-primary position-absolute"
                                               style="bottom:10px; right:10px; cursor:pointer;">
                                            Change
                                        </label>
                                    </div>
                                </div>


                                @if($user->profile)
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label>First Name</label>
                                            <input type="text" name="first_name" class="form-control" value="{{ $user->profile->first_name ?? '' }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Last Name</label>
                                            <input type="text" name="last_name" class="form-control" value="{{ $user->profile->last_name ?? '' }}">
                                        </div>
                                    </div>
                            @endif

                            <!-- Email -->
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                                </div>

                                <!-- User Type & Phone -->
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>User Type</label>
                                        <select name="user_type" class="form-control">
                                            <option value="">Select User Type</option>
                                            <option value="client" {{ $user->user_type == 'client' ? 'selected' : '' }}>Client</option>
                                            <option value="provider" {{ $user->user_type == 'provider' ? 'selected' : '' }}>Provider</option>
                                        </select>
                                    </div>
                                    @if($user->profile)
                                    <div class="form-group col-md-6">
                                        <label>Phone</label>
                                        <input type="text" name="phone" class="form-control" value="{{ $user->profile->phone }}">
                                    </div>
                                    @endif
                                </div>

                                <!-- Address -->
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" name="address" class="form-control" value="{{ $user->profile->address }}">
                                </div>

                                <!-- Bio -->
                                <div class="form-group">
                                    <label>Bio</label>
                                    <textarea name="bio" class="form-control" rows="3">{{ $user->profile->bio }}</textarea>
                                </div>

                                <!-- Status -->
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="is_active" class="form-control">
                                        <option value="1" {{ $user->is_active ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ !$user->is_active ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('admin.manage.user') }}" class="btn btn-dark">Cancel</a>
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
    <script>
        function previewAvatar(event) {
            const reader = new FileReader();
            reader.onload = function(){
                document.getElementById('avatarPreview').src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endpush
