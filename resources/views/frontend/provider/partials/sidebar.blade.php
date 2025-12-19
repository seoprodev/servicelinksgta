<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="active">
                    <a href="{{ route('provider.dashboard') }}" class="active"><i
                                class="ti ti-layout-grid"></i><span>Dashboard</span></a>
                </li>
                <li class="">
                    <a href="{{ route('provider.leads') }}" class="">
                        <i class="ti ti-world"></i><span>Leads</span>
                    </a>
                </li>


                {{--                <li class="">--}}
                {{--                <a href=""><i class="ti ti-wallet"></i><span>Payout</span></a>--}}
                {{--                </li>--}}
                <li class="">
                    <a href="{{ route('provider.my.lead') }}"><i class="ti ti-calendar-month"></i><span>My Leads</span></a>
                </li>
                {{--                <li class="">--}}
                {{--                    <a href="" class=""><i class="ti ti-calendar-month"></i><span>On Going Leads </span></a>--}}
                {{--                </li>--}}
                {{--                <li class="">--}}
                {{--                    <a href="" class=""><i class="ti ti-calendar"></i><span>Calendar</span></a>--}}
                {{--                </li>--}}
                <li class="">
                    <a href="{{ route('provider.packages') }}" class=""><i class="ti ti-bell-plus"></i><span>Subscription</span></a>
                </li>
                <li class="">
                    <a href="{{ route('provider.chat.index') }}" class=""><i class="ti ti-message"></i><span>Chat</span></a>
                </li>
                <li class="">
                    <a href="{{ route('provider.notifications.index')}}" class="d-flex align-items-center ">
                        <i class="ti ti-bell me-2"></i>
                        <span>Notification</span>
                    </a>
                </li>
                <li  class="">
                    <a href="{{ route('provider.review.index') }}"><i class="ti ti-star"></i><span>Reviews</span></a>
                </li>


                <li class="">
                    <a href="{{ route('provider.tickets.index') }}" class=""><i class="ti ti-ticket"></i><span>Tickets</span></a>
                </li>

                <li class="submenu">
                    <a href="javascript:void(0);"><i class="ti ti-settings"></i><span>Settings</span><span
                                class="menu-arrow"></span></a>
                    <ul>
                        <li class="">
                            <a href="{{ route('provider.profile') }}" class=""><i class="ti ti-chevrons-right me-2"></i>Profile Settings</a>
                        </li>
                                                <li class="">
                                                    <a href="{{ route('provider.reset.password') }}" class=""><i
                                                                class="ti ti-chevrons-right me-2"></i>Reset Password</a>
                                                </li>
                        {{--                        <li class="">--}}
                        {{--                            <a href="" class=""><i--}}
                        {{--                                        class="ti ti-chevrons-right me-2"></i>Plan &amp; Billings</a>--}}
                        {{--                        </li>--}}
                        {{--                        <li>--}}
                        {{--                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#del-account" id="del_account_btn"><i class="ti ti-chevrons-right me-2"></i>Delete Account</a>--}}
                        {{--                        </li>--}}
                    </ul>
                </li>
                <li class="mb-0">
                    <a href="javascript:" class="d-flex align-items-center text-decoration-none"
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