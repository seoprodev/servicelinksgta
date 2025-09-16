@extends('frontend.partials.master')
@section('title', 'Home')
@push('styles')
@endpush

@section('main-content')
    <!-- Hero Section -->
    <section class="hero-section" id="home">
        <div class="hero-content position-relative overflow-hidden">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay=".25s">
                            <h1 class="mb-2">Get your <span class="typed" data-type-text="General"></span> <br>Plumbing Services</h1>

                            <p class="mb-3 sub-title">We can connect you to the right Service, first time and everytime.</p>
                            <div class="banner-form bg-white border mb-3">
                                <form id="post-a-job" action="{{ route('front.post.job.submit') }}" method="POST">
                                    @csrf
                                    <div class="d-md-flex align-items-center">
                                        <div class="input-group mb-2">
                                            <span class="input-group-text px-1"><i class="ti ti-pin"></i></span>
                                            <select class="form-control" id="categoryDropdown" name="categoryId" required>
                                                <option value="" selected disabled>Search for Service</option>
                                                @foreach($frontCategories as $category)
                                                    <option value="{{ $category->id }}" data-slug="{{ $category->slug }}">
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-2">
                                            <button type="submit"
                                                    class="btn btn-linear-primary d-inline-flex align-items-center w-100">
                                                <i class="ti ti-arrow-right"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>

                                <img src="{{ asset('frontend-assets') }}/img/bg/bg-06.svg" alt="img"
                                     class="shape-06 round-animate">
                            </div>

                            <div class="d-flex align-items-center flex-wrap">
                                <h6 class="mb-2 me-2 fw-medium">Popular Searches</h6>
                                <a href="javascript:void(0)"
                                   class="badge badge-dark-transparent fs-14 fw-normal mb-2 me-2">
                                    Kitchen Plumbing
                                </a>
                            </div>
                            <div class="d-flex align-items-center flex-wrap banner-info">

                                <div class="d-flex align-items-center me-4 mt-4">
                                    <img src="{{ asset('frontend-assets') }}/img/icons/success-01.svg" alt="icon">
                                    <div class="ms-2">
                                        <h6>215,292 +</h6>
                                        <p>Verified Providers</p>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center me-4 mt-4">
                                    <img src="{{ asset('frontend-assets') }}/img/icons/success-03.svg" alt="icon">
                                    <div class="ms-2">
                                        <h6>2,390,968 </h6>
                                        <p>Reviews Globally</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="banner-img wow fadeInUp" data-wow-duration="1s" data-wow-delay=".25s">
                        <img src="{{ asset('frontend-assets') }}/img/banner.webp"
                             alt="img" class="img-fluid animation-float" fetchpriority="high">
                    </div>
                </div>
            </div>
            <div class="hero-image">
                <div class="d-inline-flex bg-white p-2 rounded align-items-center shape-01 floating-x">
                    <span class="avatar avatar-md bg-warning rounded-circle me-2"><i class="ti ti-star-filled"></i></span>
                    <span>4.9 / 5<small class="d-block">(255 reviews)</small></span>
                    <i class="border-edge"></i>
                </div>
                <div class="d-inline-flex bg-white p-2 rounded align-items-center shape-02 floating-x">
                    <span class="me-2"><img src="{{ asset('frontend-assets') }}/img/icons/tick-banner.svg" alt="img"></span>
                    <p class="fs-12 text-dark mb-0">300 Booking Completed</p>
                    <i class="border-edge"></i>
                </div>
                <img src="{{ asset('frontend-assets') }}/img/bg/bg-03.svg" alt="img" class="shape-03">
                <img src="{{ asset('frontend-assets') }}/img/bg/bg-04.svg" alt="img" class="shape-04">
                <img src="{{ asset('frontend-assets') }}/img/bg/bg-05.svg" alt="img" class="shape-05">
            </div>
        </div>
        <div class="modal fade wallet-modal home-modal" id="add-offer" data-bs-backdrop="static" data-bs-keyboard="false"
             tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" id="modalBody">
                    <div class="modal-header d-flex align-items-center justify-content-between border-0">
                        <h5>Find the Best Professionals</h5>
                        <a href="javascript:void(0)" data-bs-dismiss="modal" aria-label="Close"><i
                                    class="ti ti-circle-x-filled fs-24"></i></a>
                    </div>
                    <form action="https://servicelinksgta.globalhostpros.com/provider-offers.html">
                        <div class="modal-body " id="modal-body-content">
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" id="back-btn" class="btn btn-secondary">Back</button>
                        <button type="submit" id="continue-btn" class="btn btn-dark">Continue</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .work-item::before {
            display: none;
        }

        .work-item .img-container {
            background: #f2f2f2;
            padding: 30px;
            border-radius: 50%;
            width: 100px;
            height: 100px;
            margin: auto;
        }


        .work-item .img-container img {
            filter: invert(1);
        }
    </style>
    <section class="section pt-0 bg-white">
        <div class="container">
            <div class="work-section bg-white m-0">
                <div class="row align-items-center bg-01">
                    <div class="col-md-12 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="section-header text-center">
                            <h2 class="mb-1 text-black">
                                How Service Link GTA<span class="text-linear-primary">
                                Work</span>
                            </h2>
                            <p class="text-dark">Each listing is designed to be clear and concise, providing customers
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row gx-0 gy-4">
                    <div class="col-lg-12 d-flex">
                        <div class=" text-center flex-fill">
                            <div class="mb-3">
                                <img src="{{ asset('frontend-assets') }}/img/icons/work-01.svg" alt="img"
                                     style="display: none;" loading="lazy">
                            </div>
                            <div>
                                <div class="row gx-0 gy-4">
                                    <div class="col-8 m-auto d-flex">
                                        <div class="work-item text-center flex-fill">
                                            <div class="img-container">
                                                <img src="{{ asset('frontend-assets') }}/img/icons/work-01.svg" alt="img">
                                            </div>
                                            <h6 class="text-white mb-2">1. Post a Service</h6>
                                            <p>After you post a job, our matching system identifies and alerts relevant
                                                Provider, who
                                                can then express interest in your job.</p>
                                        </div>
                                    </div>
                                    <div class="col-8 m-auto d-flex">
                                        <div class="work-item text-center flex-fill">
                                            <div class="img-container">
                                                <img src="{{ asset('frontend-assets') }}/img/icons/work-02.svg" alt="img">
                                            </div>
                                            <h6 class="text-white mb-2">2. Getting Booked &amp; Job done</h6>
                                            <p>After you post a job, our matching system identifies and alerts relevant
                                                Provider, who
                                                can then express interest in your job.</p>
                                        </div>
                                    </div>
                                    <div class="col-8 m-auto d-flex">
                                        <div class="work-item work-03 text-center flex-fill">
                                            <div class="img-container">
                                                <img src="{{ asset('frontend-assets') }}/img/icons/work-03.svg" alt="img">
                                            </div>
                                            <h6 class="text-white mb-2">3. Get Reviewd &amp; Get Leads</h6>
                                            <p>After you post a job, our matching system identifies and alerts relevant
                                                Provider, who
                                                can then express interest in your job.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="section category-section bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center wow fadeInUp" data-wow-delay="0.2s">
                    <div class="section-header text-center">
                        <h2 class="mb-1">
                            Checkout our Recent<span class="text-linear-primary">
                            Category</span>
                        </h2>
                        <p class="sub-title">Service categories help organize and structure the offerings on a marketplace,
                            making it easier for users to find what they need.</p>
                    </div>
                </div>
            </div>
            <div class="service-slider owl-carousel nav-center">
                <div class="service-item wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-img">
                        <div class="img-slider owl-carousel nav-center">

                            <div class="slide-images">
                                <a href="javascript:void(0)">
                                    <img src="{{ asset('frontend-assets/img') }}/categories/pJiez0e1rP671reeFJeWTQq4DxVJH5h127TdjiNo.jpg"
                                         class="img-fluid" alt="default img" loading="lazy">
                                </a>
                            </div>

                        </div>
                        <div class="trend-icon">
                        <span class="bg-success">
                            <i class="feather-trending-up"></i>
                        </span>
                        </div>
                        <div class="fav-item">
                            <a href="javascript:void(0)" class="fav-icon">
                                <i class="ti ti-heart"></i>
                            </a>
                        </div>
                    </div>
                    <div class="service-content">
                        <h6 class="text-truncate mb-1"><a
                                    href="javascript:void(0)">General Plumbing</a>
                        </h6>
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="fw-medium fs-14 mb-0"> 1 Service
                            </p>
                        </div>
                    </div>
                </div>
                <div class="service-item wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-img">
                        <div class="img-slider owl-carousel nav-center">

                            <div class="slide-images">
                                <a href="javascript:void(0)">
                                    <img src="{{ asset('frontend-assets/img') }}/categories/9ORTLdOOfZYKf9aDWF3GYdFOlHCcmsxzrgiDIZDZ.webp"
                                         class="img-fluid" alt="default img" loading="lazy">
                                </a>
                            </div>

                        </div>
                        <div class="trend-icon">
                        <span class="bg-success">
                            <i class="feather-trending-up"></i>
                        </span>
                        </div>
                        <div class="fav-item">
                            <a href="javascript:void(0)" class="fav-icon">
                                <i class="ti ti-heart"></i>
                            </a>
                        </div>
                    </div>
                    <div class="service-content">
                        <h6 class="text-truncate mb-1"><a
                                    href="javascript:void(0)">Bathroom Plumbing</a>
                        </h6>
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="fw-medium fs-14 mb-0"> 0 Service
                            </p>
                        </div>
                    </div>
                </div>
                <div class="service-item wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-img">
                        <div class="img-slider owl-carousel nav-center">

                            <div class="slide-images">
                                <a href="javascript:void(0)">
                                    <img src="{{ asset('frontend-assets/img') }}/categories/4VNrWpjz6wARIn2JgDKRrlLS638FHXZyef21ZoOW.jpg"
                                         class="img-fluid" alt="default img" loading="lazy">
                                </a>
                            </div>

                        </div>
                        <div class="trend-icon">
                        <span class="bg-success">
                            <i class="feather-trending-up"></i>
                        </span>
                        </div>
                        <div class="fav-item">
                            <a href="javascript:void(0)" class="fav-icon">
                                <i class="ti ti-heart"></i>
                            </a>
                        </div>
                    </div>
                    <div class="service-content">
                        <h6 class="text-truncate mb-1"><a
                                    href="javascript:void(0)">Kitchen Plumbing</a>
                        </h6>
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="fw-medium fs-14 mb-0"> 1 Service
                            </p>
                        </div>
                    </div>
                </div>
                <div class="service-item wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-img">
                        <div class="img-slider owl-carousel nav-center">

                            <div class="slide-images">
                                <a href="javascript:void(0)">
                                    <img src="{{ asset('frontend-assets/img') }}/categories/mhkxfpgLvQmj66PmimA0ypHYZ67kyzOJ3lFKbh7i.webp"
                                         class="img-fluid" alt="default img" loading="lazy">
                                </a>
                            </div>

                        </div>
                        <div class="trend-icon">
                        <span class="bg-success">
                            <i class="feather-trending-up"></i>
                        </span>
                        </div>
                        <div class="fav-item">
                            <a href="javascript:void(0)" class="fav-icon">
                                <i class="ti ti-heart"></i>
                            </a>
                        </div>
                    </div>
                    <div class="service-content">
                        <h6 class="text-truncate mb-1"><a
                                    href="javascript:void(0)">Emergency Plumbing</a>
                        </h6>
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="fw-medium fs-14 mb-0"> 0 Service
                            </p>
                        </div>
                    </div>
                </div>
                <div class="service-item wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-img">
                        <div class="img-slider owl-carousel nav-center">

                            <div class="slide-images">
                                <a href="javascript:void(0)">
                                    <img src="{{ asset('frontend-assets/img') }}/categories/xpv2rRXh49hGc506hiWv4PNKvsVL2fMENYXtU6Ld.webp"
                                         class="img-fluid" alt="default img" loading="lazy">
                                </a>
                            </div>

                        </div>
                        <div class="trend-icon">
                        <span class="bg-success">
                            <i class="feather-trending-up"></i>
                        </span>
                        </div>
                        <div class="fav-item">
                            <a href="javascript:void(0)" class="fav-icon">
                                <i class="ti ti-heart"></i>
                            </a>
                        </div>
                    </div>
                    <div class="service-content">
                        <h6 class="text-truncate mb-1"><a
                                    href="javascript:void(0)">Drain &amp; Sewer</a>
                        </h6>
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="fw-medium fs-14 mb-0"> 0 Service
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center view-all wow fadeInUp" data-wow-delay="0.2s">
                        <a href="javascript:void(0)" class="btn btn-dark">View All<i
                                    class="ti ti-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section testimonial-section bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center wow fadeInUp" data-wow-delay="0.2s">
                    <div class="section-header text-center">
                        <h2 class="mb-1">
                            Genuine reviews from<span class="text-linear-primary">
                            Customers</span>
                        </h2>
                        <p class="sub-title">Each listing is designed to be clear and concise, providing customers</p>
                    </div>
                </div>
            </div>

            <div class="testimonial-slider owl-carousel nav-center">
                <div class="testimonial-item wow fadeInUp" data-wow-delay="0.2s">
                    <div class="d-flex align-items-center mb-3">
                        <i class="fa-solid fa-star text-warning me-1"></i>
                        <i class="fa-solid fa-star text-warning me-1"></i>
                        <i class="fa-solid fa-star text-warning me-1"></i>
                        <i class="fa-solid fa-star text-warning me-1"></i>
                        <i class="fa-solid fa-star text-warning"></i>
                    </div>
                    <p class="mb-2 text-truncate-testimonial">They saved our weekend! Quick leak repair, neat work, and
                        explained everything clearly. Will definitely call them again.</p>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center overflow-hidden">
                        <span class="avatar avatar-lg flex-shrink-0">
                            <img src="{{ asset('frontend-assets/img') }}/testimonials/8afdf2ef-650a-4764-919a-d03cde049424_1754008835.jpg"
                                 class="img-fluid rounded-circle" alt="img" loading="lazy">
                        </span>
                            <h6 class="text-truncate ms-2">David P</h6>
                        </div>
                        <p>4 weeks ago</p>
                    </div>
                </div>
            </div>
            <div class="text-center wow fadeInUp" data-wow-delay="0.2s">
                <h6 class="mb-2">Each listing is designed to be clear and concise, providing customers</h6>
                <p>
                    <span class="text-dark fw-medium">Excellent</span>
                    <img src="{{ asset('frontend-assets') }}/img/icons/star-01.svg" class="img-fluid" alt="img"
                         loading="lazy">
                    <img src="{{ asset('frontend-assets') }}/img/icons/star-01.svg" class="img-fluid" alt="img"
                         loading="lazy">
                    <img src="{{ asset('frontend-assets') }}/img/icons/star-01.svg" class="img-fluid" alt="img"
                         loading="lazy">
                    <img src="{{ asset('frontend-assets') }}/img/icons/star-01.svg" class="img-fluid" alt="img"
                         loading="lazy">
                    <img src="{{ asset('frontend-assets') }}/img/icons/star-01.svg" class="img-fluid" alt="img"
                         loading="lazy">
                    <span class="fs-14">Based on 8 reviews</span>
                </p>
            </div>
        </div>
    </section>
    <!-- Business Section -->
    <section class="section business-section bg-black">
        <div class="container">
            <div class="row align-items-center bg-01">
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="section-header mb-md-0 mb-4">
                        <h2 class="text-white display-4">ServiceLinksGTA – Mission Statement <span
                                    class="text-linear-primary"></span></h2>
                        <p class="text-light">At ServiceLinksGTA, our mission is to bridge the gap between trusted local
                            service providers and customers across the Greater Toronto Area by offering a seamless,
                            transparent, and reliable platform for booking everyday home and professional services.<br>We
                            are committed to: Empowering local businesses with the tools and visibility they need to grow.
                            Helping customers save time by connecting them with pre-vetted, highly rated professionals.
                            Building trust through verified reviews, upfront pricing, and exceptional customer support.
                            Promoting community growth by keeping business local and service personal. Whether it's
                            plumbing, cleaning, electrical work, or any other essential service, our goal is to make finding
                            help as easy and dependable as ordering a cup of coffee.</p>
                        <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#provider"
                           class="btn btn-linear-primary"><i class="ti ti-user-filled me-2"></i>Join Us</a>
                    </div>
                </div>
                <div class="col-md-6 text-md-end wow fadeInUp" data-wow-delay="0.2s">
                    <div class="business-img">
                        <img src="{{ asset('frontend-assets') }}/img/business.webp" class="img-fluid" alt="img"
                             loading="lazy">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Business Section -->
    <!-- FAQ Section -->
    <section class="section faq-section">
        <div class="container">
            <div class="section-header text-center mb-4">
                <h2 class="mb-1">
                    FAQ&#039;s
                    <span class="text-linear-primary"></span>
                </h2>
                <p class="sub-title">Each listing is designed to be clear and concise, providing customers</p>
            </div>

            <div class="accordion accordion-flush" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse0" aria-expanded="false"
                                aria-controls="flush-collapse0">
                            What areas does ServiceLinksGTA serve?
                        </button>
                    </h2>
                    <div id="flush-collapse0" class="accordion-collapse collapse"
                         data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            We currently serve the Greater Toronto Area and are expanding to surrounding regions.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse1" aria-expanded="false"
                                aria-controls="flush-collapse1">
                            How are pros vetted?
                        </button>
                    </h2>
                    <div id="flush-collapse1" class="accordion-collapse collapse"
                         data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            All pros are reviewed for licensing, background checks, and customer feedback before being
                            listed.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse2" aria-expanded="false"
                                aria-controls="flush-collapse2">
                            Is there a mobile app?
                        </button>
                    </h2>
                    <div id="flush-collapse2" class="accordion-collapse collapse"
                         data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            Our mobile app is currently in development. In the meantime, our website is fully mobile
                            responsive.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse3" aria-expanded="false"
                                aria-controls="flush-collapse3">
                            What payment methods are accepted?
                        </button>
                    </h2>
                    <div id="flush-collapse3" class="accordion-collapse collapse"
                         data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            We accept major credit/debit cards and digital wallets through our secure payment gateway.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse4" aria-expanded="false"
                                aria-controls="flush-collapse4">
                            How do I contact customer support?
                        </button>
                    </h2>
                    <div id="flush-collapse4" class="accordion-collapse collapse"
                         data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            You can reach us at support@servicelinksgta.ca or through the Help section on our website.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse5" aria-expanded="false"
                                aria-controls="flush-collapse5">
                            How do I join ServiceLinksGTA as a plumber?
                        </button>
                    </h2>
                    <div id="flush-collapse5" class="accordion-collapse collapse"
                         data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            You can sign up directly through our website by creating a Pro account, verifying your
                            credentials, and completing your profile.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse6" aria-expanded="false"
                                aria-controls="flush-collapse6">
                            What documents do I need to provide?
                        </button>
                    </h2>
                    <div id="flush-collapse6" class="accordion-collapse collapse"
                         data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            We require proof of business license and government issued id.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse7" aria-expanded="false"
                                aria-controls="flush-collapse7">
                            How do I get matched with homeowners?
                        </button>
                    </h2>
                    <div id="flush-collapse7" class="accordion-collapse collapse"
                         data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            Our platform uses location, availability, and service category to match you with homeowners
                            looking for plumbing services.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse8" aria-expanded="false"
                                aria-controls="flush-collapse8">
                            How do I receive payments?
                        </button>
                    </h2>
                    <div id="flush-collapse8" class="accordion-collapse collapse"
                         data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            Payments are processed securely through the platform and deposited directly into your linked
                            bank account.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse9" aria-expanded="false"
                                aria-controls="flush-collapse9">
                            Can I choose which jobs to accept?
                        </button>
                    </h2>
                    <div id="flush-collapse9" class="accordion-collapse collapse"
                         data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            Yes, you have full control over which job requests you accept or decline.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse10" aria-expanded="false"
                                aria-controls="flush-collapse10">
                            How do I book a plumber on ServiceLinksGTA?
                        </button>
                    </h2>
                    <div id="flush-collapse10" class="accordion-collapse collapse"
                         data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            Simply create an account, select the plumbing service you need, and choose from available local
                            professionals.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse11" aria-expanded="false"
                                aria-controls="flush-collapse11">
                            Are all service providers verified?
                        </button>
                    </h2>
                    <div id="flush-collapse11" class="accordion-collapse collapse"
                         data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            Yes, all pros go through a thorough background and credential check before being approved on the
                            platform.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse12" aria-expanded="false"
                                aria-controls="flush-collapse12">
                            How are service prices determined?
                        </button>
                    </h2>
                    <div id="flush-collapse12" class="accordion-collapse collapse"
                         data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            Prices may be flat-rate or estimated based on job scope. You’ll see a quote before confirming
                            your booking.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse13" aria-expanded="false"
                                aria-controls="flush-collapse13">
                            What if I’m not satisfied with the service?
                        </button>
                    </h2>
                    <div id="flush-collapse13" class="accordion-collapse collapse"
                         data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            We offer dispute resolution and support to help ensure your issue is addressed promptly.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#flush-collapse14" aria-expanded="false"
                                aria-controls="flush-collapse14">
                            Is my personal information safe?
                        </button>
                    </h2>
                    <div id="flush-collapse14" class="accordion-collapse collapse"
                         data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            Yes, we follow strict privacy and data protection policies in accordance with Ontario’s privacy
                            laws.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /FAQ Section -->
@endsection

@push('scripts')
@endpush
