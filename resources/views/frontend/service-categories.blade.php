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
                    <h2 class="breadcrumb-title mb-2">Categories</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="index.html"><i class="ti ti-home-2"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Categories</li>
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
    <!-- /Breadcrumb -->

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content content-two">
            <div class="container">
                <section class="section category-section bg-white p-0">
                    <div class="container">
                        <div class="row g-4 row-cols-lg-6 row-cols-md-4 row-cols-sm-3 row-cols-2 justify-content-center">
                            <div class="col d-flex">
                                <div class="category-item text-center flex-fill wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="mx-auto mb-3">
                                        <img src="{{ asset('frontend-assets/img') }}/categories/mn9OnovGTFc0a5TrjGOA3LZBaiRSOYdqpwFUXA6T.jpg" class="img-fluid" alt="img">
                                    </div>
                                    <h6 class="fs-14 mb-1">General Plumbing</h6>
                                    <p class="fs-14 mb-0">
                                        1 Services
                                    </p>
                                    <a href="services/general-plumbing.html" class="link-primary text-decoration-underline fs-14">View All</a>
                                </div>
                            </div>
                            <div class="col d-flex">
                                <div class="category-item text-center flex-fill wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="mx-auto mb-3">
                                        <img src="{{ asset('frontend-assets/img') }}/categories/0nNvbgD5NBbOcFI3xzl0bLfsUS02dK4QktFvvmHj.webp" class="img-fluid" alt="img">
                                    </div>
                                    <h6 class="fs-14 mb-1">Bathroom Plumbing</h6>
                                    <p class="fs-14 mb-0">
                                        0 Services
                                    </p>
                                    <a href="services/bathroom-plumbing.html" class="link-primary text-decoration-underline fs-14">View All</a>
                                </div>
                            </div>
                            <div class="col d-flex">
                                <div class="category-item text-center flex-fill wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="mx-auto mb-3">
                                        <img src="{{ asset('frontend-assets/img') }}/categories/Nmi5wAT52hH6Lqp4sdokDTFEry8P1oSZSyKwVNJh.jpg" class="img-fluid" alt="img">
                                    </div>
                                    <h6 class="fs-14 mb-1">Kitchen Plumbing</h6>
                                    <p class="fs-14 mb-0">
                                        1 Services
                                    </p>
                                    <a href="services/kitchen-plumbing.html" class="link-primary text-decoration-underline fs-14">View All</a>
                                </div>
                            </div>
                            <div class="col d-flex">
                                <div class="category-item text-center flex-fill wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="mx-auto mb-3">
                                        <img src="{{ asset('frontend-assets/img') }}/categories/1tlIlJrl6hKVY7nJW6xfQeM2TfiMHjwmPspjFrnD.webp" class="img-fluid" alt="img">
                                    </div>
                                    <h6 class="fs-14 mb-1">Emergency Plumbing</h6>
                                    <p class="fs-14 mb-0">
                                        0 Services
                                    </p>
                                    <a href="services/emergency-plumbing.html" class="link-primary text-decoration-underline fs-14">View All</a>
                                </div>
                            </div>
                            <div class="col d-flex">
                                <div class="category-item text-center flex-fill wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="mx-auto mb-3">
                                        <img src="{{ asset('frontend-assets/img') }}/categories/hMBalHwccGnoEhrxPldbZHspw0g4IzRFxAAtNJVs.webp" class="img-fluid" alt="img">
                                    </div>
                                    <h6 class="fs-14 mb-1">Drain &amp; Sewer</h6>
                                    <p class="fs-14 mb-0">
                                        0 Services
                                    </p>
                                    <a href="services/drain-sewer.html" class="link-primary text-decoration-underline fs-14">View All</a>
                                </div>
                            </div>
                            <div class="col d-flex">
                                <div class="category-item text-center flex-fill wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="mx-auto mb-3">
                                        <img src="{{ asset('frontend-assets/img') }}/categories/2g7KbPQNSWXXScKMiru0CAJB7vLBcktvLgLR4agw.webp" class="img-fluid" alt="img">
                                    </div>
                                    <h6 class="fs-14 mb-1">Water Heater</h6>
                                    <p class="fs-14 mb-0">
                                        1 Services
                                    </p>
                                    <a href="services/water-heater.html" class="link-primary text-decoration-underline fs-14">View All</a>
                                </div>
                            </div>
                            <div class="col d-flex">
                                <div class="category-item text-center flex-fill wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="mx-auto mb-3">
                                        <img src="{{ asset('frontend-assets/img') }}/categories/0FqbELuRl49rHiSxlDRkJ0OBrau8BFEz6LH1wcOZ.jpg" class="img-fluid" alt="img">
                                    </div>
                                    <h6 class="fs-14 mb-1">Water Filtration &amp; Softening</h6>
                                    <p class="fs-14 mb-0">
                                        0 Services
                                    </p>
                                    <a href="services/water-filtration-softening.html" class="link-primary text-decoration-underline fs-14">View All</a>
                                </div>
                            </div>
                            <div class="col d-flex">
                                <div class="category-item text-center flex-fill wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="mx-auto mb-3">
                                        <img src="{{ asset('frontend-assets/img') }}/categories/TPmOVnZ7st4DzEk8swE6SFypYgtOQuhIhFSM0YB5.webp" class="img-fluid" alt="img">
                                    </div>
                                    <h6 class="fs-14 mb-1">Outdoor Plumbing</h6>
                                    <p class="fs-14 mb-0">
                                        0 Services
                                    </p>
                                    <a href="services/outdoor-plumbing.html" class="link-primary text-decoration-underline fs-14">View All</a>
                                </div>
                            </div>
                            <div class="col d-flex">
                                <div class="category-item text-center flex-fill wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="mx-auto mb-3">
                                        <img src="{{ asset('frontend-assets/img') }}/categories/T9N1eLgwt3DNVZU6UdeRYvuakrvJS9BcFBh5DBK1.webp" class="img-fluid" alt="img">
                                    </div>
                                    <h6 class="fs-14 mb-1">Commercial Plumbing</h6>
                                    <p class="fs-14 mb-0">
                                        0 Services
                                    </p>
                                    <a href="services/commercial-plumbing.html" class="link-primary text-decoration-underline fs-14">View All</a>
                                </div>
                            </div>
                            <div class="col d-flex">
                                <div class="category-item text-center flex-fill wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="mx-auto mb-3">
                                        <img src="{{ asset('frontend-assets/img') }}/categories/1fuBpCFuxNhJsIefrVjEWcVrumhYDCYuU9zEW07P.webp" class="img-fluid" alt="img">
                                    </div>
                                    <h6 class="fs-14 mb-1">Toilet &amp; Faucet</h6>
                                    <p class="fs-14 mb-0">
                                        1 Services
                                    </p>
                                    <a href="services/toilet-faucet.html" class="link-primary text-decoration-underline fs-14">View All</a>
                                </div>
                            </div>
                            <div class="col d-flex">
                                <div class="category-item text-center flex-fill wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="mx-auto mb-3">
                                        <img src="{{ asset('frontend-assets/img') }}/categories/EMkE4qOFortreymCPK1SeBDdnddbw3eDk5cXnyJt.webp" class="img-fluid" alt="img">
                                    </div>
                                    <h6 class="fs-14 mb-1">Gas Line</h6>
                                    <p class="fs-14 mb-0">
                                        0 Services
                                    </p>
                                    <a href="services/gas-line.html" class="link-primary text-decoration-underline fs-14">View All</a>
                                </div>
                            </div>
                            <div class="col d-flex">
                                <div class="category-item text-center flex-fill wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="mx-auto mb-3">
                                        <img src="{{ asset('frontend-assets/img') }}/categories/zTNWVmTPilzpGMTiQf1PI05hFwkG8fFaaegzK5u9.webp" class="img-fluid" alt="img">
                                    </div>
                                    <h6 class="fs-14 mb-1">Leak Detection &amp; Repair</h6>
                                    <p class="fs-14 mb-0">
                                        0 Services
                                    </p>
                                    <a href="services/leak-detection-repair.html" class="link-primary text-decoration-underline fs-14">View All</a>
                                </div>
                            </div>
                            <div class="col d-flex">
                                <div class="category-item text-center flex-fill wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="mx-auto mb-3">
                                        <img src="{{ asset('frontend-assets/img') }}/categories/95QEwfPPIlvMQVVaBuUGa1hGOuWAKm52ZwXVNRVX.webp" class="img-fluid" alt="img">
                                    </div>
                                    <h6 class="fs-14 mb-1">Frozen Pipe Services</h6>
                                    <p class="fs-14 mb-0">
                                        0 Services
                                    </p>
                                    <a href="services/frozen-pipe-services.html" class="link-primary text-decoration-underline fs-14">View All</a>
                                </div>
                            </div>
                            <div class="col d-flex">
                                <div class="category-item text-center flex-fill wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="mx-auto mb-3">
                                        <img src="{{ asset('frontend-assets/img') }}/categories/K7PpIM1FuX9hyIEMvg4Xv9ZRL1i3SvVsHmAsGwWP.jpg" class="img-fluid" alt="img">
                                    </div>
                                    <h6 class="fs-14 mb-1">Backflow Preven</h6>
                                    <p class="fs-14 mb-0">
                                        0 Services
                                    </p>
                                    <a href="services/backflow-preven.html" class="link-primary text-decoration-underline fs-14">View All</a>
                                </div>
                            </div>
                            <div class="col d-flex">
                                <div class="category-item text-center flex-fill wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="mx-auto mb-3">
                                        <img src="{{ asset('frontend-assets/img') }}/categories/Dzv14gdIIjAbE6o8SPBokw78b1EoxiRSbhtTRUDT.webp" class="img-fluid" alt="img">
                                    </div>
                                    <h6 class="fs-14 mb-1">Sump Pump</h6>
                                    <p class="fs-14 mb-0">
                                        0 Services
                                    </p>
                                    <a href="services/sump-pump.html" class="link-primary text-decoration-underline fs-14">View All</a>
                                </div>
                            </div>
                            <div class="col d-flex">
                                <div class="category-item text-center flex-fill wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="mx-auto mb-3">
                                        <img src="{{ asset('frontend-assets/img') }}/categories/maD5qVYVvnxeodY6OjRK5hDKuCBPPOvaPLPf2eQA.webp" class="img-fluid" alt="img">
                                    </div>
                                    <h6 class="fs-14 mb-1">Renovation Plumbing</h6>
                                    <p class="fs-14 mb-0">
                                        0 Services
                                    </p>
                                    <a href="services/renovation-plumbing.html" class="link-primary text-decoration-underline fs-14">View All</a>
                                </div>
                            </div>
                            <div class="col d-flex">
                                <div class="category-item text-center flex-fill wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="mx-auto mb-3">
                                        <img src="{{ asset('frontend-assets/img') }}/categories/BoBBJS11uvLDwkQHAC4xP6LbXxvpSLPg6wYpFdwe.jpg" class="img-fluid" alt="img">
                                    </div>
                                    <h6 class="fs-14 mb-1">Trenchless Pipe Repair</h6>
                                    <p class="fs-14 mb-0">
                                        0 Services
                                    </p>
                                    <a href="services/trenchless-pipe-repair.html" class="link-primary text-decoration-underline fs-14">View All</a>
                                </div>
                            </div>
                            <div class="col d-flex">
                                <div class="category-item text-center flex-fill wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="mx-auto mb-3">
                                        <img src="{{ asset('frontend-assets/img') }}/categories/GTH5N2vffANEdqkzweA8unXLqIrKhr4sZkjwc0F9.webp" class="img-fluid" alt="img">
                                    </div>
                                    <h6 class="fs-14 mb-1">Hydro Jetting</h6>
                                    <p class="fs-14 mb-0">
                                        0 Services
                                    </p>
                                    <a href="services/hydro-jetting.html" class="link-primary text-decoration-underline fs-14">View All</a>
                                </div>
                            </div>
                            <div class="col d-flex">
                                <div class="category-item text-center flex-fill wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="mx-auto mb-3">
                                        <img src="{{ asset('frontend-assets/img') }}/categories/jldwAnQNwA0WI5KKMVqbsMuR4zTNheZViap8BgwA.webp" class="img-fluid" alt="img">
                                    </div>
                                    <h6 class="fs-14 mb-1">Boiler</h6>
                                    <p class="fs-14 mb-0">
                                        0 Services
                                    </p>
                                    <a href="services/boiler.html" class="link-primary text-decoration-underline fs-14">View All</a>
                                </div>
                            </div>
                            <div class="col d-flex">
                                <div class="category-item text-center flex-fill wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="mx-auto mb-3">
                                        <img src="{{ asset('frontend-assets/img') }}/categories/oQ6kw4pkk01AizAI9T24vMadLWVdPQGSdIQJfZ8E.webp" class="img-fluid" alt="img">
                                    </div>
                                    <h6 class="fs-14 mb-1">Smart Plumbing Installations</h6>
                                    <p class="fs-14 mb-0">
                                        0 Services
                                    </p>
                                    <a href="services/smart-plumbing-installations.html" class="link-primary text-decoration-underline fs-14">View All</a>
                                </div>
                            </div>
                            <div class="col d-flex">
                                <div class="category-item text-center flex-fill wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="mx-auto mb-3">
                                        <img src="{{ asset('frontend-assets/img') }}/categories/fGx0xalIyiaFPAQjzG7LPdpUHHUi6ehjkZCettUI.webp" class="img-fluid" alt="img">
                                    </div>
                                    <h6 class="fs-14 mb-1">Plumbing Maintenance Plan</h6>
                                    <p class="fs-14 mb-0">
                                        0 Services
                                    </p>
                                    <a href="services/plumbing-maintenance-plan.html" class="link-primary text-decoration-underline fs-14">View All</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- /Page Wrapper -->
@endsection

@push('scripts')
@endpush
