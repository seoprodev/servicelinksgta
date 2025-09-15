@extends('frontend.partials.master')
@section('title', 'User Dashboard')
@push('styles')
@endpush

@section('main-content')
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title mb-2">Dashboard</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center mb-0">
                            <li class="breadcrumb-item"><a href="https://servicelinksgta.globalhostpros.com/user/dashboard"><i class="ti ti-home-2"></i></a></li>
                            <li class="breadcrumb-item">Customer</li>
                            <li class="breadcrumb-item active" style="text-transform: capitalize;" aria-current="page">@yield('title' ?? 'dahboard')</li>
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


    <!-- Page Wrapper -->
    <div class="page-wrapper" style="transform: none;">
        <div class="content" style="transform: none;">
            <div class="container" style="transform: none;">
                <div class="row justify-content-center" style="transform: none;">
                    @include('frontend.user.partials.sidebar')
                    @yield('user-main-content')
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Wrapper -->
@endsection

@push('scripts')
@endpush
