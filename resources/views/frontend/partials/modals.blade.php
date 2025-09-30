{{--Jhon dev Start--}}

<div class="modal fade" id="provider-sign-up" tabindex="-1" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center justify-content-end pb-0 border-0">
                <a href="#!" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled fs-20"></i></a>
            </div>
            <div class="modal-body p-4">
                <form id="provider-sign-up-form" enctype="multipart/form-data" autocomplete="off">
                    @csrf

                    <div class="text-center mb-3">
                        <h3 class="mb-2">Registration</h3>
                        <p>Enter your credentials to access your account</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Company Name</label>
                        <input type="text" name="company__name" id="company__name" class="form-control" maxlength="100" placeholder="Enter Company Name">
                        <div class="invalid-feedback" id="company__name_error"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">User Name</label>
                        <input type="text" name="username" id="username" class="form-control" maxlength="100" placeholder="Enter Name">
                        <div class="invalid-feedback" id="username_error"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" maxlength="100" placeholder="Enter Email">
                        <div class="invalid-feedback" id="email_error"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input class="form-control" id="phone" name="phone" maxlength="12" type="tel" placeholder="Enter Phone Number" autocomplete="tel">
                        <div class="invalid-feedback" id="phone_error"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" name="password" id="password" class="password--input form-control" maxlength="100" placeholder="Enter Password" autocomplete="current-password">
                            <button class="btn btn-outline-dark toggle--password" type="button" id="togglePassword" tabindex="-1">
                                <i class="fas fa-eye toggle--icon"></i>
                            </button>
                        </div>
                        <div class="invalid-feedback" id="password_error"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Upload Business License</label>
                        <div class="input-group">
                            <input type="file" id="business_license" name="business_license_file">
                        </div>
                        <div class="invalid-feedback" id="business_license_file_error"></div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Upload Government Id (passport or a valid drivers license)</label>
                        <div class="input-group">
                            <input type="file" id="government_doc" name="government_doc">
                        </div>
                        <div class="invalid-feedback" id="government_doc_error"></div>
                    </div>

                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" name="terms_policy" type="checkbox" value="1" id="terms_policy">
                            <label class="form-check-label" for="terms_policy">
                                I agree to <a href="terms-conditions.html" class="text-primary text-decoration-underline">Terms and Conditions</a>
                                & <a href="privacy-policy.html" class="text-primary text-decoration-underline">Privacy Policy</a>
                            </label>
                            <div class="invalid-feedback" id="terms_policy_error"></div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-lg btn-linear-primary w-100">Sign up</button>
                    </div>

                    <div class="d-flex justify-content-center">
                        <p>Already have an account? <a href="#!" class="text-primary" data-bs-target="#login-modal" data-bs-toggle="modal">Sign in</a></p>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>



