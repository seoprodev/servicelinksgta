<div class="col-xl-3 col-lg-4 theiaStickySidebar"
     style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">

    <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;">
        <div class="card user-sidebar mb-4 mb-lg-0">
            <div class="card-header user-sidebar-header mb-4">

{{--                @if(isset($authUser))--}}
{{--                    <div class="d-flex justify-content-center align-items-center flex-column">--}}
{{--                            <span class="user rounded-circle avatar avatar-xxl mb-2">--}}
{{--                               <img--}}
{{--                                       src="{{ $authUser->profile && $authUser->profile->avatar--}}
{{--                                        ? asset($authUser->profile->avatar)--}}
{{--                                        : asset('frontend-assets/img/profile-default.png') }}"--}}
{{--                                       alt="Profile Image"--}}
{{--                                       class="img-fluid rounded-circle headerProfileImg">--}}
{{--                            </span>--}}
{{--                        <h6 class="mb-2 headerName">{{ $authUser->profile->first_name . ' ' . $authUser->profile->last_name }} </h6>--}}
{{--                        <p class="fs-14">Member Since {{ $authUser->created_at->format('M, Y') }}</p>--}}
{{--                    </div>--}}
{{--                @else--}}
{{--                    <div class="d-flex justify-content-center align-items-center flex-column">--}}
{{--                            <span class="user rounded-circle avatar avatar-xxl mb-2">--}}
{{--                               <img--}}
{{--                                       src="{{ auth()->user()->profile && auth()->user()->profile->avatar--}}
{{--                                        ? asset(auth()->user()->profile->avatar)--}}
{{--                                        : asset('frontend-assets/img/profile-default.png') }}"--}}
{{--                                       alt="Profile Image"--}}
{{--                                       class="img-fluid rounded-circle headerProfileImg">--}}
{{--                            </span>--}}
{{--                        <h6 class="mb-2 headerName">{{ auth()->user()->profile->first_name . ' ' . auth()->user()->profile->last_name }} </h6>--}}
{{--                        <p class="fs-14">Member Since {{ auth()->user()->created_at->format('M, Y') }}</p>--}}
{{--                    </div>--}}
{{--                    @endif--}}

                <div class="d-flex justify-content-center align-items-center flex-column">
    <span class="user rounded-circle avatar avatar-xxl mb-2">
        <img
                src="{{ auth()->user()->profile && auth()->user()->profile->avatar
                ? asset(auth()->user()->profile->avatar)
                : asset('frontend-assets/img/profile-default.png') }}"
                alt="Profile Image"
                class="img-fluid rounded-circle headerProfileImg">
    </span>

                    <h6 class="mb-2 headerName">
                        {{ auth()->user()->profile->first_name . ' ' . auth()->user()->profile->last_name }}
                    </h6>
                    <p class="fs-14 mb-1">Member Since {{ auth()->user()->created_at->format('M, Y') }}</p>

                    {{-- ✅ Verification Badge --}}
                    @if(auth()->user()->profile && auth()->user()->profile->phone_verified_at)
                        <span class="badge bg-success rounded-pill px-3 py-2 mt-1">
            <i class="fa-solid fa-check-circle me-1"></i> Verified
        </span>
                    @else
                        <span class="badge bg-danger rounded-pill px-3 py-2 mt-1">
            <i class="fa-solid fa-xmark-circle me-1"></i> Unverified
        </span>
                    @endif
                </div>




            </div>
            <div class="card-body user-sidebar-body p-0">
                <ul>
                    <li class="mb-4">
                        <a href="{{ route('user.dashboard') }}"
                           class="d-flex align-items-center  {{ request()->routeIs('user.dashboard') ? 'active' : '' }}">
                            <i class="ti ti-layout-grid me-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('client.create.job') }}"
                           class="d-flex align-items-center {{ request()->routeIs('client.create.job') ? 'active' : '' }}">
                            <i class="ti ti-world me-2"></i>
                            Post A Job
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('client.jobs') }}"
                           class="d-flex align-items-center {{ request()->routeIs('client.jobs') ? 'active' : '' }}">
                            <i class="ti ti-world me-2"></i>
                            My Jobs
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('chat.index') }}"
                           class="d-flex align-items-center {{ request()->routeIs('chat.index') ? 'active' : '' }}">
                            <i class="ti ti-message-circle me-2"></i>
                            Chat
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('client.notifications.index') }}" class="d-flex align-items-center {{ request()->routeIs('client.notifications.index') ? 'active' : '' }}">
                            <i class="ti ti-bell me-2"></i>
                            Notification
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('client.review.index') }}" class="d-flex align-items-center {{ request()->routeIs('client.review.index') ? 'active' : '' }}">
                            <i class="ti ti-file-like me-2"></i>
                            Reviews
                        </a>
                    </li>
                    <li class="mb-4">
                        <a href="{{ route('user.tickets.index') }}"
                           class="d-flex align-items-center {{ request()->routeIs('user.tickets.index') ? 'active' : '' }}">
                            <i class="ti ti-ticket me-2"></i>
                            Tickets
                        </a>
                    </li>
                {{--                    <li class="mb-4">--}}
                {{--                        <a href="" class="d-flex align-items-center ">--}}
                {{--                            <i class="ti ti-device-mobile me-2"></i>--}}
                {{--                            My Leads--}}
                {{--                        </a>--}}
                {{--                    </li>--}}

                {{--                    <li class="mb-4">--}}
                {{--                        <a href="https://servicelinksgta.globalhostpros.com/user/transaction" class="d-flex align-items-center ">--}}
                {{--                            <i class="ti ti-credit-card me-2"></i>--}}
                {{--                            Transaction--}}
                {{--                        </a>--}}
                {{--                    </li>--}}
                <!-- <li class="mb-4">
                        <a href="https://servicelinksgta.globalhostpros.com/user/wallet" class="d-flex align-items-center ">
                            <i class="ti ti-wallet me-2"></i>
                            Wallet
                        </a>
                    </li> -->
                    {{--                    <li class="mb-4">--}}
                    {{--                        <a href="https://servicelinksgta.globalhostpros.com/user/subscription" class="d-flex align-items-center ">--}}
                    {{--                            <i class="ti ti-bell-plus me-2"></i>--}}
                    {{--                            Subscription--}}
                    {{--                        </a>--}}
                    {{--                    </li>--}}
                    <li class="submenu mb-4">
                        <a href="javascript:void(0);" class="d-block mb-3"><i class="ti ti-settings me-2"></i><span>Settings</span><span
                                    class="menu-arrow"></span></a>
                        <ul class="ms-4">
                            <li class="mb-3">
                                <a href="{{ route('user.profile') }}"
                                   class="fs-14 d-inline-flex align-items-center {{ request()->routeIs('user.profile') ? 'active' : '' }}"><i
                                            class="ti ti-chevrons-right me-2"></i>Profile Settings</a>
                            </li>
                            <li class="mb-3">
                                <a href="{{ route('user.reset.password') }}"
                                   class="fs-14 d-inline-flex align-items-center {{ request()->routeIs('user.reset.password') ? 'active' : '' }}"><i
                                            class="ti ti-chevrons-right me-2"></i>Reset Password</a>
                            </li>
                            {{--                            <li class="mb-3">--}}
                            {{--                                <a href="" class="fs-14 d-inline-flex align-items-center "><i class="ti ti-chevrons-right me-2"></i>Security Settings</a>--}}
                            {{--                            </li>--}}
                            {{--                            <li class="mb-3">--}}
                            {{--                                <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#del-account" class="fs-14" id="del_account_btn"><i class="ti ti-chevrons-right me-2"></i>Delete Account</a>--}}
                            {{--                            </li>--}}
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="d-flex align-items-center text-decoration-none text-danger"
                           onclick="event.preventDefault(); document.getElementsByClassName('logout-form')[0].submit();">
                            <i class="ti ti-logout me-2"></i> Logout
                        </a>

                        <form class="logout-form d-none" action="{{ route('user.logout.process') }}" method="POST">
                            @csrf
                        </form>
                    </li>

                </ul>
            </div>
        </div>
        <div class="resize-sensor"
             style="position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden;">
            <div class="resize-sensor-expand"
                 style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                <div style="position: absolute; left: 0px; top: 0px; transition: all; width: 340px; height: 714px;"></div>
            </div>
            <div class="resize-sensor-shrink"
                 style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                <div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%"></div>
            </div>
        </div>
    </div>
</div>

