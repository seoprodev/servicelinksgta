<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="cXPzE4SORBCkhln6AtlYfl5xuA4UeqmB5sfh31f8">
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
            font-size: 15px;
            font-weight: 600;
            border-radius: 25px;
        }
    </style>
    @stack('styles')

</head>

<body data-frontend="home" data-lang="en" data-authid="" data-language_id="1">

<!-- /Header -->
<div class="main-wrapper">
    <!-- Header -->
@include('frontend.provider.partials.menu')

    <div class="page-wrapper">
        <div class="content container-fluid pb-0">
            <div class="row justify-content-center">

                @yield('provider-dashboard-content')
            </div>
        </div>

    </div>


</div>


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
{{--<script src="{{ asset('frontend-assets/js/home-page.js') }}"></script>--}}
{{--<script src="{{ asset('frontend-assets/js/user-script.js') }}"></script>--}}
<script src="{{ asset('frontend-assets/js/user-register.js') }}"></script>
{{--<script src="{{ asset('frontend-assets/js/user-login.js') }}"></script>--}}
{{--<script src="{{ asset('frontend-assets/js/provider-register.js') }}"></script>--}}
<script src="{{ asset('frontend-assets/js/custom.js') }}"></script>
<script src="{{ asset('frontend-assets/js/booking.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
@if(session('errors'))
    @php
        $validationErrors = session('errors')->all();
    @endphp
    <script>
        @foreach($validationErrors as $error)
        alertify.error('{{$error}}');
        @endforeach
    </script>
@endif
@if(session()->has('success'))
    <script>
        alertify.success('{{ session('success') }}')
    </script>
@endif
@if(session()->has('error'))
    <script>
        alertify.error('{{ session('error') }}')
    </script>
@endif
@stack('scripts')
</body>
</html>