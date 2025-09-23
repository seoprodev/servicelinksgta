<footer>
    <div class="footer-top" 	 >
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xl-2">
                    <div class="footer-widget">
                        <h5 class="mb-4">Useful links</h5>
                        <ul class="footer-menu">
                            <li><a href="{{ route('front.service') }}">Leads</a></li>
{{--                            <li><a href="{{ route('front.categories') }}">Category</a></li>--}}
{{--                            <li><a href="{{ route('front.providers') }}">Providers</a></li>--}}
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-xl-2">
                    <div class="footer-widget">
                        <h5 class="mb-4">Pages</h5>
                        <ul class="footer-menu">
                            <li>
                                <a href="{{ route('front.about') }}">About us </a>
                            </li>
                            <li>
                                <a href="{{ route('front.terms') }}">Terms &amp; condition</a>
                            </li>
                            <li>
                                <a href="{{ route('front.policy') }}">Privacy Policy</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-xl-2">
                    <div class="footer-widget">
                        <h5 class="mb-4">Support</h5>
                        <ul class="footer-menu">
                            <li>
                                <a href="{{ route('front.contact') }}">Contact us</a>
                            </li>
                            <li>
                                <a href="{{ route('front.blog') }}">Blogs</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-12 col-xl-4">
                    <div class="footer-widget">
                        <div class="card bg-light-200 border-0 mb-3">
                            <div class="card-body">
                                <h5 class="mb-3">Sign Up For Subscription</h5>
                                <form id="subscriberForm" autocomplete="off">
                                    <div class="mb-3">
                                        <input type="text" class="form-control" name="subscriber_email"
                                               id="subscriber_email" placeholder="Enter Email">
                                        <span class="text-danger error-text" id="subscriber_email_error"></span>
                                    </div>
                                    <button type="submit" class="btn btn-lg btn-linear-primary w-100"
                                            id="subscriberBtn">Subscribe</button>
                                </form>
                            </div>
                        </div>
                        <div class="d-flex align-items-center ">
                            <h6 class="fs-14 fw-normal me-2">Download Our App</h6>
                            <img src="{{ asset('frontend-assets') }}/img/icons/app-store.svg" class="me-2" alt="img">
                            <img src="{{ asset('frontend-assets') }}/img/icons/goolge-play.svg" class="me-2" alt="img">
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
                        <ul class="menu-links mb-2">
                            <li>
                                <a href="{{ route('front.terms') }}">Terms and Conditions</a>
                            </li>
                            <li>
                                <a href="{{ route('front.policy') }}">Privacy Policy</a>
                            </li>
                        </ul>
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

<!-- /Cursor -->
{{--<script>--}}
{{--    document.addEventListener("DOMContentLoaded", function() {--}}
{{--        function uploadFile(inputId, hiddenId) {--}}
{{--            const fileInput = document.getElementById(inputId);--}}
{{--            const hiddenInput = document.getElementById(hiddenId);--}}

{{--            fileInput.addEventListener("change", async function() {--}}
{{--                if (fileInput.files.length === 0) return;--}}

{{--                let formData = new FormData();--}}
{{--                formData.append("file", fileInput.files[0]);--}}
{{--                let mainbtn = document.getElementById('register_btn');--}}
{{--                mainbtn.disabled = true;--}}
{{--                try {--}}
{{--                    let response = await fetch("/upload-temp-file", { // Change URL to your Laravel upload route--}}
{{--                        method: "POST"--}}
{{--                        , headers: {--}}
{{--                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")--}}
{{--                        }--}}
{{--                        , body: formData--}}
{{--                    });--}}

{{--                    let data = await response.json();--}}

{{--                    if (data.path) {--}}
{{--                        hiddenInput.value = data.path;--}}
{{--                        mainbtn.disabled = false;--}}
{{--                        console.log(`Uploaded: ${data.path}`);--}}
{{--                    } else {--}}
{{--                        console.error("Upload failed", data);--}}
{{--                        alert("Upload failed");--}}
{{--                    }--}}
{{--                } catch (error) {--}}
{{--                    console.error("Error uploading file:", error);--}}
{{--                }--}}
{{--            });--}}
{{--        }--}}

{{--        uploadFile("business_license", "business_license_path");--}}
{{--        uploadFile("id_proof", "id_proof_path");--}}
{{--    });--}}

{{--</script>--}}

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