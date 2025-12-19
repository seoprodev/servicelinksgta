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
                    <h2 class="breadcrumb-title mb-2">About Us</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item">Home</li>
                            <li class="breadcrumb-item active" aria-current="page">About Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="breadcrumb-bg">
                <img src="{{ asset('frontend-assets/img/bg/breadcrumb-bg-01.png') }}" class="breadcrumb-bg-1" alt="Img">
                <img src="{{ asset('frontend-assets/img/bg/breadcrumb-bg-02.png') }}" class="breadcrumb-bg-2" alt="Img">
            </div>
        </div>
    </div>

    <div class="page-wrapper">
        <div class="content">
            <div class="about-sec bg-white">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="about-img d-none d-md-block">
                                <div class="about-exp">
                                    <span>12+ years of experiences</span>
                                </div>
                                <div class="abt-img">
                                    <img src="{{ asset('frontend-assets/img/providers/provider-01.jpg') }}" class="img-fluid"
                                         alt="img">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="about-content">

                                <h2>About ServiceLinksGTA</h2>
                                <p class="MsoNormal">At ServiceLinksGTA, we are proudly Canadian and proudly community-first. Based in the Greater Toronto Area, we are on a mission to reshape how plumbing services are delivered by putting integrity, transparency, and local talent at the heart of everything we do.</p>
                                <p class="MsoNormal">ServiceLinksGTA is not just another platform. We are a movement rooted in uplifting hardworking Canadian tradespeople, while providing homeowners and businesses with fast, reliable, and trusted plumbing solutions. Our goal is to eliminate uncertainty for customers and build lasting value for the professionals who power our communities.</p>
                                <p class="MsoNormal">We’re starting with plumbing, but our vision is bigger. As we grow, ServiceLinksGTA will continue to expand into other trades, giving more skilled Canadians a platform where their craftsmanship is respected, fairly paid, and consistently in demand.</p><p class="MsoNormal"><br></p>

                                <h2 class="MsoNormal">What Makes Us Different?</h2>
                                <p class="MsoNormal"><span style="mso-spacerun: yes;">&nbsp;</span>Performance Over Payment<br>Our pros don’t pay to be listed they earn their place by consistently delivering 5-star service.</p>
                                <p class="MsoNormal">Transparent, Flat-Rate Pricing<br>No hidden fees. No shady quotes. Customers always know what they’re paying for.</p>
                                <p class="MsoNormal">Built-In Accountability<br>We monitor every job. We follow up. And we make sure the job is done right.</p>
                                <p class="MsoNormal">Community Investment<br>Every completed job helps fund apprenticeship programs, local training initiatives, and community uplift projects supporting the future of skilled trades in Canada.</p>
                                <div class="MsoNormal" style="text-align: center;" align="center"><hr align="center" size="2" width="100%"></div>
                                <p class="MsoNormal">Whether you're a homeowner in need or a pro ready to grow, ServiceLinksGTA is your trusted partner building a stronger GTA, one service at a time.</p>

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
