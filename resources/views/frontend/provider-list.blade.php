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
                    <h2 class="breadcrumb-title mb-2">Providers</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="../index.html"><i class="ti ti-home-2"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Providers</li>
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

    <div class="page-wrapper">
        <div class="content content-two">
            <div class="container">
                <div class="row align-items-start">


                    <div class="col-xl-3 col-lg-4 theiaStickySidebar">
                        <div class="card">
                            <div class="card-body">
                                <form id="searchFilterForm">
                                    <div class="d-flex align-items-center justify-content-between mb-3 pb-3 border-bottom">
                                        <h5><i class="ti ti-filter-check me-2"></i>Filters</h5>
                                        <a href="javascript:void(0);" id="resetFilter">Reset Filter</a>
                                    </div>
                                    <div class="mb-3 pb-3 border-bottom">
                                        <label class="form-label">Search By Keyword</label>
                                        <input type="text" class="form-control" id="keywords" placeholder="What are you looking for?">
                                    </div>

                                    <div class="accordion border-bottom mb-3">
                                        <div class="accordion-item mb-3">
                                            <div class="accordion-header" id="accordion-headingThree">
                                                <div class="accordion-button p-0 mb-3" data-bs-toggle="collapse" data-bs-target="#accordion-collapseThree" aria-expanded="true" aria-controls="accordion-collapseThree" role="button">
                                                    Categories
                                                </div>
                                            </div>
                                            <div id="accordion-collapseThree" class="accordion-collapse collapse show" aria-labelledby="accordion-headingThree">
                                                <div class="content-list mb-3" id="fill-more">
                                                    <div class="form-check mb-2" >
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" id="all_categories" type="checkbox" checked>
                                                            All Categories
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-2">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input category-checkbox filter_category" name="category_id" type="checkbox" value="17">
                                                            General Plumbing
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-2">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input category-checkbox filter_category" name="category_id" type="checkbox" value="18">
                                                            Bathroom Plumbing
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-2">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input category-checkbox filter_category" name="category_id" type="checkbox" value="19">
                                                            Kitchen Plumbing
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-2">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input category-checkbox filter_category" name="category_id" type="checkbox" value="20">
                                                            Emergency Plumbing
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-2">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input category-checkbox filter_category" name="category_id" type="checkbox" value="21">
                                                            Drain &amp; Sewer
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-2">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input category-checkbox filter_category" name="category_id" type="checkbox" value="22">
                                                            Water Heater
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-2">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input category-checkbox filter_category" name="category_id" type="checkbox" value="23">
                                                            Water Filtration &amp; S...
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-2">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input category-checkbox filter_category" name="category_id" type="checkbox" value="24">
                                                            Outdoor Plumbing
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-2">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input category-checkbox filter_category" name="category_id" type="checkbox" value="25">
                                                            Commercial Plumbing
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-2">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input category-checkbox filter_category" name="category_id" type="checkbox" value="26">
                                                            Toilet &amp; Faucet
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-2">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input category-checkbox filter_category" name="category_id" type="checkbox" value="27">
                                                            Gas Line
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-2">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input category-checkbox filter_category" name="category_id" type="checkbox" value="28">
                                                            Leak Detection &amp; Rep...
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-2">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input category-checkbox filter_category" name="category_id" type="checkbox" value="29">
                                                            Frozen Pipe Services
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-2">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input category-checkbox filter_category" name="category_id" type="checkbox" value="30">
                                                            Backflow Preven
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-2">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input category-checkbox filter_category" name="category_id" type="checkbox" value="31">
                                                            Sump Pump
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-2">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input category-checkbox filter_category" name="category_id" type="checkbox" value="32">
                                                            Renovation Plumbing
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-2">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input category-checkbox filter_category" name="category_id" type="checkbox" value="33">
                                                            Trenchless Pipe Repa...
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-2">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input category-checkbox filter_category" name="category_id" type="checkbox" value="34">
                                                            Hydro Jetting
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-2">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input category-checkbox filter_category" name="category_id" type="checkbox" value="35">
                                                            Boiler
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-2">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input category-checkbox filter_category" name="category_id" type="checkbox" value="36">
                                                            Smart Plumbing Insta...
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-2">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input category-checkbox filter_category" name="category_id" type="checkbox" value="37">
                                                            Plumbing Maintenance...
                                                        </label>
                                                    </div>

                                                </div>
                                                <a href="javascript:void(0);" id="more" class="more-view text-primary fs-14">View more <i class="ti ti-chevron-down ms-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion border-bottom mb-3">
                                        <div class="accordion-header" id="accordion-headingFour">
                                            <div class="accordion-button p-0 mb-3" data-bs-toggle="collapse" data-bs-target="#accordion-collapseFour" aria-expanded="true" aria-controls="accordion-collapseFour" role="button">
                                                Price Range
                                            </div>
                                        </div>
                                        <div id="accordion-collapseFour" class="accordion-collapse collapse show" aria-labelledby="accordion-headingFour">
                                            <div class="row gx-2">
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control" placeholder="$ Min">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control" placeholder="$ Max">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion border-bottom mb-3">
                                        <div class="accordion-header" id="accordion-headingFive">
                                            <div class="accordion-button p-0 mb-3" data-bs-toggle="collapse" data-bs-target="#accordion-collapseFive" aria-expanded="true" aria-controls="accordion-collapseFive" role="button">
                                                Location
                                            </div>
                                        </div>
                                        <div id="accordion-collapseFive" class="accordion-collapse collapse show" aria-labelledby="accordion-headingFive">
                                            <div class="mb-3">
                                                <select class="select" name="location" id="location">
                                                    <option value="" selected>Select Location</option>
                                                    <option value="46334">Dayton</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion">
                                        <div class="accordion-item mb-3">
                                            <div class="accordion-header" id="accordion-headingTwo">
                                                <div class="accordion-button fs-18 p-0 mb-3" data-bs-toggle="collapse" data-bs-target="#accordion-collapseTwo" aria-expanded="true" aria-controls="accordion-collapseTwo" role="button">
                                                    Ratings
                                                </div>
                                            </div>
                                            <div id="accordion-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="accordion-headingTwo">
                                                <div class="mb-3">
                                                    <div class="form-check mb-2">
                                                        <label class="form-check-label d-block">
                                                            <input class="form-check-input rating_filter" value="5" type="checkbox">
                                                            <span class="rating">
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star filled"></i><span class="float-end"></span>
                                                        </span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-2">
                                                        <label class="form-check-label d-block">
                                                            <input class="form-check-input rating_filter" value="4" type="checkbox">
                                                            <span class="rating">
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fa-regular fa-star filled"></i><span class="float-end"></span>
                                                        </span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-2">
                                                        <label class="form-check-label d-block">
                                                            <input class="form-check-input rating_filter" value="3" type="checkbox">
                                                            <span class="rating">
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fa-regular fa-star filled"></i>
                                                            <i class="fa-regular fa-star filled"></i><span class="float-end"></span>
                                                        </span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-2">
                                                        <label class="form-check-label d-block">
                                                            <input class="form-check-input rating_filter" value="2" type="checkbox">
                                                            <span class="rating">
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fa-regular fa-star filled"></i>
                                                            <i class="fa-regular fa-star filled"></i>
                                                            <i class="fa-regular fa-star filled"></i><span class="float-end"></span>
                                                        </span>
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-2">
                                                        <label class="form-check-label d-block">
                                                            <input class="form-check-input rating_filter" value="1" type="checkbox">
                                                            <span class="rating">
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fa-regular fa-star filled"></i>
                                                            <i class="fa-regular fa-star filled"></i>
                                                            <i class="fa-regular fa-star filled"></i>
                                                            <i class="fa-regular fa-star filled"></i><span class="float-end"></span>
                                                        </span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-dark w-100" id="searchProviderBtn" >Search</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8">
                        <div class="row" id="providers-container">
                            <div class="col-xl-4 col-md-6 provider-card">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="card-img card-provider-img card-img-hover mb-3">
                                            <a href="/user/providerdetails" class="provider-details-link" data-provider-id="5">
                                                <img src="{{ asset('frontend-assets') }}/img/profile-default.png" alt="Provider Image" class="img-fluid">
                                            </a>
                                        </div>
                                        <div>
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                <div>
                                                    <h5 class="d-flex align-items-center mb-1">
                                                        <a href="/user/providerdetails" class="provider-details-link" data-provider-id="5">client one</a>
                                                        <span class="text-success ms-2"><i class="fa fa-check-circle"></i></span>
                                                    </h5>
                                                    <span>General Plumbing</span>
                                                </div>
                                                <p class="fs-18 fw-medium text-dark">$50.00<span class="fw-normal fs-13 text-default">/hr</span></p>
                                            </div>
                                            <div class="rating d-flex align-items-center justify-content-between">
                                                <div class="rating-stars d-flex align-items-center">
                                                    <i class="fas fa-star "></i>
                                                    <i class="fas fa-star "></i>
                                                    <i class="fas fa-star "></i>
                                                    <i class="fas fa-star "></i>
                                                    <i class="fas fa-star "></i>
                                                    <span class="ms-2 d-inline-block">(0)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 provider-card">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="card-img card-provider-img card-img-hover mb-3">
                                            <a href="/user/providerdetails" class="provider-details-link" data-provider-id="7">
                                                <img src="{{ asset('frontend-assets') }}/img/profile-default.png" alt="Provider Image" class="img-fluid">
                                            </a>
                                        </div>
                                        <div>
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                <div>
                                                    <h5 class="d-flex align-items-center mb-1">
                                                        <a href="/user/providerdetails" class="provider-details-link" data-provider-id="7">Nicky Sam</a>
                                                        <span class="text-success ms-2"><i class="fa fa-check-circle"></i></span>
                                                    </h5>
                                                    <span>General Plumbing</span>
                                                </div>
                                                <p class="fs-18 fw-medium text-dark">$50.00<span class="fw-normal fs-13 text-default">/hr</span></p>
                                            </div>
                                            <div class="rating d-flex align-items-center justify-content-between">
                                                <div class="rating-stars d-flex align-items-center">
                                                    <i class="fas fa-star "></i>
                                                    <i class="fas fa-star "></i>
                                                    <i class="fas fa-star "></i>
                                                    <i class="fas fa-star "></i>
                                                    <i class="fas fa-star "></i>
                                                    <span class="ms-2 d-inline-block">(0)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 provider-card">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="card-img card-provider-img card-img-hover mb-3">
                                            <a href="/user/providerdetails" class="provider-details-link" data-provider-id="8">
                                                <img src="{{ asset('frontend-assets') }}/img/profile-default.png" alt="Provider Image" class="img-fluid">
                                            </a>
                                        </div>
                                        <div>
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                <div>
                                                    <h5 class="d-flex align-items-center mb-1">
                                                        <a href="/user/providerdetails" class="provider-details-link" data-provider-id="8">Client Two</a>
                                                        <span class="text-success ms-2"><i class="fa fa-check-circle"></i></span>
                                                    </h5>
                                                    <span>General Plumbing</span>
                                                </div>
                                                <p class="fs-18 fw-medium text-dark">$50.00<span class="fw-normal fs-13 text-default">/hr</span></p>
                                            </div>
                                            <div class="rating d-flex align-items-center justify-content-between">
                                                <div class="rating-stars d-flex align-items-center">
                                                    <i class="fas fa-star "></i>
                                                    <i class="fas fa-star "></i>
                                                    <i class="fas fa-star "></i>
                                                    <i class="fas fa-star "></i>
                                                    <i class="fas fa-star "></i>
                                                    <span class="ms-2 d-inline-block">(0)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6 provider-card">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="card-img card-provider-img card-img-hover mb-3">
                                            <a href="/user/providerdetails" class="provider-details-link" data-provider-id="17">
                                                <img src="{{ asset('frontend-assets') }}/img/profile-default.png" alt="Provider Image" class="img-fluid">
                                            </a>
                                        </div>
                                        <div>
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                <div>
                                                    <h5 class="d-flex align-items-center mb-1">
                                                        <a href="/user/providerdetails" class="provider-details-link" data-provider-id="17">Client Three</a>
                                                        <span class="text-success ms-2"><i class="fa fa-check-circle"></i></span>
                                                    </h5>
                                                    <span>General Plumbing</span>
                                                </div>
                                                <p class="fs-18 fw-medium text-dark">$50.00<span class="fw-normal fs-13 text-default">/hr</span></p>
                                            </div>
                                            <div class="rating d-flex align-items-center justify-content-between">
                                                <div class="rating-stars d-flex align-items-center">
                                                    <i class="fas fa-star "></i>
                                                    <i class="fas fa-star "></i>
                                                    <i class="fas fa-star "></i>
                                                    <i class="fas fa-star "></i>
                                                    <i class="fas fa-star "></i>
                                                    <span class="ms-2 d-inline-block">(0)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div></div>
                    </div>
                </div>
            </div>

{{-- if else codition--}}
{{-- if else codition--}}
        </div>
    </div>

{{--    <div class="modal fade" id="success_modal" tabindex="-1" aria-hidden="true">--}}
{{--        <div class="modal-dialog modal-dialog-centered">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-body text-center">--}}
{{--                    <div class="mb-4">--}}
{{--					<span class="success-icon mx-auto mb-4">--}}
{{--						<i class="ti ti-check"></i>--}}
{{--					</span>--}}
{{--                        <p>Your has been sent successfully</p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- /Page Wrapper -->
@endsection

@push('scripts')
@endpush
