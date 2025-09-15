@extends('frontend.provider.partials.master')

@section('title', 'Provider Subscriptions')
@section('provider-dashboard-content')
    <div class="col-xl-10 col-lg-8">
        <div class="breadcrumb-bar text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <h2 class="breadcrumb-title mb-2">Leads</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center mb-0">
                                <li class="breadcrumb-item"><a href="https://servicelinksgta.globalhostpros.com/user/dashboard"><i class="ti ti-home-2"></i></a></li>
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
            <div class="card mb-5 shadow rounded-3 border-0">
                <!-- Job Header -->
                <div class="card-header bg-gradient text-white p-4" style="background: linear-gradient(90deg, #4e73df, #224abe);">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="mb-1">{{ $lead->job->title ?? 'Untitled Job' }}</h3>
                            <small class="text-primary"><i class="bi bi-clock me-1"></i> Posted {{ $lead->job->created_at->diffForHumans() }}</small>
                        </div>
                        <span class="badge bg-primary px-3 py-2 ">Urgent</span>
                    </div>
                </div>

                <!-- Job Body -->
                <div class="card-body p-4">
                    <!-- Job Details -->
                    <h5 class="mb-3 border-bottom pb-2"><i class="bi bi-briefcase me-2 text-primary"></i>Job Details</h5>
                    <div class="row mb-4">
                        <div class="col-md-6 mb-2"><i class="bi bi-tools me-2 text-primary"></i> Category: <strong>{{ $lead->job->category->name ?? 'N/A' }}</strong></div>
                        <div class="col-md-6 mb-2"><i class="bi bi-building me-2 text-primary"></i> Property: <strong>{{ $lead->job->property_type }}</strong></div>
                        <div class="col-md-6 mb-2"><i class="bi bi-geo-alt me-2 text-primary"></i> Location: <strong>{{ $lead->job->city }}, {{ $lead->job->country }}</strong></div>
                        <div class="col-md-6 mb-2"><i class="bi bi-cash me-2 text-primary"></i> Budget: <strong>$200 / Fixed</strong></div>
                    </div>

                    <!-- Description -->
                    <h5 class="mb-3 border-bottom pb-2"><i class="bi bi-file-text me-2 text-primary"></i>Description</h5>
                    <p class="text-muted">
                        {{ $lead->job->description }}
                    </p>
                    @if(!empty($lead->job->job_files))
                        <h5 class="mb-3 border-bottom pb-2">
                            <i class="bi bi-paperclip me-2 text-primary"></i>Attachments
                        </h5>
                        <div class="d-flex flex-wrap gap-3">
                            @foreach($lead->job->job_files as $file)
                                <a href="{{ asset($file) }}" target="_blank">
                                    <img src="{{ asset($file) }}"
                                         class="img-fluid rounded shadow-sm border"
                                         alt="Attachment"
                                         style="width:150px; height:100px; object-fit:cover;">
                                </a>
                            @endforeach
                        </div>
                @endif
                <!-- Client Info -->
                    <h5 class="mt-4 mb-3 border-bottom pb-2"><i class="bi bi-person-badge me-2 text-primary"></i>Client Information</h5>
                    <div class="card p-3 border-0 shadow-sm">
                        <p class="mb-2"><strong>Name:</strong>  {{ $lead->job->user->name }}</p>
                        <p class="mb-2"><strong>Email:</strong>  {{ $lead->job->user->email }}</p>
                        <p class="mb-0"><strong>Phone:</strong>  {{ $lead->job->user->profile->phone }}</p>
                    </div>

                    <!-- Actions -->
{{--                    <div class="text-end mt-4">--}}
{{--                        @if($activeSubscription)--}}
{{--                            <button class="btn btn-primary buy-lead" data-jobid="{{ $lead->job->faker_id }}">--}}
{{--                                <span class="btn-text">Buy Now</span>--}}
{{--                                <span class="spinner-border spinner-border-sm d-none" role="status"></span>--}}
{{--                            </button>--}}
{{--                        @else--}}
{{--                            <button class="btn btn-warning buy-lead-btn" data-jobid="{{ $lead->job->id }}">--}}
{{--                                <span class="spinner-border spinner-border-sm d-none" role="status"></span>--}}
{{--                                <span class="btn-text">Pay As You Go (${{ $lead->job->category->lead_price ?? 0 }})</span>--}}
{{--                            </button>--}}
{{--                        @endif--}}
{{--                    </div>--}}


                </div>
            </div>
        </div>

    </div>

@endsection

@push('scripts')





@endpush