<div class="modal fade" id="cleint-sign-up" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center justify-content-between">
                <h5>Post A Job</h5>
                <a href="#!" data-bs-dismiss="modal" aria-label="Close"><i
                            class="ti ti-circle-x-filled fs-20"></i></a>
            </div>
            <div class="form-container">
                    <form id="cleint-sign-up-form" autocomplete="off">
                        @csrf
                        <div class="modal-body pb-1">
                            <div class="mb-3">
                                <div class="text-center mb-3">
                                    <h3 class="mb-2">Registration</h3>
                                    <p>Enter your credentials to access your account</p>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">First Name</label>
                                            <input type="text" name="client_first_name" id="client_first_name"
                                                   class="form-control" placeholder="Enter First Name">
                                            <div class="invalid-feedback" id="provider_first_name_error"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" name="client_last_name" id="client_last_name"
                                                   class="form-control" placeholder="Enter Last Name">
                                            <div class="invalid-feedback" id="provider_last_name_error"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">User Name</label>
                                            <input type="text" name="client_username" id="client_username"
                                                   class="form-control" placeholder="Enter Name">
                                            <div class="invalid-feedback" id="provider_name_error"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" name="client_email" id="client_email"
                                                   class="form-control" placeholder="Enter Email">
                                            <div class="invalid-feedback" id="provider_email_error"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Phone Number</label>
                                            <input class="form-control" id="client_phone"
                                                   name="client_phone" maxlength="12" type="text"
                                                   placeholder="Enter Phone Number" autocomplete="tel">
                                            <div class="invalid-feedback" id="provider_phone_number_error"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                <label class="form-label">Password</label>
                                            </div>
                                            <div class="input-group">
                                                <input type="password" name="client_password" id="client_password"
                                                       class="password--input form-control" placeholder="Enter Password"
                                                       autocomplete="current-password">
                                                <button class="btn btn-outline-dark toggle--password" type="button"
                                                        tabindex="-1">
                                                    <i class="fas fa-eye toggle--icon"></i>
                                                </button>
                                            </div>
                                            <div class="invalid-feedback" id="provider_password_error"></div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="modal-footer text-end">
                            <button class="btn btn-linear-primary" type="submit">Get Started</button>
                        </div>
                    </form>


            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="all-login-modal" tabindex="-1" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center justify-content-end pb-0 border-0">
                <a href="#!" data-bs-dismiss="modal" aria-label="Close"><i
                            class="ti ti-circle-x-filled fs-20"></i></a>
            </div>
            <div class="modal-body p-4">
                <form id="all-user-login" autocomplete="off">
                    @csrf

                    <div class="text-center mb-3">
                        <h3 class="mb-2">Welcome </h3>
                        <p>Enter your credentials to access your account</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" name="login-email" id="login-email" class="form-control" placeholder="Enter Email"
                               autocomplete="username">
                    </div>
                    <div class="mb-3">
                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                            <label class="form-label">Password</label>
                            <a href="#!"
                               class="text-primary fw-medium text-decoration-underline mb-1 fs-14"
                               data-bs-toggle="modal" data-bs-target="#forgot-password-modal">Forgot Password??</a>
                        </div>
                        <div class="input-group">
                            <input type="password" name="password" id="login_password" class="password--input form-control"
                                   maxlength="100" placeholder="Enter Password"
                                   autocomplete="current-password">
                            <button class="btn btn-outline-dark toggle--password" type="button" id="" tabindex="-1">
                                <i class="fas fa-eye toggle--icon"></i>
                            </button>
                        </div>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div id="error_login_message" class="text-danger text-center m-1"></div>
                    <div class="mb-3">
                        <button type="submit" class="login_btn btn btn-lg btn-linear-primary w-100">Sign in
                        </button>
                    </div>
                    <div class="d-flex justify-content-center">
                        <p>Don&#039;t have an account? <a href="#!" class="text-primary"
                                                          data-bs-toggle="modal" data-bs-target="#cleint-sign-up"> Join us Today</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="forgot-password-modal" tabindex="-1" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center justify-content-end pb-0 border-0">
                <a href="#!" data-bs-dismiss="modal" aria-label="Close"><i
                            class="ti ti-circle-x-filled fs-20"></i></a>
            </div>
            <div class="modal-body p-4">
                <form id="forgot-password-form">
                    @csrf
                    <div class="text-center mb-3">
                        <h3 class="mb-2">Forgot Password??</h3>
                        <p>Enter your email, we will send you a otp to reset your password.</p>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="forgot_email" id="forgot_email" class="form-control"
                               placeholder="Enter Email">
                        <div class="invalid-feedback" id="forgot_email_error"></div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-lg btn-linear-primary w-100"
                                id="forget-password-button">Submit</button>
                    </div>
                    <div class=" d-flex justify-content-center">
                        <p>Remember Password? <a href="#!" class="text-primary"
                                                 data-bs-toggle="modal" data-bs-target="#login-modal">Sign in</a></p>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>




<!-- Sign up choose Modal -->
<div class="modal fade" id="show--sign--up--model" tabindex="-1" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center justify-content-end pb-0 border-0">
                <a href="#!" data-bs-dismiss="modal" aria-label="Close"><i
                            class="ti ti-circle-x-filled fs-20"></i></a>
            </div>
            <div class="modal-body p-4">
                <form action="#" class="digit-group">
                    <div class="text-center mb-3">
                        <h3 class="mb-2">Join Our Platform</h3>
                        <p id="otp-prov-reg-sms-message" class="fs-14">Select your account type to get started quickly</p>
                    </div>
                    <div class="text-center otp-input">
                        <div class="d-flex justify-content-center gap-3">
                            <button type="button" class="btn btn-lg btn-linear-primary w-50" data-bs-toggle="modal" data-bs-target="#cleint-sign-up">Sign Up as Client</button>
                            <button type="button" class="btn btn-lg btn-linear-primary w-50" data-bs-toggle="modal" data-bs-target="#provider-sign-up">Sign Up as Professional</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

