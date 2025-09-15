@extends('frontend.user.partials.master')

@push('styles')
@endpush

@section('title', 'Profile')

@section('user-main-content')
    <div class="col-xl-9 col-lg-8">
        <h4 class="mb-3">Profile Settings</h4>

        <form method="post" enctype="multipart/form-data" action="{{ route('user.update.profile') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $user->id }}">

            {{-- Profile Picture --}}
            <h6 class="mb-4">Profile Picture</h6>
            <div class="d-flex justify-content-between">
                <div class="pro-picture">
                    <div class="pro-img avatar avatar-xl">
                        <img src="{{ $user->profile->avatar ? asset($user->profile->avatar) : asset('frontend-assets/img/profile-default.png') }}"
                             alt="user"
                             class="img-fluid rounded-circle profileImagePreview">
                    </div>
                    <div class="pro-info">
                        <div class="d-flex mb-2">
                            <input type="file" name="avatar" id="profile_image">
                        </div>
                        <p class="fs-14">*Image size should be less than 2MB. Allowed: .png, .jpg, .jpeg.</p>
                        <span class="text-danger error-text" id="profile_image_error"></span>
                    </div>
                </div>
            </div>

            {{-- General Info --}}
            <h6>General Information</h6>
            <div class="row mb-4">
                <div class="col-md-6">
                    <label class="form-label">First Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="first_name" value="{{ $user->profile->first_name }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Last Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="last_name" value="{{ $user->profile->last_name }}">
                </div>
                <div class="col-md-12">
                    <label class="form-label">Email<span class="text-danger">*</span></label>
                    <input type="email" class="form-control" name="email" value="{{ $user->email }}" readonly>
                </div>
                <div class="col-md-6">
                    <label class="form-label">User Name<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Phone Number<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="phone" value="{{ $user->profile->phone }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Gender<span class="text-danger">*</span></label>
                    <select class="form-control" name="gender">
                        <option value="">Select Gender</option>
                        <option value="male" {{ $user->profile->gender == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ $user->profile->gender == 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Date of Birth<span class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="dob" value="{{ $user->profile->dob }}">
                </div>
                <div class="col-md-12">
                    <label class="form-label">Your Bio</label>
                    <textarea class="form-control" name="bio" rows="5">{{ $user->profile->bio }}</textarea>
                </div>
            </div>

            {{-- Address Info --}}
            <h6 class="user-title">Address Information</h6>
            <div class="row">
                <div class="col-md-12">
                    <label class="form-label">Address<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="address" value="{{ $user->profile->address }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Country<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="country" value="{{ $user->profile->country }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">State<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="state" value="{{ $user->profile->state }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">City<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="city" value="{{ $user->profile->city }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Postal Code<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="postal_code" value="{{ $user->profile->postal_code }}">
                </div>

            </div>

            {{-- Security Proofs --}}
            <h6 class="mt-4">Security Proofs</h6>
            <div class="row py-3">
                <div class="col-md-6">
                    <label class="form-label">Upload Business License</label>
                    <input type="file" name="business_license_file">
                    <div class="mt-2">
                    @if($user->profile->business_license)
                        <img class="mt-2"  src="{{ asset($user->profile->business_license) }}" width="150">
                    @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Upload Government Id</label>
                    <input type="file" name="government_doc">
                    <div class="mt-2">
                        @if($user->profile->government_doc)
                            <img class="mt-2" src="{{ asset($user->profile->government_doc) }}" width="150">
                        @endif
                    </div>
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-dark">Save Changes</button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
@endpush
