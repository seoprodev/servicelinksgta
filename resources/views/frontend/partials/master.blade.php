<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description"
          content="TruelySell offers reliable construction, removals, and electrical services for homes and businesses. Get expert solutions at competitive prices. Contact us today!">
    <meta name="keywords"
          content="Your Trusted Partner for Construction, Removals, and Electrical Services - TruelySell">
    <title>Service Link GTA | @yield('title', 'Service Link GTA')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('frontend-assets/img/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('frontend-assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend-assets/plugins/toastr/toatr.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend-assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend-assets/plugins/tabler-icons/tabler-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend-assets/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend-assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend-assets/plugins/owlcarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend-assets/plugins/fancybox/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend-assets/plugins/intltelinput/css/intlTelInput.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend-assets/css/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend-assets/plugins/boxicons/css/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend-assets/css/stylenewf195.css?v=2.1') }}">
    <link rel="stylesheet" href="{{ asset('frontend-assets/css/custom.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
<style>
    .ajs-message.ajs-visible {
        color: #fff;
        font-size: 14px !important;
        font-weight: 600;
        border-radius: 25px;
    }
    form#post-a-job {
        margin: 0px;
    }
</style>
    @stack('styles')

</head>

<body data-frontend="home" data-lang="en" data-authid="" data-language_id="1">
<div class="cookie-consent hidden">
    <div>
        <div class="cookie-consent__message d-flex gap-3">
            <div class="mb-2">
                <p>We use cookies to improve your browsing experience, analyze site traffic, and serve personalized
                    content. By clicking "Accept", you agree to our use of cookies.</p>
            </div>
            <a class="text-primary text-decoration-underline" href="#">
                Learn more
            </a>
        </div>
        <div class="d-flex justify-content-center">
            <button class="cookie-consent__agree">
                Accept Cookies
            </button>
        </div>
    </div>
</div>
<div id="pageLoader" class="loader_front">
    <div class="loader-content">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <p>Sending OTP, please wait...</p>
    </div>
</div>

<div id="NewletterpageLoader" class="loader_front">
    <div class="loader-content">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
        <p>Sending Newsletter, please wait...</p>
    </div>
</div>


<style>
    .logo img {
        max-height: fit-content
    }