{{--<div class="modal fade" id="show--sign--up--model" tabindex="-1" data-bs-backdrop="static" aria-hidden="true">--}}
{{--    <div class="modal-dialog modal-dialog-centered">--}}
{{--        <div class="modal-content p-4 text-center">--}}
{{--            <div class="modal-header border-0 justify-content-center">--}}
{{--                <h5 class="modal-title">Sign Up</h5>--}}
{{--                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--            </div>--}}
{{--            <div class="modal-body">--}}
{{--                <p class="mb-4">Please choose how you want to sign up:</p>--}}
{{--                <div class="d-flex justify-content-center gap-3">--}}
{{--                    <a href="" class="btn btn-lg btn-linear-primary w-100">Sign Up as Client</a>--}}
{{--                    <a href="" class="btn btn-lg btn-linear-primary w-100">Sign Up as Professional</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<!-- /Phone otp Modal -->







{{--Jhon dev End--}}


{{--<div class="modal fade" id="otp-email-modal" tabindex="-1" data-bs-backdrop="static" aria-hidden="true">--}}
{{--    <div class="modal-dialog modal-dialog-centered">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header d-flex align-items-center justify-content-end pb-0 border-0">--}}
{{--                <a href="#!" data-bs-dismiss="modal" aria-label="Close">--}}
{{--                    <i class="ti ti-circle-x-filled fs-20"></i>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <div class="modal-body p-4">--}}
{{--                <form action="#" class="digit-group">--}}
{{--                    <div class="text-center mb-3">--}}
{{--                        <h3 class="mb-2">Email OTP Verification</h3>--}}
{{--                        <p class="fs-14">OTP sent to your email address</p>--}}
{{--                    </div>--}}
{{--                    <div class="text-center otp-input">--}}
{{--                        <div class="inputcontainer">--}}

{{--                        </div>--}}
{{--                        <span id="error_message" class="text-danger"></span>--}}
{{--                        <div>--}}
{{--                            <div class="badge bg-danger-transparent mb-3">--}}
{{--                                <p class="d-flex align-items-center "><i class="ti ti-clock me-1"></i><span--}}
{{--                                            id="otp-timer">00:00</span></p>--}}
{{--                            </div>--}}
{{--                            <div class="mb-3 d-flex justify-content-center">--}}
{{--                                <p> Didn t get the OTP? <a href="#!"--}}
{{--                                                           class="resendEmailOtp text-primary">Resend OTP</a></p>--}}
{{--                            </div>--}}
{{--                            <div>--}}
{{--                                <button type="button" id="verify-email-otp-btn"--}}
{{--                                        class="verify-email-otp-btn btn btn-lg btn-linear-primary w-100">Verify &amp; Continue</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="modal fade" id="otp-phone-modal" tabindex="-1" data-bs-backdrop="static" aria-hidden="true">--}}
{{--    <div class="modal-dialog modal-dialog-centered">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header d-flex align-items-center justify-content-end pb-0 border-0">--}}
{{--                <a href="#!" data-bs-dismiss="modal" aria-label="Close"><i--}}
{{--                            class="ti ti-circle-x-filled fs-20"></i></a>--}}
{{--            </div>--}}
{{--            <div class="modal-body p-4">--}}
{{--                <form action="#" class="digit-group">--}}
{{--                    <div class="text-center mb-3">--}}
{{--                        <h3 class="mb-2">Phone OTP Verification</h3>--}}
{{--                        <p id="otp-sms-message" class="fs-14">OTP sent to your mobile number</p>--}}
{{--                    </div>--}}
{{--                    <div class="text-center otp-input">--}}
{{--                        <div class="inputSMSContainer">--}}
{{--                        </div>--}}
{{--                        <span id="error_sms_message" class="text-danger"></span>--}}
{{--                        <div>--}}
{{--                            <div class="badge bg-danger-transparent mb-3">--}}
{{--                                <p class="d-flex align-items-center "><i class="ti ti-clock me-1"></i><span--}}
{{--                                            id="otp-sms-timer">00:00</span></p>--}}
{{--                            </div>--}}
{{--                            <div class="mb-3 d-flex justify-content-center">--}}
{{--                                <p>Didn t get the OTP? <a href="#!"--}}
{{--                                                          class="resendSMSOtp text-primary">Resend OTP</a></p>--}}
{{--                            </div>--}}
{{--                            <div>--}}
{{--                                <button type="button" id="verify-sms-otp-btn"--}}
{{--                                        class="btn btn-lg btn-linear-primary w-100">Verify &amp; Continue</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}




{{--<div class="modal fade" id="reset-password" tabindex="-1" data-bs-backdrop="static" aria-hidden="true">--}}
{{--    <div class="modal-dialog modal-dialog-centered">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header d-flex align-items-center justify-content-end pb-0 border-0">--}}
{{--                <a href="#!" data-bs-dismiss="modal" aria-label="Close"><i--}}
{{--                            class="ti ti-circle-x-filled fs-20"></i></a>--}}
{{--            </div>--}}
{{--            <div class="modal-body p-4">--}}
{{--                <div class="text-center mb-3">--}}
{{--                    <h3 class="mb-2">Reset Password</h3>--}}
{{--                    <p class="fs-14">Your new password must be different from previous used passwords.</p>--}}
{{--                </div>--}}
{{--                <form id="forgotPassword" autocomplete="off" novalidate="novalidate">--}}
{{--                    <input type="hidden" name="_token" value="cXPzE4SORBCkhln6AtlYfl5xuA4UeqmB5sfh31f8" autocomplete="off">--}}
{{--                    <input type="hidden" name="email_id" id="email_id" value="" autocomplete="username">--}}
{{--                    <div class="input-block mb-3">--}}
{{--                        <div class="mb-3">--}}
{{--                            <label class="form-label">New Password</label>--}}
{{--                            <div class="pass-group" id="passwordInput">--}}
{{--                                <input type="password" name="new_password" id="new_password"--}}
{{--                                       class="form-control pass-input" placeholder="Enter New Password"--}}
{{--                                       autocomplete="new-password" required>--}}
{{--                                <div class="invalid-feedback" id="new_password_error"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="password-strength d-flex" id="passwordStrength">--}}
{{--                            <span id="poor"></span>--}}
{{--                            <span id="weak"></span>--}}
{{--                            <span id="strong"></span>--}}
{{--                            <span id="heavy"></span>--}}
{{--                        </div>--}}
{{--                        <div id="passwordInfo" class="mb-2"></div>--}}
{{--                        <p class="fs-12">Use 8 or more characters with a mix of letters, numbers &amp; symbols.</p>--}}
{{--                    </div>--}}
{{--                    <div class="mb-3">--}}
{{--                        <div class="d-flex align-items-center justify-content-between flex-wrap">--}}
{{--                            <label class="form-label">Confirm Password</label>--}}
{{--                        </div>--}}
{{--                        <input type="password" name="confirm_password" id="confirm_password" class="form-control"--}}
{{--                               placeholder="Confirm Password" autocomplete="new-password" required>--}}
{{--                        <div class="invalid-feedback" id="confirm_password_error"></div>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <button type="submit" class="btn btn-lg btn-linear-primary w-100 forgot_btn">Save Changes</button>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="modal fade" id="success_modal" tabindex="-1" aria-hidden="true">--}}
{{--    <div class="modal-dialog modal-dialog-centered">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-body text-center">--}}
{{--                <div class="mb-4">--}}
{{--                    <span class="success-icon mx-auto mb-4">--}}
{{--                        <i class="ti ti-check"></i>--}}
{{--                    </span>--}}
{{--                    <h4 class="mb-1">Login Successful</h4>--}}
{{--                    <p>Welcome back to Service Link GTA! We&#039;re glad to have you on board. Explore and enjoy our services.--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<div class="modal fade" id="otp_error" tabindex="-1" aria-hidden="true">--}}
{{--    <div class="modal-dialog modal-dialog-centered modal-lg">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-body text-center">--}}
{{--                <div class="mb-4">--}}
{{--                    <span class="error-icon mx-auto mb-4">--}}
{{--                        <i class="ti ti-alert"></i>--}}
{{--                    </span>--}}
{{--                    <h4 class="mb-1">OTP Verification Failed</h4>--}}
{{--                    <p>We are currently experiencing technical difficulties with our OTP service. Please log in using your email and password. We apologize for the inconvenience and appreciate your understanding.</p>--}}
{{--                </div>--}}
{{--                <a href="#!" data-bs-dismiss="modal" class="btn btn-linear-primary">Close</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}





{{--<div class="modal fade" id="otp-email-reg-modal" tabindex="-1" data-bs-backdrop="static" aria-hidden="true">--}}
{{--    <div class="modal-dialog modal-dialog-centered">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header d-flex align-items-center justify-content-end pb-0 border-0">--}}
{{--                <a href="#!" data-bs-dismiss="modal" aria-label="Close">--}}
{{--                    <i class="ti ti-circle-x-filled fs-20"></i>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <div class="modal-body p-4">--}}
{{--                <form action="#" class="digit-group">--}}
{{--                    <div class="text-center mb-3">--}}
{{--                        <h3 class="mb-2">Email OTP Verification</h3>--}}
{{--                        <p class="fs-14">OTP sent to your email address</p>--}}
{{--                    </div>--}}
{{--                    <div class="text-center otp-input">--}}
{{--                        <div class="inputcontainerreg">--}}

{{--                        </div>--}}
{{--                        <span id="error_email_reg_message" class="text-danger"></span>--}}
{{--                        <div>--}}
{{--                            <div class="badge bg-danger-transparent mb-3">--}}
{{--                                <p class="d-flex align-items-center "><i class="ti ti-clock me-1"></i><span id="otp-reg-timer">00:00</span></p>--}}
{{--                            </div>--}}
{{--                            <div class="mb-3 d-flex justify-content-center">--}}
{{--                                <p>Didn t get the OTP? <a href="#!" class="resendRegEmailOtp text-primary">Resend OTP</a></p>--}}
{{--                            </div>--}}
{{--                            <div>--}}
{{--                                <button type="button" id="verify-email-red-otp-btn" class="verify-email-reg-otp-btn btn btn-lg btn-linear-primary w-100">Verify &amp; Continue</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


{{--<div class="modal fade" id="otp-reg-phone-modal" tabindex="-1" data-bs-backdrop="static" aria-hidden="true">--}}
{{--    <div class="modal-dialog modal-dialog-centered">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header d-flex align-items-center justify-content-end pb-0 border-0">--}}
{{--                <a href="#!" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled fs-20"></i></a>--}}
{{--            </div>--}}
{{--            <div class="modal-body p-4">--}}
{{--                <form action="#" class="digit-group">--}}
{{--                    <div class="text-center mb-3">--}}
{{--                        <h3 class="mb-2">Phone OTP Verification</h3>--}}
{{--                        <p id="otp-reg-sms-message" class="fs-14">OTP sent to your mobile number</p>--}}
{{--                    </div>--}}
{{--                    <div class="text-center otp-input">--}}
{{--                        <div class="inputRegSMSContainer">--}}

{{--                        </div>--}}
{{--                        <span id="error_reg_sms_message" class="text-danger"></span>--}}
{{--                        <div>--}}
{{--                            <div class="badge bg-danger-transparent mb-3">--}}
{{--                                <p class="d-flex align-items-center "><i class="ti ti-clock me-1"></i><span id="otp-reg-sms-timer">00:00</span></p>--}}
{{--                            </div>--}}
{{--                            <div class="mb-3 d-flex justify-content-center">--}}
{{--                                <p>Didn t get the OTP? <a href="#!" class="resendRegSMSOtp text-primary">Resend OTP</a></p>--}}
{{--                            </div>--}}
{{--                            <div>--}}
{{--                                <button type="button" id="verify-reg-sms-otp-btn" class="btn btn-lg btn-linear-primary w-100">Verify &amp; Continue</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}



{{--<div class="modal fade" id="reg_success_modal" tabindex="-1" aria-hidden="true">--}}
{{--    <div class="modal-dialog modal-dialog-centered">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-body text-center">--}}
{{--                <div class="mb-4">--}}
{{--                    <span class="success-icon mx-auto mb-4">--}}
{{--                        <i class="ti ti-check"></i>--}}
{{--                    </span>--}}
{{--                    <h4 class="mb-1">Registration Successful</h4>--}}
{{--                    <p>Welcome to Service Link GTA! We&#039;re glad to have you on board. Explore and enjoy our services.--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


{{--<!-- Provider Modal -->--}}
{{--<div class="modal fade" id="provider" tabindex="-1" aria-hidden="true">--}}
{{--    <div class="modal-dialog modal-lg modal-dialog-centered">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header d-flex align-items-center justify-content-between">--}}
{{--                <h5>Post A Job</h5>--}}
{{--                <a href="#!" data-bs-dismiss="modal" aria-label="Close"><i--}}
{{--                            class="ti ti-circle-x-filled fs-20"></i></a>--}}
{{--            </div>--}}
{{--            <div class="wizard-fieldset">--}}
{{--                <fieldset class="first-field" id="first-field">--}}
{{--                    <form id="providerRegister" autocomplete="off">--}}
{{--                        <!-- <input type="hidden" name="_token" value="cXPzE4SORBCkhln6AtlYfl5xuA4UeqmB5sfh31f8" autocomplete="off"> -->--}}

{{--                        <div class="modal-body pb-1">--}}

{{--                            <div class="mb-3">--}}
{{--                                <div class="text-center mb-3">--}}
{{--                                    <h3 class="mb-2">Registration</h3>--}}
{{--                                    <p>Enter your credentials to access your account</p>--}}
{{--                                </div>--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <div class="mb-3">--}}
{{--                                            <label class="form-label">First Name</label>--}}
{{--                                            <input type="text" name="provider_first_name" id="provider_first_name"--}}
{{--                                                   class="form-control" placeholder="Enter First Name">--}}
{{--                                            <div class="invalid-feedback" id="provider_first_name_error"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <div class="mb-3">--}}
{{--                                            <label class="form-label">Last Name</label>--}}
{{--                                            <input type="text" name="provider_last_name" id="provider_last_name"--}}
{{--                                                   class="form-control" placeholder="Enter Last Name">--}}
{{--                                            <div class="invalid-feedback" id="provider_last_name_error"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <div class="mb-3">--}}
{{--                                            <label class="form-label">User Name</label>--}}
{{--                                            <input type="text" name="provider_name" id="provider_name"--}}
{{--                                                   class="form-control" placeholder="Enter Name">--}}
{{--                                            <div class="invalid-feedback" id="provider_name_error"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <div class="mb-3">--}}
{{--                                            <label class="form-label">Email</label>--}}
{{--                                            <input type="email" name="provider_email" id="provider_email"--}}
{{--                                                   class="form-control" placeholder="Enter Email">--}}
{{--                                            <div class="invalid-feedback" id="provider_email_error"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <div class="mb-3">--}}
{{--                                            <label class="form-label">Phone Number</label>--}}
{{--                                            <input class="form-control" id="provider_phone_number"--}}
{{--                                                   name="provider_phone_number" maxlength="12" type="text"--}}
{{--                                                   placeholder="Enter Phone Number" autocomplete="tel">--}}
{{--                                            <div class="invalid-feedback" id="provider_phone_number_error"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-md-6">--}}
{{--                                        <div class="mb-3">--}}
{{--                                            <div class="d-flex align-items-center justify-content-between flex-wrap">--}}
{{--                                                <label class="form-label">Password</label>--}}
{{--                                            </div>--}}
{{--                                            <div class="input-group">--}}
{{--                                                <input type="password" name="provider_password" id="provider_password"--}}
{{--                                                       class="form-control" placeholder="Enter Password"--}}
{{--                                                       autocomplete="current-password">--}}
{{--                                                <button class="btn btn-outline-dark" type="button"--}}
{{--                                                        id="providerTogglePassword" tabindex="-1">--}}
{{--                                                    <i class="fas fa-eye" id="toggleIcon"></i>--}}
{{--                                                </button>--}}
{{--                                            </div>--}}
{{--                                            <div class="invalid-feedback" id="provider_password_error"></div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}


{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="modal-footer text-end">--}}
{{--                            <button class="btn btn-linear-primary" id="get_started_btn">Get Started</button>--}}
{{--                        </div>--}}
{{--                    </form>--}}

{{--                </fieldset>--}}
{{--                <fieldset class="second-field" id="second-field">--}}
{{--                    <form id="companyInfo">--}}
{{--                        <div class="modal-body pb-1">--}}
{{--                            <div class="bg-light-300 p-3 br-10 text-center mb-4">--}}
{{--                                <h4>List your service &amp; Get the leads around you</h4>--}}
{{--                                <p>List your service &amp; Get the leads around you</p>--}}
{{--                            </div>--}}
{{--                            <div class="mb-4">--}}
{{--                                <label class="form-label">What type of Service do you Provide?</label>--}}
{{--                                <select name="category_id" id="categorySelect" class="form-control">--}}
{{--                                    <option value="">Select Category</option>--}}
{{--                                    <option value="17">General Plumbing</option>--}}
{{--                                    <option value="18">Bathroom Plumbing</option>--}}
{{--                                    <option value="19">Kitchen Plumbing</option>--}}
{{--                                    <option value="20">Emergency Plumbing</option>--}}
{{--                                    <option value="21">Drain &amp; Sewer</option>--}}
{{--                                    <option value="22">Water Heater</option>--}}
{{--                                    <option value="23">Water Filtration &amp; Softening</option>--}}
{{--                                    <option value="24">Outdoor Plumbing</option>--}}
{{--                                    <option value="25">Commercial Plumbing</option>--}}
{{--                                    <option value="26">Toilet &amp; Faucet</option>--}}
{{--                                    <option value="27">Gas Line</option>--}}
{{--                                    <option value="28">Leak Detection &amp; Repair</option>--}}
{{--                                    <option value="29">Frozen Pipe Services</option>--}}
{{--                                    <option value="30">Backflow Preven</option>--}}
{{--                                    <option value="31">Sump Pump</option>--}}
{{--                                    <option value="32">Renovation Plumbing</option>--}}
{{--                                    <option value="33">Trenchless Pipe Repair</option>--}}
{{--                                    <option value="34">Hydro Jetting</option>--}}
{{--                                    <option value="35">Boiler</option>--}}
{{--                                    <option value="36">Smart Plumbing Installations</option>--}}
{{--                                    <option value="37">Plumbing Maintenance Plan</option>--}}
{{--                                </select>--}}
{{--                                <div class="invalid-feedback" id="category_id_error"></div>--}}
{{--                            </div>--}}
{{--                            <div class="mb-2">--}}
{{--                                <label class="form-label">What type of Sub Services do you Provide?</label>--}}
{{--                                <div class="form-check ps-0" id="subcategories">--}}
{{--                                    <!-- Dynamically populated subcategories go here -->--}}
{{--                                </div>--}}
{{--                                <span class="invalid-feedback" id="subcategory_ids_error"></span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="modal-body pb-1">--}}
{{--                            <div--}}
{{--                                    class="bg-light-300 p-3 br-10 text-center mb-4 d-flex align-items-center justify-content-around">--}}
{{--                                <div class="d-flex align-items-center justify-content-center gap-2">--}}
{{--                                    <input type="radio" id="individual" name="user_type" checked>--}}
{{--                                    <label for="individual" class="fw-bold">Individual</label>--}}
{{--                                </div>--}}
{{--                                <div class="d-flex align-items-center justify-content-center gap-2">--}}
{{--                                    <input type="radio" id="company" name="user_type">--}}
{{--                                    <label for="company" class="fw-bold">Company</label>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div style="display: none;" id="company_details">--}}
{{--                                <div class="mb-4">--}}
{{--                                    <label class="form-label">Company Name</label>--}}
{{--                                    <input type="text" name="company_name" id="company_name" class="form-control"--}}
{{--                                           placeholder="Enter Company Name">--}}
{{--                                    <div class="invalid-feedback" id="company_name_error"></div>--}}
{{--                                </div>--}}
{{--                                <div class="mb-4">--}}
{{--                                    <label class="form-label">Company Website</label>--}}
{{--                                    <input type="text" name="company_website" id="company_website" class="form-control"--}}
{{--                                           placeholder="Enter Company Website">--}}
{{--                                    <div class="invalid-feedback" id="company_website_error"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="mb-3">--}}
{{--                                <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-2">--}}
{{--                                    <div class="form-check">--}}
{{--                                        <input class="form-check-input" type="checkbox" name="provider_terms_policy"--}}
{{--                                               id="provider_terms_policy">--}}
{{--                                        <label class="form-check-label" for="provider_terms_policy">--}}
{{--                                            I agree to <a href="terms-conditions.html"--}}
{{--                                                          class="text-primary text-decoration-underline">Terms of use</a>--}}
{{--                                            & <a href="privacy-policy.html"--}}
{{--                                                 class="text-primary text-decoration-underline">Privacy policy</a>--}}
{{--                                        </label>--}}
{{--                                        <div class="invalid-feedback" id="provider_terms_policy_error"></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="modal-footer d-flex align-items-center justify-content-between">--}}
{{--                            <a href="#!" class="btn btn-light prev_btn"><i--}}
{{--                                        class="ti ti-arrow-left me-2"></i>Back</a>--}}
{{--                            <button id="provider_register_btn"--}}
{{--                                    class="provider_register_btn btn btn-linear-primary">Sign Up</button>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </fieldset>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<!-- /Provider Modal -->--}}

{{--<!-- Email Reg otp Modal -->--}}
{{--<div class="modal fade" id="otp-email-prov-reg-modal" tabindex="-1" data-bs-backdrop="static" aria-hidden="true">--}}
{{--    <div class="modal-dialog modal-dialog-centered">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header d-flex align-items-center justify-content-end pb-0 border-0">--}}
{{--                <a href="#!" data-bs-dismiss="modal" aria-label="Close">--}}
{{--                    <i class="ti ti-circle-x-filled fs-20"></i>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <div class="modal-body p-4">--}}
{{--                <form action="#" class="digit-group">--}}
{{--                    <div class="text-center mb-3">--}}
{{--                        <h3 class="mb-2">Email OTP Verification</h3>--}}
{{--                        <p class="fs-14">OTP sent to your email address</p>--}}
{{--                    </div>--}}
{{--                    <div class="text-center otp-input">--}}
{{--                        <div class="inputProvideContainerreg">--}}

{{--                        </div>--}}
{{--                        <span id="error_prov_email_reg_message" class="text-danger"></span>--}}
{{--                        <div>--}}
{{--                            <div class="badge bg-danger-transparent mb-3">--}}
{{--                                <p class="d-flex align-items-center "><i class="ti ti-clock me-1"></i><span--}}
{{--                                            id="otp-pro-timer">00:00</span></p>--}}
{{--                            </div>--}}
{{--                            <div class="mb-3 d-flex justify-content-center">--}}
{{--                                <p>Didn t get the OTP? <a href="#!"--}}
{{--                                                          class="resendProRegEmailOtp text-primary">Resend OTP</a></p>--}}
{{--                            </div>--}}
{{--                            <div>--}}
{{--                                <button type="button" id="verify-email-prov-reg-otp-btn"--}}
{{--                                        class="verify-email-prov-reg-otp-btn btn btn-lg btn-linear-primary w-100">Verify &amp; Continue</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<!-- /Email otp Modal -->--}}


{{--<!-- Phone otp Modal -->--}}
{{--<div class="modal fade" id="otp-pro-reg-phone-modal" tabindex="-1" data-bs-backdrop="static" aria-hidden="true">--}}
{{--    <div class="modal-dialog modal-dialog-centered">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header d-flex align-items-center justify-content-end pb-0 border-0">--}}
{{--                <a href="#!" data-bs-dismiss="modal" aria-label="Close"><i--}}
{{--                            class="ti ti-circle-x-filled fs-20"></i></a>--}}
{{--            </div>--}}
{{--            <div class="modal-body p-4">--}}
{{--                <form action="#" class="digit-group">--}}
{{--                    <div class="text-center mb-3">--}}
{{--                        <h3 class="mb-2">Phone OTP Verification</h3>--}}
{{--                        <p id="otp-prov-reg-sms-message" class="fs-14">OTP sent to your mobile number</p>--}}
{{--                    </div>--}}
{{--                    <div class="text-center otp-input">--}}
{{--                        <div class="inputProRegSMSContainer">--}}

{{--                        </div>--}}
{{--                        <span id="error_pro_reg_sms_message" class="text-danger"></span>--}}
{{--                        <div>--}}
{{--                            <div class="badge bg-danger-transparent mb-3">--}}
{{--                                <p class="d-flex align-items-center "><i class="ti ti-clock me-1"></i><span--}}
{{--                                            id="otp-pro-reg-sms-timer">00:00</span></p>--}}
{{--                            </div>--}}
{{--                            <div class="mb-3 d-flex justify-content-center">--}}
{{--                                <p>Didn t get the OTP? <a href="#!"--}}
{{--                                                          class="resendProRegSMSOtp text-primary">Resend OTP</a></p>--}}
{{--                            </div>--}}
{{--                            <div>--}}
{{--                                <button type="button" id="verify-pro-reg-sms-otp-btn"--}}
{{--                                        class="verify-pro-reg-sms-otp-btn btn btn-lg btn-linear-primary w-100">Verify &amp; Continue</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<!-- /Phone otp Modal -->--}}




{{--<!-- Success Modal -->--}}
{{--<div class="modal fade" id="reg_success_modal" tabindex="-1" aria-hidden="true">--}}
{{--    <div class="modal-dialog modal-dialog-centered">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-body text-center">--}}
{{--                <div class="mb-4">--}}
{{--                    <span class="success-icon mx-auto mb-4">--}}
{{--                        <i class="ti ti-check"></i>--}}
{{--                    </span>--}}
{{--                    <h4 class="mb-1">Registration Successful</h4>--}}
{{--                    <p>Welcome to Service Link GTA! We&#039;re glad to have you on board. Explore and enjoy our services.--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<!-- /Success Modal -->--}}
{{--<div id="language-settings" data-language-id="1"></div>--}}
{{--<div id="lead-settings" data-lead-status="1"></div>--}}
{{--<div id="datatable_data" data-length_menu="Show _MENU_ entries" data-info="Showing _START_ to _END_ of _TOTAL_ entries" data-info_empty="No entries available" data-info_filter="(filtered from _MAX_ total entries)" data-search="Search:" data-zero_records="No matching records found" data-first="First" data-last="Last" data-next="Next" data-prev="Previous"></div>--}}

{{--<div class="modal fade" id="newsletter_success_modal" tabindex="-1" aria-hidden="true">--}}
{{--    <div class="modal-dialog modal-dialog-centered modal-lg">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-body text-center">--}}
{{--                <div class="mb-4">--}}
{{--						<span class="success-icon mx-auto mb-4">--}}
{{--							<i class="ti ti-check"></i>--}}
{{--						</span>--}}
{{--                    <h4 class="mb-1">Newsletter Submission Successful</h4>--}}
{{--                    <p>Thank you for subscribing to our newsletter! You will start receiving updates and news directly to your inbox.</p>--}}
{{--                </div>--}}
{{--                <a href="#!" data-bs-dismiss="modal" class="btn btn-linear-primary">Close</a>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

{{--<!-- success message Modal -->--}}
{{--<div class="modal fade" id="success-modal" tabindex="-1" data-bs-backdrop="static" aria-hidden="true">--}}
{{--    <div class="modal-dialog modal-dialog-centered">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header d-flex align-items-center justify-content-end pb-0 border-0">--}}
{{--                <a href="#!" data-bs-dismiss="modal" aria-label="Close"><i--}}
{{--                            class="ti ti-circle-x-filled fs-20"></i></a>--}}
{{--            </div>--}}
{{--            <div class="modal-body p-4">--}}
{{--                <div class="text-center">--}}
{{--                    <span class="success-check mb-3 mx-auto"><i class="ti ti-check"></i></span>--}}
{{--                    <h4 class="mb-2">Success</h4>--}}
{{--                    <p>Your new password has been successfully saved</p>--}}
{{--                    <div>--}}
{{--                        <button type="submit" class="btn btn-lg btn-linear-primary w-100">Back to Sign In</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<!-- /success message Modal -->--}}

{{--<!-- Delete Account -->--}}
{{--<div class="modal fade custom-modal" id="del-account">--}}
{{--    <div class="modal-dialog modal-dialog-centered">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header d-flex align-items-center justify-content-between border-bottom">--}}
{{--                <h5 class="modal-title">Delete Account</h5>--}}
{{--                <a href="#!" data-bs-dismiss="modal" aria-label="Close"><i class="ti ti-circle-x-filled fs-20"></i></a>--}}
{{--            </div>--}}
{{--            <form id="deleteAccountForm" autocomplete="off">--}}
{{--                <div class="modal-body">--}}
{{--                    <p class="mb-3">Are you sure you want to delete This Account? To delete your account, Type your password.</p>--}}
{{--                    <div class="mb-0">--}}
{{--                        <label class="form-label">Password</label>--}}
{{--                        <div class="pass-group">--}}
{{--                            <input type="password" class="form-control pass-input" name="password" id="password_del" placeholder="*************">--}}
{{--                            <span class="toggle-password feather-eye-off"></span>--}}
{{--                        </div>--}}
{{--                        <span class="error-text text-danger" id="password_del_error"></span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="modal-footer">--}}
{{--                    <a href="#!" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</a>--}}
{{--                    <button type="submit" class="btn btn-dark" id="deleteAccountBtn" data-id="" data-delete="Delete Account" data-password_required="Password is required.">Delete Account</button>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<!-- Delete Account -->--}}
