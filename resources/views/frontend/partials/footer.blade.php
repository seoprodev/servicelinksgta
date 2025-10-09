<style>
    .contact-info p {
        display: flex;
        align-items: center;
        gap: 8px; /* space between icon and text */
        color: #6c757d; /* subtle gray text */
        font-size: 0.9rem;
        margin-bottom: 0.5rem; /* for small spacing */
        transition: color 0.3s ease;
    }

    .contact-info p i {
        color: #0092A8; /* icon color */
        font-size: 1rem;
    }

    .contact-info p:hover {
        color: #0092A8; /* text changes color on hover */
    }

    .footer-widget .contact-info p:hover i {
        color: #0092A8; /* icon darker on hover */
    }
    .social-icons a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: #0092A8;
        color: #ffff;
        text-decoration: none;
        font-size: 16px;
        transition: all 0.3s ease;
    }

    .social-icons a.facebook:hover {
        background-color: #3b5998;
        color: #fff;
    }

    .social-icons a.twitter:hover {
        background-color: #1da1f2;
        color: #fff;
    }

    .social-icons a.instagram:hover {
        background-color: #e4405f;
        color: #fff;
    }

</style>
<footer>

    <div class="footer-top">
        <div class="container-fluid px-5">
            <div class="row">
                <div class="col-md-6 col-lg-2">
                    <div class="footer-widget">
                        <h5 class="mb-4">ServiceLinksGTA Jobs</h5>
                        <ul class="footer-menu">
                            <li><a href="{{ route('front.service') }}">Explore Services</a></li>
                            <li><a href="javascript:" data-bs-toggle="modal" data-bs-target="#all-login-modal">Login</a></li>
                            <li><a href="javascript:" data-bs-toggle="modal" data-bs-target="#all-login-modal">Pro Login</a></li>
                        </ul>

                    </div>
                </div>
                <div class="col-md-6 col-lg-2">
                    <div class="footer-widget">
                        <h5 class="mb-4">Company</h5>
                        <ul class="footer-menu">
                            <li>
                                <a href="{{ route('front.about') }}">About us </a>
                            </li>
                            <li>
                                <a href="{{ route('front.blog') }}">Blog</a>
                            </li>
                            <li>
                                <a href="{{ route('front.contact') }}">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2">
                    <div class="footer-widget">
                        <h5 class="mb-4">Legal</h5>
                        <ul class="footer-menu">
                            <li>
                                <a href="{{ route('front.terms') }}">Terms & Conditions</a>
                            </li>
                            <li>
                                <a href="{{ route('front.independent.contract') }}" >Homeowner Protection Promise</a>
                            </li>
                            <li>
                                <a href="{{ route('front.policy') }}">Privacy Policy</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2">
                    <div class="footer-widget">
                        <h5 class="mb-4">Press</h5>
                        <ul class="footer-menu">
                            <li>
                                <a href="javascript:">Legal</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-12 col-xl-4">
                    <div class="footer-widget">
                        <div class="card bg-light-200 border-0 mb-3">
                            <div class="">
                                <h5 class="mb-3">Sign Up For Subscription</h5>
                                <form id="subscriber-form" autocomplete="off">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="subscriber_email"
                                               id="subscriber_email" placeholder="Enter Email">
                                        <span class="text-danger error-text" id="subscriber_email_error"></span>
                                    </div>
                                    <button type="submit" class="btn btn-lg btn-linear-primary w-100">Subscribe</button>
                                </form>
                            </div>
                        </div>
                       <div class="contact-info">
                           <p class="mb-1 small"><i class="fa-solid fa-envelope"></i> info@servicelinksgta.ca</p>
                           <p class="mb-3 small"> <i class="fa-solid fa-phone"></i> Text us at 647-490-1524</p>
                       </div>
                        <div class="social-icons d-flex align-items-center gap-3">
                            <a href="#" class="social-icon facebook"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#" class="social-icon twitter"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#" class="social-icon instagram"><i class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom" >
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                        <div>
                            <div class="mb-2 text-start">© 2025 All right reserved. Service Link GTA</div>
                        </div>
{{--                        <ul class="menu-links mb-2">--}}
{{--                            <li>--}}
{{--                                <a href="{{ route('front.terms') }}">Terms and Conditions</a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a href="{{ route('front.policy') }}">Privacy Policy</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

</footer>

<div class="back-to-top">
    <a class="back-to-top-icon align-items-center justify-content-center d-flex" href="#top">
        <i class="fa-solid fa-arrow-up"></i>
    </a>
</div>

<!-- Cursor -->
<div class="xb-cursor tx-js-cursor">
    <div class="xb-cursor-wrapper">
        <div class="xb-cursor--follower xb-js-follower"></div>
    </div>
</div>


@include('frontend.partials.modals')


<script src="{{ asset('frontend-assets/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('frontend-assets/js/jquery-validation.min.js') }}"></script>
<script src="{{ asset('frontend-assets/js/jquery-validation-additional-methods.min.js') }}"></script>
<script src="{{ asset('frontend-assets/js/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('frontend-assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('frontend-assets/js/moment.min.js') }}"></script>
<script src="{{ asset('frontend-assets/js/wow.min.js') }}"></script>
<script src="{{ asset('frontend-assets/plugins/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('frontend-assets/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"></script>
<script src="{{ asset('frontend-assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
<script src="{{ asset('frontend-assets/js/cursor.js') }}"></script>
<script src="{{ asset('frontend-assets/plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('frontend-assets/plugins/intltelinput/js/intlTelInput.js') }}"></script>
<script src="{{ asset('frontend-assets/plugins/intltelinput/js/utils.js') }}"></script>
<script src="{{ asset('frontend-assets/plugins/ityped/index.js') }}"></script>
<script src="{{ asset('frontend-assets/js/validation.min.js') }}"></script>
<script src="{{ asset('frontend-assets/js/script.js') }}"></script>


<script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

{{--<script src="{{ asset('frontend-assets/js/home-page.js') }}"></script>--}}
{{--<script src="{{ asset('frontend-assets/js/user-script.js') }}"></script>--}}
<script src="{{ asset('frontend-assets/js/user-register.js') }}"></script>
{{--<script src="{{ asset('frontend-assets/js/user-login.js') }}"></script>--}}
{{--<script src="{{ asset('frontend-assets/js/provider-register.js') }}"></script>--}}
<script src="{{ asset('frontend-assets/js/custom.js') }}"></script>
{{--<script src="{{ asset('frontend-assets/js/booking.js') }}"></script>--}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


{{-- Alertify JS --}}
<script>
    // ✅ Success Message
    @if(session('success'))
    alertify.success("{{ session('success') }}");
    @endif

    // ❌ Error Message
    @if(session('error'))
    alertify.error("{{ session('error') }}");
    @endif

    // ⚠️ Validation Errors
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    alertify.error("{{ $error }}");
    @endforeach
    @endif
</script>
<script>
    $("#subscriber-form").on("submit", function(e) {
        e.preventDefault();

        let email = $("#subscriber_email").val();
        let $error = $("#subscriber_email_error");

        $error.text(""); // clear old error

        $.ajax({
            url: "{{ route('subscriber.store') }}",
            method: "POST",
            data: {
                subscriber_email: email,
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                if (response.status === 0) {
                    // Show validation errors
                    if (response.errors.subscriber_email) {
                        $error.text(response.errors.subscriber_email[0]);

                        Swal.fire({
                            icon: 'error',
                            title: 'Invalid Email',
                            text: response.errors.subscriber_email[0],
                            confirmButtonColor: '#d33'
                        });
                    }
                } else {
                    // Success
                    $("#subscriber_email").val("");

                    Swal.fire({
                        icon: 'success',
                        title: 'Subscribed!',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong. Please try again later.',
                    confirmButtonColor: '#d33'
                });
            }
        });
    });

</script>