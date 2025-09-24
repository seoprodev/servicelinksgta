@extends('frontend.provider.partials.master')

@section('title', 'Provider Dashboard')
@section('provider-dashboard-content')
    <div class="col-xl-10 col-lg-8">
        <div class="breadcrumb-bar text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <h2 class="breadcrumb-title mb-2">Dashboard</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center mb-0">
                                <li class="breadcrumb-item"><a href="javascript:"><i class="ti ti-home-2"></i></a></li>
                                <li class="breadcrumb-item">Provider</li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
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



{{--        --}}
    </div>

@endsection