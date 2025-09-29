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
            <div class="card mb-5 shadow rounded-3 border-0">
                <!-- Job Header -->
                <div class="card-header bg-gradient text-white p-4" style="background: linear-gradient(90deg, #4e73df, #224abe);">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h3 class="mb-1">{{ $job->title ?? 'Untitled Job' }}</h3>
                            <small class="text-primary"><i class="bi bi-clock me-1"></i> Posted {{ $job->created_at->diffForHumans() }}</small>
                        </div>
                        <span class="badge bg-primary px-3 py-2 ">Urgent</span>
                    </div>
                </div>

                <!-- Job Body -->
                <div class="card-body p-4">
                    <!-- Job Details -->
                    <h5 class="mb-3 border-bottom pb-2"><i class="bi bi-briefcase me-2 text-primary"></i>Job Details</h5>
                    <div class="row mb-4">
                        <div class="col-md-6 mb-2"><i class="bi bi-tools me-2 text-primary"></i> Category: <strong>{{ $job->category->name ?? 'N/A' }}</strong></div>
                        <div class="col-md-6 mb-2"><i class="bi bi-building me-2 text-primary"></i> Property: <strong>{{ $job->property_type }}</strong></div>
                        <div class="col-md-6 mb-2"><i class="bi bi-geo-alt me-2 text-primary"></i> Location: <strong>{{ $job->city }}, {{ $job->country }}</strong></div>
                        <div class="col-md-6 mb-2"><i class="bi bi-cash me-2 text-primary"></i> Budget: <strong>$ {{ ($job->budget) ? $job->budget : '0.00'  }} / Fixed</strong></div>
                    </div>

                    <!-- Description -->
                    <h5 class="mb-3 border-bottom pb-2"><i class="bi bi-file-text me-2 text-primary"></i>Description</h5>
                    <p class="text-muted">
                        {{ $job->description }}
                    </p>
                    @if(!empty($job->job_files))
                        <h5 class="mb-3 border-bottom pb-2">
                            <i class="bi bi-paperclip me-2 text-primary"></i>Attachments
                        </h5>
                        <div class="d-flex flex-wrap gap-3">
                            @foreach($job->job_files as $file)
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
                        <p class="mb-2"><strong>Name:</strong>  **********</p>
                        <p class="mb-2"><strong>Email:</strong>  **********</p>
                        <p class="mb-0"><strong>Phone:</strong>  **********</p>
                    </div>

                    <!-- Actions -->
                    <div class="text-end mt-4">
                        @if($job->leads->isNotEmpty())
                            <span class="btn btn-primary payment">Already Bought</span>
                        @else
                            @if($activeSubscription)
                                <button class="btn btn-primary buy-lead" data-jobid="{{ $job->faker_id }}">
                                    <span class="btn-text">Buy Now</span>
                                    <span class="spinner-border spinner-border-sm d-none" role="status"></span>
                                </button>
                            @else
                                <button class="btn btn-warning buy-lead-btn" data-jobid="{{ $job->id }}">
                                    <span class="spinner-border spinner-border-sm d-none" role="status"></span>
                                    <span class="btn-text">Pay As You Go (${{ $job->category->lead_price ?? 0 }})</span>
                                </button>
                            @endif
                        @endif


                    </div>


                </div>
            </div>
        </div>

    </div>

@endsection

@push('scripts')


    <script>
        $(document).ready(function() {
            $('.buy-lead').on('click', function() {
                var btn = $(this);
                var jobId = btn.data('jobid');
                var spinner = btn.find('.spinner-border');
                var btnText = btn.find('.btn-text');

                // Show loader
                spinner.removeClass('d-none');
                btnText.text('Processing...');
                btn.prop('disabled', true);

                $.ajax({
                    url: "{{ route('provider.buy-lead') }}",
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        job_id: jobId
                    },
                    success: function(response) {
                        if (response.success) {
                            alertify.success(response.message);
                            btnText.text('Purchased');
                            btn.prop('disabled', true);
                        } else {
                            // alertify.error(response.error|| 'Something went wrong!');
                            btnText.text('Buy Now');
                            btn.prop('disabled', false);
                        }
                        spinner.addClass('d-none');
                    },
                    error: function(xhr) {
                        var error = xhr.responseJSON?.error || 'Something went wrong!';
                        alertify.error(error);
                        spinner.addClass('d-none');
                        btnText.text('Buy Now');
                        btn.prop('disabled', false);
                    }
                });
            });
        });
    </script>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe("{{ env('STRIPE_KEY') }}");

        $('.buy-lead-btn').on('click', function() {
            let btn = $(this);
            let jobId = btn.data('jobid');
            let spinner = btn.find('.spinner-border');
            let btnText = btn.find('.btn-text');

            spinner.removeClass('d-none');
            btnText.text('Redirecting...');
            btn.prop('disabled', true);

            $.ajax({
                url: "{{ route('provider.pay-lead') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    job_id: jobId
                },
                success: function(res) {
                    if(res.session_id){
                        stripe.redirectToCheckout({ sessionId: res.session_id });
                    } else {
                        alertify.error(res.error || 'Something went wrong!');
                        spinner.addClass('d-none');
                        btnText.text('Pay As You Go');
                        btn.prop('disabled', false);
                    }
                },
                error: function(xhr){
                    let err = xhr.responseJSON?.message || xhr.responseJSON?.error || 'Something went wrong!';
                    alertify.error(err);
                    spinner.addClass('d-none');
                    btnText.text('Pay As You Go');
                    btn.prop('disabled', false);
                }
            });
        });
    </script>


@endpush