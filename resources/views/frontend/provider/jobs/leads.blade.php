@extends('frontend.provider.partials.master')

@section('title', 'Provider Subscriptions')
@section('provider-dashboard-content')
    <div class="col-xl-12 col-lg-12">
        <div class="breadcrumb-bar text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <h2 class="breadcrumb-title mb-2">Leads</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center mb-0">
                                <li class="breadcrumb-item"><a href="javascript:"><i class="ti ti-home-2"></i></a></li>
                                <li class="breadcrumb-item">Provider</li>
                                <li class="breadcrumb-item active" aria-current="page">Leads</li>
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

    <div class="container">
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
                                    $ {{ ($job->budget) ? $job->budget : '0.00'  }} / {{ $job->payment_type ?? 'fixed' }}
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

{{--                    <a href="{{ route('provider.lead.show', $job->faker_id) }}"  class="btn btn-success payment">--}}
{{--                        View Detail--}}
{{--                    </a>--}}
                    @if($job->leads->isNotEmpty())

                        <a href="{{ route('provider.lead.show', $job->faker_id) }}" class="btn btn-primary payment">Already Bought</a>
                    @else
                        <a href="{{ route('provider.lead.show', $job->faker_id) }}" class="btn btn-success payment">
                            View Detail
                        </a>
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

@endsection

@push('scripts')




@endpush