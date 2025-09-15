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
                    <h2 class="breadcrumb-title mb-2">Blogs</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="index.html"><i class="ti ti-home-2"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blogs</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="breadcrumb-bg">
                <img src="{{ asset('frontend-assets/img/bg/breadcrumb-bg-01.png') }}" class="breadcrumb-bg-1" alt="">
                <img src="{{ asset('frontend-assets/img/bg/breadcrumb-bg-02.png') }}" class="breadcrumb-bg-2" alt="">
            </div>
        </div>
    </div>

    <div class="page-wrapper bg-white">
        <div class="content">
            <div class="container">
                <div class="row justify-content-center align-items-center ">


                    <div class="col-xl-4 col-md-6">
                        <div class="card p-0">
                            <div class="card-body p-0">
                                <div class="img-sec w-100s blog-list-img">
                                    <a href="{{ route('front.blog.detail') }}"><img
                                                src="{{ asset('frontend-assets/img') }}/blogs/5ed9911a-6ac5-486c-9ecd-16c75fb10f76_1754009178.jpg"
                                                class="img-fluid rounded-top w-100" alt="img"></a>
                                    <div class="image-tag d-flex justify-content-end align-items-center">
                                        <span class="trend-tag">Electrical</span>
                                    </div>
                                </div>
                                <div class="p-3">
                                    <div class="d-flex align-items-center mb-3  ">
                                        <div class="d-flex align-items-center border-end pe-2">
                                                <span class="avatar avatar-sm me-2">
                                                    <img src="{{ asset('frontend-assets') }}/img/user-default.jpg"
                                                         class="rounded-circle" alt="user">
                                                </span>
                                            <h6 class="fs-14 text-gray-6">Admin</h6>
                                        </div>
                                        <div class="d-flex align-items-center ps-2">
                                            <span><i class="ti ti-calendar me-2"></i></span>
                                            <span class="fs-14">31/07/2025</span>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="fs-16 text-truncate mb-1"><a
                                                    href="{{ route('front.blog.detail') }}">Why
                                                Booking Home Services Online Is the Smartest Move in 2025</a></h6>
                                        <p class="two-line-ellipsis fs-14">Gone are the days of searching the Yellow
                                            Pages or relying on vague referrals. Here&#039;s why more homeowners are
                                            booking plumbers, landscapers, and handymen online:
                                            1. Verified Professionals
                                            Online platforms verify providers’ backgrounds, reviews, and
                                            qualifications—giving you peace of mind.
                                            2. Upfront Pricing
                                            No more surprise charges. You get transparent quotes before confirming any
                                            job.
                                            3. Flexible Scheduling
                                            Book a service when it suits your schedule, even on weekends or evenings.
                                            4. Track &amp; Chat
                                            Monitor your booking status and message your service provider in real-time.
                                            5. Secure Payments
                                            Pay through secure gateways and avoid the hassle of handling cash.
                                            🔧 Whether it’s a leaking pipe or a garden makeover, our platform makes it
                                            easy to book trusted experts anytime, anywhere.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card p-0">
                            <div class="card-body p-0">
                                <div class="img-sec w-100s blog-list-img">
                                    <a href="{{ route('front.blog.detail') }}"><img
                                                src="{{ asset('frontend-assets/img') }}/blogs/754eec98-c816-4e56-b55e-45a074d2e6cd_1754009153.jpg"
                                                class="img-fluid rounded-top w-100" alt="img"></a>
                                    <div class="image-tag d-flex justify-content-end align-items-center">
                                        <span class="trend-tag">Landscaping</span>
                                    </div>
                                </div>
                                <div class="p-3">
                                    <div class="d-flex align-items-center mb-3  ">
                                        <div class="d-flex align-items-center border-end pe-2">
                                                <span class="avatar avatar-sm me-2">
                                                    <img src="{{ asset('frontend-assets') }}/img/user-default.jpg"
                                                         class="rounded-circle" alt="user">
                                                </span>
                                            <h6 class="fs-14 text-gray-6">Admin</h6>
                                        </div>
                                        <div class="d-flex align-items-center ps-2">
                                            <span><i class="ti ti-calendar me-2"></i></span>
                                            <span class="fs-14">31/07/2025</span>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="fs-16 text-truncate mb-1"><a
                                                    href="{{ route('front.blog.detail') }}">Transform
                                                Your Yard: Landscaping Ideas That Add Value to Your Home</a></h6>
                                        <p class="two-line-ellipsis fs-14">A well-maintained yard does more than impress
                                            the neighbors—it can significantly boost your home&#039;s value and curb
                                            appeal. Here are some landscaping ideas that pay off:
                                            1. Build a Low-Maintenance Garden
                                            Use native plants that thrive in your region. They need less water and care,
                                            making upkeep easy.
                                            2. Define Walkways and Borders
                                            Stone or brick pathways guide the eye and give your yard a clean,
                                            intentional look.
                                            3. Install Outdoor Lighting
                                            Solar lights along pathways or string lights on trees create ambiance and
                                            increase safety.
                                            4. Add a Water Feature
                                            Small fountains or ponds add visual interest and create a calming
                                            atmosphere.
                                            5. Create Zones
                                            Designate separate areas for lounging, cooking, or gardening. It makes the
                                            space more functional and inviting.
                                            💡 Want help turning your dream yard into reality? Book a professional
                                            landscaper today.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card p-0">
                            <div class="card-body p-0">
                                <div class="img-sec w-100s blog-list-img">
                                    <a href="{{ route('front.blog.detail') }}"><img
                                                src="{{ asset('frontend-assets/img') }}/blogs/c0f8ef63-b479-4db3-a00c-fcb02ff5753f_1754009126.jpg"
                                                class="img-fluid rounded-top w-100" alt="img"></a>
                                    <div class="image-tag d-flex justify-content-end align-items-center">
                                        <span class="trend-tag">Plumbing</span>
                                    </div>
                                </div>
                                <div class="p-3">
                                    <div class="d-flex align-items-center mb-3  ">
                                        <div class="d-flex align-items-center border-end pe-2">
                                                <span class="avatar avatar-sm me-2">
                                                    <img src="{{ asset('frontend-assets') }}/img/user-default.jpg"
                                                         class="rounded-circle" alt="user">
                                                </span>
                                            <h6 class="fs-14 text-gray-6">Admin</h6>
                                        </div>
                                        <div class="d-flex align-items-center ps-2">
                                            <span><i class="ti ti-calendar me-2"></i></span>
                                            <span class="fs-14">31/07/2025</span>
                                        </div>
                                    </div>
                                    <div>
                                        <h6 class="fs-16 text-truncate mb-1"><a
                                                    href="{{ route('front.blog.detail') }}">5
                                                Common Plumbing Problems You Should Never Ignore</a></h6>
                                        <p class="two-line-ellipsis fs-14">Plumbing issues may seem minor at first, but
                                            they can quickly escalate into costly repairs if left unattended. Here are
                                            five common plumbing problems that homeowners should never ignore:
                                            1. Dripping Faucets
                                            That constant drip isn&#039;t just annoying—it can waste gallons of water
                                            over time and increase your water bill.
                                            2. Slow Drains
                                            A slow drain often signals a clog forming deep inside your pipes. Ignoring
                                            it can lead to full blockage or pipe damage.
                                            3. Low Water Pressure
                                            Inconsistent water pressure may indicate hidden leaks, corroded pipes, or
                                            mineral buildup in your fixtures.
                                            4. Running Toilets
                                            A running toilet can waste up to 200 gallons of water per day. It&#039;s
                                            usually an easy fix, so don’t delay repairs.
                                            5. Water Heater Issues
                                            If your shower suddenly runs cold or the water smells metallic, your heater
                                            may need service or replacement.
                                            👉 Need quick plumbing help? Book a certified plumber through our platform
                                            in just a few clicks.</p>
                                    </div>
                                </div>
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
@endpush
