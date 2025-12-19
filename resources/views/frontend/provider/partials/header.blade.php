<div class="header provider-header">

    <!-- Logo -->
    <div class="header-left active">
        <a href="{{ route('provider.dashboard')}}" class="logo logo-normal">
            <img src="{{ asset('frontend-assets') }}/img/logo.png" alt="Logo" style="height:fit-content;width:fit-content">
        </a>
        <a href="javascript:" class="logo-small">
            <img src="{{ asset('frontend-assets') }}/img/favicon.png" alt="Logo">
        </a>
{{--        <a id="toggle_btn" href="javascript:void(0);">--}}
{{--            <i class="ti ti-menu-deep"></i>--}}
{{--        </a>--}}
        <a href="javascript:" id="toggleSidebar">
            <i class="ti ti-menu-deep"></i>
        </a>
    </div>
    <!-- /Logo -->

    <a id="mobile_btn" class="mobile_btn" href="#sidebar">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>


    <div class="header-user">
        <div class="nav user-menu">

            <!-- Search -->

            <!-- /Search -->
            <!--<ul>
                <li class="d-none d-lg-block">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle position-relative d-flex align-items-center language-selects booo" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('frontend-assets') }}/img/flags/en.png" class="me-2" alt="Logo">

                        </button>
                        <ul class="dropdown-menu dropdown-profile" aria-labelledby="languageDropdown">
                            <li>
                                <a class="dropdown-item d-flex align-items-center language-select" data-id="1" href="javascript:void(0);">
                                    <img src="{{ asset('frontend-assets') }}/img/flags/en.png" class="me-2" alt="Logo">
                                    English
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item d-flex align-items-center language-select" data-id="46" href="javascript:void(0);">
                                    <img src="{{ asset('frontend-assets') }}/img/flags/fr.png" class="me-2" alt="Logo">
                                    French
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul> -->

            <div class="d-flex align-items-center">
                <div class="me-2 site-link">
                    <a href="{{ route('front.home') }}" target="_blank" class="d-flex align-items-center justify-content-center mx-2"><i
                                class="feather-globe mx-1"></i>Visit Website</a>
                </div>
                <div class="provider-head-links">
                    <div>
                        <a href="javascript:void(0);" id="dark-mode-toggle" class="dark-mode-toggle me-2">
                            <i class="fa-regular fa-moon"></i>
                        </a>
                        <a href="javascript:void(0);" id="light-mode-toggle" class="dark-mode-toggle me-2">
                            <i class="ti ti-sun-filled"></i>
                        </a>
                    </div>
                </div>
{{--                <div class="provider-head-links">--}}
{{--                    <a href="javascript:void(0);" class="d-flex align-items-center justify-content-center me-2  notify-link" data-bs-toggle="dropdown" data-bs-auto-close="outside"><i class="feather-bell bellcount"></i></a>--}}
{{--                    <div class="dropdown-menu dropdown-menu-end notification-dropdown p-4 notify-users">--}}
{{--                        <div class="d-flex dropdown-body align-items-center justify-content-between border-bottom p-0 pb-3 mb-3">--}}
{{--                            <h6 class="notification-title">Notifications <span class="fs-18 text-gray notificationcount"></span></h6>--}}
{{--                            <div class="d-flex align-items-center">--}}
{{--                                <a  class="text-primary fs-15 me-3 lh-1 markallread">Clear All</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="noti-content">--}}
{{--                            <div class="d-flex flex-column"  id="notification-data" data-empty_info="No New Notification Found">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="d-flex p-0 notification-footer-btn">--}}
{{--                        </div>--}}
{{--                        <div class="d-flex p-0 notification-footer-btn">--}}
{{--                            <a href="#" class="btn btn-light rounded  me-2 cancel cancelnotify">Cancel</a>--}}
{{--                            <a href="javascript:" class="btn btn-dark rounded viewall">View All</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                @php
                    use App\Helpers\NotificationHelper;
                    $notifications = NotificationHelper::unread(auth()->id());
                @endphp
                <div class="provider-head-links">
                    <a href="javascript:void(0);"
                       class="d-flex align-items-center justify-content-center me-2 notify-link"
                       data-bs-toggle="dropdown" data-bs-auto-close="outside">
                        <i class="feather-bell bellcount"></i>
                        <span class="badge bg-danger notificationcount">
                            {{ $notifications->where('is_read', false)->count() }}
                        </span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-end notification-dropdown p-4 notify-users">
                        <div class="d-flex dropdown-body align-items-center justify-content-between border-bottom p-0 pb-3 mb-3">
                            <h6 class="notification-title">
                                Notifications
                            </h6>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('provider.notifications.markAll') }}"
                                   class="text-primary fs-15 me-3 lh-1 markallread">
                                    Mark All as Read
                                </a>
                            </div>
                        </div>

                        <div class="noti-content">
                            <div class="d-flex flex-column" id="notification-data"
                                 data-empty_info="No New Notification Found">
                                @forelse($notifications as $notification)
                                    <a href="{{ route('provider.notifications.read', $notification->id) }}"
                                       class="dropdown-item d-flex align-items-start mb-2 {{ $notification->is_read ? '' : 'unread' }}">
                        <span class="me-2">
                            <i class="feather-bell text-primary"></i>
                        </span>
                                        <div>
                                            <div class="fw-bold">{{ $notification->title }}</div>
                                            <small class="text-muted">{{ $notification->message }}</small>
                                            <div class="small text-gray">{{ $notification->created_at->diffForHumans() }}</div>
                                        </div>
                                    </a>
                                @empty
                                @endforelse
                            </div>
                        </div>

                        <div class="d-flex p-0 notification-footer-btn">
                            <a href="{{ route('provider.notifications.index')}}" class="btn btn-dark rounded viewall w-100">
                                View All
                            </a>
                        </div>
                    </div>
                </div>



                <div class="dropdown">
                    <a href="javascript:void(0);" data-bs-toggle="dropdown">
                        <div class="booking-user d-flex align-items-center">
                            <span class="user-img">
                                <img src="{{ asset('frontend-assets') }}/img/profile-default.png" class="headerProfileImg" alt="user">
                            </span>
                        </div>
                    </a>
                    <ul class="dropdown-menu p-2 dropdown-profile">
                        <li><a class="dropdown-item d-flex align-items-center" href="{{ route('provider.dashboard') }}"><i class="ti ti-layout-grid me-1"></i>Dashboard</a></li>
                        <li><a class="dropdown-item d-flex align-items-center" href="{{ route('provider.profile')}}"><i class="ti ti-user me-1"></i>My Profile</a></li>
                        <li class="mb-0">
                            <a href="#" class="d-flex align-items-center text-decoration-none"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="ti ti-logout me-2"></i>
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('user.logout.process') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>

                    </ul>
                </div>
            </div>

        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="dropdown mobile-user-menu d-flex align-items-center w-auto">
        <div class="dropdown">
            <button class="btn dropdown-toggle d-flex align-items-center language-selects" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset('frontend-assets') }}/img/flags/en.png" class="me-2" alt="Logo">

            </button>
            <ul class="dropdown-menu dropdown-profile" aria-labelledby="languageDropdown">
                <li>
                    <a class="dropdown-item d-flex align-items-center language-select" data-id="1" href="javascript:void(0);">
                        <img src="{{ asset('frontend-assets') }}/img/flags/en.png" class="me-2" alt="Logo">
                        English
                    </a>
                </li>
                <li>
                    <a class="dropdown-item d-flex align-items-center language-select" data-id="46" href="javascript:void(0);">
                        <img src="{{ asset('frontend-assets') }}/img/flags/fr.png" class="me-2" alt="Logo">
                        French
                    </a>
                </li>
            </ul>
        </div>
        <a href="javascript:void(0);" class="nav-link dropdown-toggle ms-2" data-bs-toggle="dropdown"
           aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-end">
            <a class="dropdown-item" href="">Dashboard</a>
            <a class="dropdown-item" href="">My Profile</a>
            <a class="dropdown-item" href="">Logout</a>
        </div>
    </div>
    <!-- /Mobile Menu -->

</div>
<!-- /Header -->

<!-- Sidebar -->
