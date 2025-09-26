<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Service Link GTA | @yield('title', 'Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/css/custom.css') }}">
    <link rel='shortcut icon' type='image/x-icon' href='{{ asset('admin-assets/img/favicon.png') }}' />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <style>
        .ajs-message.ajs-visible {
            color: #fff;
            font-size: 14px !important;
            font-weight: 600;
            border-radius: 25px;
        }
    </style>
    <style>
        .btn-loading {
            position: relative;
            pointer-events: none;
            opacity: 0.7;
        }
        .btn-loading::after {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            width: 1rem;
            height: 1rem;
            border: 2px solid #fff;
            border-top: 2px solid transparent;
            border-radius: 50%;
            transform: translate(-50%, -50%);
            animation: spin 0.6s linear infinite;
        }
        @keyframes spin {
            100% { transform: translate(-50%, -50%) rotate(360deg); }
        }
    </style>
    @stack('styles')

</head>

<body>
<div class="loader"></div>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
@include('admin.partials.menu')
        <!-- Main Content -->
        @yield('main-content')
        <footer class="main-footer">
            <div class="footer-left">
                <a href="javascript:">Service Link GTA</a>
            </div>
            <div class="footer-right">
            </div>
        </footer>
    </div>
</div>
<!-- General JS Scripts -->
<script src="{{ asset('admin-assets/js/app.min.js') }}"></script>
<!-- JS Libraies -->


<!-- Page Specific JS File -->
<script src="{{ asset('admin-assets/js/page/index.js') }}"></script>
<!-- Template JS File -->
<script src="{{ asset('admin-assets/js/scripts.js') }}"></script>
<!-- Custom JS File -->
<script src="{{ asset('admin-assets/js/custom.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>











{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>--}}
<script src="https://js.pusher.com/8.4.0/pusher.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/laravel-echo@1.11.3/dist/echo.iife.js"></script>
<script>
    $(document).ready(function() {
        Pusher.logToConsole = true;

        let adminId = 1;

        const pusher = new Pusher('{{ env("PUSHER_APP_KEY") }}', {
            cluster: '{{ env("PUSHER_APP_CLUSTER") }}',
            forceTLS: true
        });

        const channel = pusher.subscribe('notifications.' + adminId);
        channel.bind('notification-created', function(data) {
            var $counter = $(".notification-count");
            if ($counter.length) {
                var count = parseInt($counter.text()) || 0;
                $counter.text(count + 1);
            }
            var $list = $(".dropdown-list-content");
            if ($list.length) {
                var html = `
                    <a href="/admin/notifications/read/${data.notification.id}"
                       class="dropdown-item dropdown-item-unread">
                        <span class="dropdown-item-icon bg-primary text-white">
                            <i class="fas fa-bell"></i>
                        </span>
                        <span class="dropdown-item-desc">
                            ${data.notification.title} <br>
                            <small>${data.notification.message}</small>
                            <span class="time">Just now</span>
                        </span>
                    </a>
                `;
                $list.prepend(html);
            }
        });

        $(document).on('click', '.mark-all-read', function(e){
            e.preventDefault();
            $.get("{{ route('admin.notifications.markAll') }}", function(){
                $(".notification-count").text(0);
                $(".dropdown-item-unread").removeClass("dropdown-item-unread");
            });
        });
    });
</script>






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