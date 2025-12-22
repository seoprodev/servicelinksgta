@extends('frontend.provider.partials.master')

@section('title', 'Provider Dashboard')

@section('provider-dashboard-content')
    <div class="col-xl-12 col-lg-12">
        @if(auth()->user()->profile && auth()->user()->profile->phone_verified_at == null)
            <div class="alert alert-warning d-flex justify-content-between align-items-center shadow-sm" role="alert">
                <div>
                    <i class="fa fa-exclamation-triangle me-2"></i>
                    <strong>Phone Verification Required:</strong> Please verify your phone number to access all features.
                </div>
                <a href="{{ route('provider.profile') }}" class="btn btn-sm btn-primary">
                    Verify Now
                </a>
            </div>
        @endif
        <!-- Page Header -->
        <div class="breadcrumb-bar text-center mb-4">
            <div class="container">
                <h2 class="breadcrumb-title mb-2">Provider Dashboard</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="ti ti-home-2"></i></a></li>
                        <li class="breadcrumb-item">Provider</li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row">
            <div class="col-md-3 col-sm-6 mb-4">
                <a href="{{ route('provider.my.lead') }}"><div class="card shadow-sm text-center p-3">
                    <h6 class="text-muted">My Leads</h6>
                    <h3 class="fw-bold">{{ $leadsCount }}</h3>
                    <p class="mb-0 text-success">+{{ $todayLeads }} Today</p>
                </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
                <a href="{{ route('provider.packages') }}">
                    <div class="card shadow-sm text-center p-3">
                    <h6 class="text-muted">Subscription</h6>
                    <h3 class="fw-bold">{{ $planName }}</h3>
                    <p class="mb-0 text-info">Valid till: {{ $validTill }}</p>
                    <p class="mb-0 small">
                        {{ $currency }}{{ number_format($price,2) }} |
                        <span class="{{ $status == 'active' ? 'text-success' : 'text-danger' }}">
                            {{ ucfirst($status) }}
                        </span>
                    </p>
                    <p class="mb-0 small">Connects Left: {{ $remainingConnects }}</p>
                </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
                <a href="{{ \Illuminate\Support\Facades\URL::to('/provider/tickets') }}">
                <div class="card shadow-sm text-center p-3">
                    <h6 class="text-muted">Tickets</h6>
                    <h3 class="fw-bold">{{ $ticketsCount }}</h3>
                    <p class="mb-0 text-warning">{{ $pendingTickets }} Pending</p>
                </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 mb-4">
                <a href="{{ route('client.review.index') }}">
                <div class="card shadow-sm text-center p-3">
                    <h6 class="text-muted">Reviews</h6>
                    <h3 class="fw-bold">{{ $averageRating }} ⭐</h3>
                    <p class="mb-0 text-primary">{{ $reviewsCount }} Reviews</p>
                </div>
                </a>
            </div>
        </div>

        <!-- Charts Row -->
        <div class="row">
            <div class="col-md-12 mb-4">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h5 class="mb-0">Leads Overview</h5>
                    </div>
                    <div class="card-body">
                        <div id="leads-chart" style="height: 250px;"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity (Dummy for now) -->
{{--        <div class="card shadow-sm mb-4">--}}
{{--            <div class="card-header">--}}
{{--                <h5 class="mb-0">Recent Activities</h5>--}}
{{--            </div>--}}
{{--            <div class="card-body">--}}
{{--                <ul class="list-group list-group-flush">--}}
{{--                    <li class="list-group-item">New lead purchased</li>--}}
{{--                    <li class="list-group-item">Subscription status updated</li>--}}
{{--                    <li class="list-group-item">Ticket submitted</li>--}}
{{--                    <li class="list-group-item">New review received</li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}

    </div>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/5.3.5/apexcharts.min.js"></script>
    <script>
        // Leads Chart Dynamic
        new ApexCharts(document.querySelector("#leads-chart"), {
            chart: { type: 'bar', height: 250 },
            series: [{
                name: 'Leads',
                data: @json($chartData) // Laravel -> JS
            }],
            xaxis: { categories: @json($months) },
            colors: ['#47c363']
        }).render();
    </script>
@endpush
