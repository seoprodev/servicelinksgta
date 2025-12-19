@extends('frontend.partials.master')
@section('title', 'Phone Verification')

@push('styles')
@endpush

@section('main-content')
    <div class="breadcrumb-bar text-center">
        <div class="container">
            <h2 class="breadcrumb-title mb-2">Phone Verification</h2>
            <p class="text-muted">Enter the verification code sent to your number</p>
        </div>
    </div>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg border-0 rounded-3">
                    <div class="card-body p-4">
                        <h4 class="text-center mb-3">Verify Phone</h4>
                        <p class="text-center text-muted" id="phoneDisplay"></p>

                        <input type="text" id="verificationCode" class="form-control text-center mb-3" placeholder="Enter OTP" maxlength="6">
                        <button id="verifyCode" class="btn btn-dark w-100 mb-3">Verify Code</button>

                        <div id="recaptcha-container" class="text-center mb-3"></div>

                        <div class="text-center">
                            <p class="mb-0">Didn’t receive the code?
                                <button id="resendCode" class="btn btn-link p-0">Resend</button>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.10.1/firebase-auth.js"></script>

    <script>
        const firebaseConfig = {
  apiKey: "AIzaSyAf2z28kZofrZkhzx_4RMfq3XpAmJC23hg",
  authDomain: "service-links-gta.firebaseapp.com",
  projectId: "service-links-gta",
  storageBucket: "service-links-gta.firebasestorage.app",
  messagingSenderId: "112802712931",
  appId: "1:112802712931:web:0b4c91856edf8731f89756",
  measurementId: "G-XCFKHE3Y12"
};

        firebase.initializeApp(firebaseConfig);

        const userId = "{{ $user->faker_id }}";
        const userType = "{{ $user->user_type }}";
        const phoneNumber = sessionStorage.getItem('phoneNumber');
        const verificationId = sessionStorage.getItem('verificationId');

        document.getElementById('phoneDisplay').innerText = phoneNumber ? `Code sent to ${phoneNumber}` : '';

        if (!verificationId || !phoneNumber) {
            Swal.fire({
                icon: 'warning',
                title: 'Session Expired!',
                text: 'Please request verification again.',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('user.profile') }}";
                }
            });
        }

        // Verify OTP
        document.getElementById('verifyCode').addEventListener('click', async function() {
            const code = document.getElementById('verificationCode').value.trim();

            if (!code) {
                Swal.fire({
                    icon: 'error',
                    title: 'Missing Code',
                    text: 'Please enter the 6-digit verification code.'
                });
                return;
            }

            try {
                const credential = firebase.auth.PhoneAuthProvider.credential(verificationId, code);
                const userCredential = await firebase.auth().signInWithCredential(credential);
                const verifiedUser = userCredential.user;

                // Send verification info to backend
                await fetch("{{ route('user.phone.verified') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        id: userId,
                        phone: verifiedUser.phoneNumber
                    })
                });

                // Clear session storage
                sessionStorage.removeItem('verificationId');
                sessionStorage.removeItem('phoneNumber');

                // ✅ Show success message then redirect to dashboard
                Swal.fire({
                    icon: 'success',
                    title: 'Phone Verified!',
                    text: 'Your phone number has been successfully verified.',
                    confirmButtonText: 'Go to Dashboard'
                }).then((result) => {
                    if (result.isConfirmed) {
                        if (userType === 'provider') {
                            window.location.href = "{{ route('provider.dashboard') }}";
                        } else {
                            window.location.href = "{{ route('user.dashboard') }}";
                        }
                    }
                });

            } catch (error) {
                console.error(error);
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid Code',
                    text: error.message || 'Verification failed. Please try again.'
                });
            }
        });


        // Resend OTP
        document.getElementById('resendCode').addEventListener('click', function() {
            const appVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', { size: 'normal' });

            firebase.auth().signInWithPhoneNumber(phoneNumber, appVerifier)
                .then(function(confirmationResult) {
                    sessionStorage.setItem('verificationId', confirmationResult.verificationId);

                    Swal.fire({
                        icon: 'success',
                        title: 'OTP Resent!',
                        text: `A new verification code has been sent to ${phoneNumber}.`,
                        showConfirmButton: false,
                        timer: 2500
                    });
                })
                .catch(function(error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Failed to Resend',
                        text: error.message || 'Something went wrong while resending OTP.',
                        confirmButtonText: 'OK'
                    });
                });
        });

    </script>
@endpush
