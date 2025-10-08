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

             Profile Picture
            <h6 class="mb-4">Profile Picture</h6>
            <div class="d-flex justify-content-between mb-4">
                <div class="pro-picture">
                    <div class="pro-img avatar avatar-xl">
                        <img src="{{ $user->profile->avatar ? asset($user->profile->avatar) : asset('frontend-assets/img/profile-default.png') }}"
                             alt="user"
                             class="img-fluid rounded-circle profileImagePreview">
                    </div>
                    <div class="pro-info">
                        <input type="file" name="avatar" id="profile_image" class="mb-2">
                        <p class="fs-14">*Image size less than 2MB (.png, .jpg, .jpeg)</p>
                    </div>
                </div>
            </div>

             General Info
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
                    <label class="form-label">Phone Number <span class="text-danger">*</span></label>
                    <div class="d-flex">
                        <input type="text" class="form-control" id="phone-number" name="phone" value="{{ $user->profile->phone }}" placeholder="+92XXXXXXXXXX" {{ $user->profile->phone_verified_at ? 'readonly' : '' }}>
                        @if(is_null($user->profile->phone_verified_at))
                            <button type="button" class="btn btn-outline-primary ms-2" id="sendCode">
                                Verify
                            </button>
                        @else
                            <span class="badge bg-success ms-2" style="height: 20px;"><i class="fa-solid fa-check-circle me-1"></i>Verified</span>
                        @endif
                    </div>
                    <div id="recaptcha-container" class="mt-2"></div>
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

             Address Info
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

            <div class="text-end mt-3">
                <button type="submit" class="btn btn-dark">Save Changes</button>
            </div>
        </form>
    </div>
@endsection
@push('scripts')
    <script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-auth.js"></script>

    <script>
        const firebaseConfig = {
            apiKey: "AIzaSyBkWpcwX9YB3I72vtw5-YR8rYjWz-4pPaU",
            authDomain: "servicelink-5b28b.firebaseapp.com",
            projectId: "servicelink-5b28b",
            storageBucket: "servicelink-5b28b.firebasestorage.app",
            messagingSenderId: "1096010013243",
            appId: "1:1096010013243:web:6f6bd1435a97e011371a1e",
            measurementId: "G-VEQ0KRM3RS"
        };

        firebase.initializeApp(firebaseConfig);

        // reCAPTCHA
        window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
            size: 'normal',
            callback: function(response) {
                console.log("reCAPTCHA verified ✅");
            }
        });

        // Send OTP
        document.getElementById('sendCode').addEventListener('click', function() {
            const phoneNumber = document.getElementById('phone-number').value.trim();

            if (!phoneNumber.startsWith('+')) {
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid Phone Number',
                    text: 'Please include your country code (e.g. +92XXXXXXXXXX)',
                    confirmButtonText: 'OK'
                });
                return;
            }

            const appVerifier = window.recaptchaVerifier;

            firebase.auth().signInWithPhoneNumber(phoneNumber, appVerifier)
                .then(function(confirmationResult) {
                    // Save verification ID (not the whole object)
                    sessionStorage.setItem('verificationId', confirmationResult.verificationId);
                    sessionStorage.setItem('phoneNumber', phoneNumber);

                    Swal.fire({
                        icon: 'success',
                        title: 'OTP Sent!',
                        text: `A verification code has been sent to ${phoneNumber}.`,
                        confirmButtonText: 'OK',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "{{ route('user.verify.phone', $user->faker_id) }}";
                        }
                    });

                    // Redirect to verification page
                    {{--window.location.href = "{{ route('user.verify.phone', $user->id) }}";--}}
                })
                .catch(function(error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: error.message,
                        confirmButtonText: 'OK'
                    });
                    console.error(error);
                });
        });
    </script>
@endpush