</style>
<header class="header header-new">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg header-nav">
            <div class="navbar-header">
                <a id="mobile_btn" href="#!">
                    <span class="bar-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                </a>
                <a href="{{ route('front.home') }}" class="navbar-brand logo">
                    <img src="{{ asset('frontend-assets') }}/img/logo.png" class="img-fluid" alt="Logo" width="180">
                </a>
                <a href="{{ route('front.home') }}" class="navbar-brand logo-small">
                    <img src="{{ asset('frontend-assets') }}/img/favicon.png" class="img-fluid" alt="Logo">
                </a>
            </div>
            <div class="main-menu-wrapper">
                <div class="menu-header">
                    <a href="{{ route('front.home') }}" class="menu-logo">
                        <img src="{{ asset('frontend-assets') }}/img/logo.png" class="img-fluid" alt="Logo">
                    </a>
                    <a id="menu_close" class="menu-close" href="#!"> <i class="fas fa-times"></i></a>
                </div>
                <div class="mobile-header d-flex flex-column justify-content-between h-100">
                    <ul class="main-nav align-items-lg-center list-menus">
                        <li class="d-none d-lg-block">
                            <div>
                                <div class="dropdown">
                                    <a href="#!" class="dropdown-toggle bg-light-300 fw-medium"
                                       data-bs-toggle="dropdown">
                                        <i class="ti ti-layout-grid me-1"></i>Categories
                                    </a>
                                    <ul class="dropdown-menu home-category-scroll">
                                        @foreach($frontCategories as $category)
                                            <li>
                                                <a href="javascript:void(0);"
                                                   class="dropdown-item select-category"
                                                   data-id="{{ $category->id }}">
                                                    {{ $category->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li class="{{ request()->routeIs('front.home') ? 'active' : '' }}">
                            <a href="{{ route('front.home') }}"
                               target="_self">
                                Home
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('front.service') ? 'active' : '' }}">
                            <a href="{{ route('front.service') }}"
                               target="_self">
                                Leads
                            </a>
                        </li>
                        <li class="{{ request()->routeIs('front.about') ? 'active' : '' }}">
                            <a href="{{ route('front.about') }}"
                               target="_self">
                                About Us
                            </a>
                        </li>
                        <li class="blog_menu {{ request()->routeIs('front.blog') ? 'active' : '' }}">
                            <a href="{{ route('front.blog') }}"
                               target="_self">
                                Blogs
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#!" data-bs-toggle="modal"
                               data-bs-target="#cleint-sign-up">
                                Post A Job
                            </a>
                        </li>
                        {{--
                        <li class="d-none d-lg-block">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle d-flex align-items-center language-selects"
                                        type="button" id="languageDropdown" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                    <img src="{{ asset('frontend-assets') }}/img/flags/en.png" class="me-2" alt="Logo">
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center language-select"
                                           data-id="1" href="#!">
                                            <img src="{{ asset('frontend-assets') }}/img/flags/en.png" class="me-2"
                                                 alt="Logo">
                                            English
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center language-select"
                                           data-id="46" href="#!">
                                            <img src="{{ asset('frontend-assets') }}/img/flags/fr.png" class="me-2"
                                                 alt="Logo">
                                            French
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        --}}
                    </ul>
                    <ul>
                        <li class="nav-item px-3 py-1 w-100 d-lg-none d-block">
                            <a class="nav-link btn btn-light" href="#" data-bs-toggle="modal"
                               data-bs-target="#all-login-modal"><i class="ti ti-lock me-2"></i>Sign in</a>
                        </li>
                        <li class="nav-item px-3 py-1 mb-3 d-lg-none d-block">
                            <a class="nav-link btn btn-linear-primary" href="#" data-bs-toggle="modal"
                               data-bs-target="#provider-sign-up"><i
                                        class="ti ti-user-filled me-2"></i>Join as a Professional</a>
                        </li>
                    </ul>
                </div>

            </div>

            <div class="header-btn d-flex align-items-center">
                <div class="provider-head-links d-block d-sm-none">
                    <ul class="main-nav align-items-lg-center list-menus">
                        <li>
                            <div class="dropdown">
                                <button class="btn dropdown-toggle d-flex align-items-center language-selects"
                                        type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                >


                                    <img src="{{ asset('frontend-assets') }}/img/flags/en.png"
                                         alt="Flag">
                                </button>

                                <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center language-select languageImg"
                                           data-id="1" href="#!">
                                            <img src="{{ asset('frontend-assets') }}/img/flags/en.png"
                                                 alt="Flag">
                                            English
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center language-select languageImg"
                                           data-id="46" href="#!">
                                            <img src="{{ asset('frontend-assets') }}/img/flags/fr.png"
                                                 alt="Flag">
                                            French
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>


            </div>

            <div class="header-btn d-flex align-items-center">
                <div class="provider-head-links d-block d-sm-none">
                    <ul class="main-nav align-items-lg-center list-menus">
                        <li>
                            <div class="dropdown">
                                <button class="btn dropdown-toggle d-flex align-items-center language-selects" type="button" data-bs-toggle="dropdown" aria-expanded="false">


                                    <img src="{{ asset('frontend-assets/img/flags/en.png') }}" alt="Flag">
                                </button>

                                <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center language-select languageImg" data-id="1" href="#!">
                                            <img src="{{ asset('frontend-assets/img/flags/en.png') }}" alt="Flag">
                                            English
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item d-flex align-items-center language-select languageImg" data-id="46" href="#!">
                                            <img src="{{ asset('frontend-assets/img/flags/fr.png') }}" alt="Flag">
                                            French
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>


                @if(auth()->check())
                    <div class="provider-head-links">
                        {{-- 🔔 Notification Bell --}}
                        <a href="#!" class="d-flex align-items-center justify-content-center me-2 notify-link"
                           data-bs-toggle="dropdown" data-bs-auto-close="outside">
                            <i class="feather-bell bellcount"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end notification-dropdown notify-users p-4">
                            <div class="d-flex dropdown-body align-items-center justify-content-between border-bottom p-0 pb-3 mb-3 notify-header">
                                <h6 class="notification-title">
                                    Notifications <span class="fs-18 text-gray notificationcount"></span>
                                </h6>
                                <div class="d-flex align-items-center">
                                    <a class="text-primary fs-15 me-3 lh-1 markallread" style="display: none;">Clear All</a>
                                </div>
                            </div>
                            <div class="noti-content">
                                <div class="d-flex flex-column" id="notification-data" data-empty_info="No New Notification Found">
                                    <div class="text-center">No New Notification Found</div><br>
                                </div>
                            </div>
                            <div class="d-flex p-0 notification-footer-btn">
                                <a href="#" class="btn btn-light rounded me-2 cancel cancelnotify">Cancel</a>
                                <a href="" class="btn btn-dark rounded viewall">View All</a>
                            </div>
                        </div>
                    </div>

                    {{-- 👤 User Dropdown --}}
                    <div class="dropdown" style="position: relative;">
                        <a href="#!" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="booking-user d-flex align-items-center">
                <span class="user-img">
                    <img src="{{ auth()->user()->profile && auth()->user()->profile->avatar
                                ? asset(auth()->user()->profile->avatar)
                                : asset('frontend-assets/img/profile-default.png') }}"
                         alt="Profile Image"
                         class="img-fluid rounded-circle headerProfileImg">
                </span>
                            </div>
                        </a>
                        <ul class="dropdown-menu p-2" style="position: absolute; left: -7rem;">
                            <li>
                                @if(auth()->user()->user_type === 'provider')
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('provider.dashboard') }}">
                                        <i class="ti ti-layout-grid me-1"></i>Dashboard
                                    </a>
                                @elseif(auth()->user()->user_type === 'client')
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('user.dashboard') }}">
                                        <i class="ti ti-layout-grid me-1"></i>Dashboard
                                    </a>
                                @endif
                            </li>
                            <li>
                                @if(auth()->user()->user_type === 'provider')
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('provider.profile') }}">
                                        <i class="ti ti-user me-1"></i>My Profile
                                    </a>
                                @elseif(auth()->user()->user_type === 'client')
                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('user.profile') }}">
                                        <i class="ti ti-user me-1"></i>My Profile
                                    </a>
                                @endif
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center"
                                   href="javascript:"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="ti ti-logout me-1"></i>Logout
                                </a>
                                <form id="logout-form" action="{{ route('user.logout.process') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    {{-- 🚪 Guest Links --}}
                    <ul class="nav header-navbar-rht">
                        <li class="nav-item pe-1">
                            <a class="nav-link btn btn-light" href="#" data-bs-toggle="modal" data-bs-target="#all-login-modal">
                                <i class="ti ti-lock me-2"></i>Sign in
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-linear-primary" href="#" data-bs-toggle="modal"
                               data-bs-target="#provider-sign-up">
                                <i class="ti ti-user-filled me-2"></i>Join as a Professional
                            </a>
                        </li>
                    </ul>
            @endif




        </nav>
    </div>
</header>
<!-- /Header -->
@yield('main-content')
@include('frontend.partials.footer')
@stack('scripts')
<script>
    $('.toggle--password').click(function() {
        var $button = $(this);
        var $input = $button.siblings('.password--input'); // find input in the same group
        var $icon = $button.find('.toggle--icon');

        if ($input.attr('type') === 'password') {
            $input.attr('type', 'text'); // show password
            $icon.removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
            $input.attr('type', 'password'); // hide password
            $icon.removeClass('fa-eye-slash').addClass('fa-eye');
        }
    });
</script>
</body>
</html>