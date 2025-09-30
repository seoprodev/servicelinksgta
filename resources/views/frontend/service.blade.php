@extends('frontend.partials.master')
@section('title', 'Jobs')
@push('styles')
@endpush

@section('main-content')
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title mb-2">Jobs</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="index.html"><i class="ti ti-home-2"></i></a></li>
                            <li class="breadcrumb-item active" aria-current="page">Jobs</li>
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
    <!-- /Breadcrumb -->

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content">

{{--            @if(!auth()->check())--}}

{{--            <div class="container">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-12 text-center d-flex">--}}
{{--                        <ul class="nav header-navbar-rht m-auto">--}}
{{--                            <li class="nav-item pe-1">--}}
{{--                                <a class="nav-link btn btn-light" href="#" data-bs-toggle="modal" data-bs-target="#all-login-modal"><i class="ti ti-lock me-2"></i>Sign in</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link btn btn-linear-primary" href="#" data-bs-toggle="modal" data-bs-target="#cleint-sign-up"><i class="ti ti-user-filled me-2"></i>Join us</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--@else--}}


{{-- if else codition--}}
            <div class="container" style="transform: none;">
                <div class="row" style="transform: none;">

                    <div class="col-xl-3 col-lg-4 theiaStickySidebar" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">

                        <div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; transform: none;"><div class="card mb-4 mb-lg-0">
                                <div class="card-body ">
                                    <form action="{{ route('front.service') }}" method="GET" id="filterForm">
                                        <div class="d-flex align-items-center justify-content-between mb-3 pb-3 border-bottom">
                                            <h5><i class="ti ti-filter-check me-2"></i>Filters</h5>
                                            <a href="{{ route('front.service') }}">Reset Filter</a>
                                        </div>

                                        {{-- 🔹 Search --}}
                                        <div class="mb-3 pb-3 border-bottom">
                                            <label class="form-label">Search By Keyword</label>
                                            <input type="text"
                                                   name="keywords"
                                                   id="keywords"
                                                   class="form-control"
                                                   maxlength="50"
                                                   value="{{ request('keywords') }}"
                                                   placeholder="What are you looking for?">
                                        </div>

                                        {{-- 🔹 Categories --}}
                                        <div class="accordion border-bottom mb-3">
                                            <div class="accordion-item mb-3">
                                                <div class="accordion-header" id="accordion-headingThree">
                                                    <div class="accordion-button p-0 mb-3" data-bs-toggle="collapse"
                                                         data-bs-target="#accordion-collapseThree"
                                                         aria-expanded="true" aria-controls="accordion-collapseThree" role="button">
                                                        Categories
                                                    </div>
                                                </div>
                                                <div id="accordion-collapseThree" class="accordion-collapse collapse show">
                                                    <div class="content-list mb-3" id="fill-more">
                                                        {{-- All Category --}}
                                                        <div class="form-check mb-2">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" id="all_categories" type="checkbox"
                                                                        {{ request()->has('cate') ? '' : 'checked' }}>
                                                                All Category
                                                            </label>
                                                        </div>

                                                        {{-- Example categories --}}
                                                        @foreach($categories as $category)
                                                            <div class="form-check mb-2">
                                                                <label class="form-check-label">
                                                                    <input name="cate[]"
                                                                           value="{{ $category->id }}"
                                                                           class="form-check-input filter_category"
                                                                           type="checkbox"
                                                                            {{ in_array($category->id, request('cate', [])) ? 'checked' : '' }}>
                                                                    {{ $category->name }}
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <a href="javascript:void(0);" id="more" class="more-view text-primary fs-14">
                                                        View more <i class="ti ti-chevron-down ms-1"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- 🔹 Location --}}
                                        <div class="accordion border-bottom mb-3">
                                            <div class="accordion-header" id="accordion-headingFive">
                                                <div class="accordion-button p-0 mb-3" data-bs-toggle="collapse"
                                                     data-bs-target="#accordion-collapseFive"
                                                     aria-expanded="true" aria-controls="accordion-collapseFive" role="button">
                                                    Location
                                                </div>
                                            </div>
                                            <div id="accordion-collapseFive" class="accordion-collapse collapse show">
                                                <div class="mb-3">
                                                    <div class="position-relative">
                                                        <select class="form-select" name="location" id="location">
                                                            <option value="">Select Location</option>
                                                            @foreach($locations as $loc)
                                                                <option value="{{ $loc->city }}"
                                                                        {{ request('location') == $loc->name ? 'selected' : '' }}>
                                                                    {{ $loc->city }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-dark w-100" id="searchServiceBtn">Search</button>
                                    </form>

                                </div>
                            </div><div class="resize-sensor" style="position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden;"><div class="resize-sensor-expand" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;"><div style="position: absolute; left: 0px; top: 0px; transition: all; width: 340px; height: 631px;"></div></div><div class="resize-sensor-shrink" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;"><div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%"></div></div></div></div></div>
                    <div class="col-xl-9 col-lg-8">
                        <div class="d-flex justify-content-between align-items-center flex-wrap mb-4">
                            <h4>Found <span class="text-primary">{{ $jobs->count() }} Jobs</span></h4>
{{--                            <form action="javascript:" method="GET" id="sortform">--}}
{{--                                <div class="d-flex align-items-center">--}}
{{--                                    <span class="text-dark me-2">Sort</span>--}}
{{--                                    <select class="select select2-hidden-accessible" name="sortprice" id="sortprice" onchange="this.form.submit()" data-select2-id="sortprice" tabindex="-1" aria-hidden="true">--}}
{{--                                        <option value="" data-select2-id="4">Price Low to High</option>--}}
{{--                                        <option value="highl">--}}
{{--                                            Price High to Low--}}
{{--                                        </option>--}}
{{--                                    </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="3" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-sortprice-container"><span class="select2-selection__rendered" id="select2-sortprice-container" role="textbox" aria-readonly="true" title="Price Low to High">Price Low to High</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>--}}
{{--                                    <input type="hidden" name="category" value="">--}}
{{--                                </div>--}}
{{--                            </form>--}}
                        </div>
                        <div class="row align-items-center">
                            <style>
                                .border-left {
                                    border-left: 3px solid
                                }

                            </style>
                            @forelse($jobs as $job)
                                <div class="card shadow-none booking-list border-left">
                                    <div class="card-body d-md-flex align-items-center">
                                        <div class="booking-widget d-sm-flex align-items-center row-gap-3 flex-fill mb-3 mb-md-0">
                                            <div class="booking-det-info">
                                                <h6 class="mb-3">
                                                    <a href="#"
                                                       data-bs-toggle="modal"
                                                       data-bs-target="#booking_details"
                                                       data-booking-details-id="{{ $job->id }}">
                                                        <span>{{ $job->title ?? 'Untitled Job' }}</span>
                                                    </a>
                                                    @if($job->priority)
                                                        <span class="booking-status badge badge-primary-transparent ms-2">
                                                            {{ $job->priority }}
                                                        </span>
                                                    @endif
                                                </h6>
                                                <ul class="booking-details">
                                                    <li class="d-flex align-items-center mb-2">
                                                        <i class="ti ti-tool me-2"></i>
                                                        {{ $job->category->name ?? 'N/A' }} &nbsp;&nbsp;&nbsp;

                                                        <i class="ti ti-map-pin me-2"></i>
                                                        {{ $job->city ?? 'Unknown' }}, {{ $job->country ?? '' }} &nbsp;&nbsp;&nbsp;

                                                        <i class="ti ti-clock me-2"></i>
                                                        {{ $job->created_at->diffForHumans() }}
                                                    </li>

                                                    <li class="d-flex align-items-center mb-2">
                                                        <span class="book-item font-weight-bold">Client Budget</span>
                                                        <small class="mx-2">:</small>
                                                        ${{ $job->budget ?? 'N/A' }} / {{ $job->payment_type ?? 'fixed' }}
                                                    </li>

                                                    <li class="d-flex align-items-center flex-wrap">
                                                        <span class="book-item font-weight-bold">Client</span>
                                                        <small class="mx-2">:</small>
                                                        <div class="user-book d-flex align-items-center flex-wrap">
                                                            <span class="me-4">{{ $job->user->name ?? 'Unknown' }}</span>
                                                        </div>
                                                        <p class="mb-0 me-2">
                                                            <i class="ti ti-mail fs-10 text-muted me-1"></i>
                                                            {{ Str::mask($job->user->email ?? 'N/A', '*', 2, 8) }}
                                                        </p>
                                                        <p>
                                                            <i class="ti ti-phone-filled fs-10 text-muted me-2"></i>
                                                            +XXX-XXXXXXX

                                                        </p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                        @if(!auth()->check())
                                            <button type="button" class="btn btn-linear-primary" data-bs-toggle="modal" data-bs-target="#show--sign--up--model">
                                                View More
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <p class="text-center text-muted">No jobs available right now.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
{{-- if else codition--}}
{{--@endif--}}
        </div>

    </div>
    <!-- /Page Wrapper -->
@endsection

@push('scripts')
@endpush
