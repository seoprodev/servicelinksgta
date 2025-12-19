@extends('frontend.partials.master')
@section('title', 'Home')
@push('styles')
@endpush

@section('main-content')
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title mb-2">Contact Us</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="breadcrumb-bg">
                <img src="{{ asset('frontend-assets') }}/img/bg/breadcrumb-bg-01.png" class="breadcrumb-bg-1" alt="Img">
                <img src="{{ asset('frontend-assets') }}/img/bg/breadcrumb-bg-02.png" class="breadcrumb-bg-2" alt="Img">
            </div>
        </div>
    </div>

    <div class="page-wrapper">
        <div class="content">
            <div class="container">
                <div class="contacts">
                    <div class="contacts-overlay-img d-none d-lg-block">
                        <img src="{{ asset('frontend-assets') }}/img/bg/bg-07.png" alt="img" class="img-fluid">
                    </div>
                    <div class="contacts-overlay-sm d-none d-lg-block">
                        <img src="{{ asset('frontend-assets') }}/img/bg/bg-08.png" alt="img" class="img-fluid">
                    </div>


                    <div class="contact-details">
                        <div class="row justify-content-center">
                            <div class="col-md-6 col-lg-4 d-flex">
                                <div class="card flex-fill">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="rounded-circle"><i class="ti ti-phone text-primary"></i></span>
                                            <div>
                                                <h6 class="fs-18 mb-1">Phone Number</h6>
                                                <p class="fs-14">4357645346</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 d-flex">
                                <div class="card flex-fill">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="rounded-circle"><i class="ti ti-mail text-primary"></i></span>
                                            <div>
                                                <h6 class="fs-18 mb-1">Email Address</h6>
                                                <p class="fs-14">developer@seopromarvel.com</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 d-flex">
                                <div class="card flex-fill">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <span class="rounded-circle"><i class="ti ti-map-pin text-primary"></i></span>
                                            <div>
                                                <h6 class="fs-18 mb-1">Address</h6>
                                                <p class="fs-14">8500 N Stemmons Fwy 1013 111</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 d-flex align-items-center">
                            <div class="contact-img flex-fill">
                                <img src="{{ asset('frontend-assets') }}/img/services/service-76.jpg" class="img-fluid" alt="img" loading="lazy">
                            </div>
                        </div>
                        <div class="col-md-6 d-flex align-items-center justify-content-center">
                            <div class="contact-queries flex-fill">
                                <h2>Get In Touch</h2>
                                <form id="contact-form">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <div class="form-group">
                                                    <label for="contact_name"
                                                           class="form-label">Your Name</label>
                                                    <input class="form-control" type="text" name="name" id="contact_name"
                                                           placeholder="Enter your name">
                                                    <span class="error-text text-danger" id="contact_name_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <div class="form-group">
                                                    <label for="contact_email"
                                                           class="form-label">Your Email Address</label>
                                                    <input class="form-control" type="text" name="email" id="contact_email"
                                                           placeholder="Enter your email address">
                                                    <span class="error-text text-danger" id="contact_email_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <div class="form-group">
                                                    <label for="contact_phone_number"
                                                           class="form-label">Your Phone Number</label>
                                                    <input class="form-control" type="text" name="phone_number"
                                                           id="contact_phone_number"
                                                           placeholder="Enter your phone number">
                                                    <span class="error-text text-danger"
                                                          id="contact_phone_number_error"></span>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="form-group">
                                                    <label for="message" class="form-label">Your Message</label>
                                                    <textarea class="form-control" name="message" id="message"
                                                              placeholder="Type your message here"
                                                              rows="4"></textarea>
                                                    <span class="error-text text-danger" id="contact_message_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 submit-btn">
                                            <button type="submit" class="btn btn-dark d-flex align-items-center">
                                                Send Message<i class="feather-arrow-right-circle ms-2"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /Page Wrapper -->
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#contact-form').on('submit', function(e) {
                e.preventDefault();

                // Clear previous errors
                $('.error-text').text('');

                $.ajax({
                    url: "{{ route('contact.submit') }}",
                    method: "POST",
                    data: $(this).serialize(),
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.success,
                            showConfirmButton: false,
                            timer: 2000
                        });
                        $('#contact-form')[0].reset();
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            let errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                $('#contact_' + key + '_error').text(value[0]);
                            });

                            Swal.fire({
                                icon: 'error',
                                title: 'Validation Error',
                                text: 'Please fix the highlighted fields.',
                                confirmButtonColor: '#d33'
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong. Please try again later.',
                                confirmButtonColor: '#d33'
                            });
                        }
                    }
                });
            });
        });

    </script>
@endpush
