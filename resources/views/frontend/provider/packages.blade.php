@extends('frontend.provider.partials.master')

@section('title', 'Provider Subscriptions')
@section('provider-dashboard-content')
    <div class="col-xl-12 col-lg-12">
        <div class="breadcrumb-bar text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <h2 class="breadcrumb-title mb-2">Subscriptions</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center mb-0">
                                <li class="breadcrumb-item"><a href="javascript:"><i class="ti ti-home-2"></i></a></li>
                                <li class="breadcrumb-item">Provider</li>
                                <li class="breadcrumb-item active" aria-current="page">Subscriptions</li>
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

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="mb-4">Your Current Subscription</h3>

                    @if($activeSubscription)
                        <div class="card shadow-sm border-0 rounded-3">
                            <div class="card-body row align-items-center">
                                <div class="col-md-8">
                                    <h4 class="card-title mb-2">{{ $activeSubscription->package->name ?? 'N/A' }}</h4>
                                    <p class="mb-1">
                                        <strong>Price:</strong> ${{ number_format($activeSubscription->price, 2) }} {{ strtoupper($activeSubscription->currency) }}
                                    </p>
                                    <p class="mb-1">
                                        <strong>Status:</strong>
                                        <span class="badge bg-{{ $activeSubscription->subscription_status == 'active' ? 'success' : 'secondary' }}">
                                    {{ ucfirst($activeSubscription->subscription_status) }}
                                </span>
                                    </p>
                                    <p class="mb-1">
                                        <strong>Start Date:</strong> {{ $activeSubscription->start_date?->format('d M Y') }}
                                        | <strong>End Date:</strong> {{ $activeSubscription->end_date?->format('d M Y') }}
                                    </p>
                                    <p class="mb-1">
                                        <strong>Remaining Connects:</strong> {{ $activeSubscription->remaining_connects ?? 0 }}
                                    </p>
                                </div>
                                <div class="col-md-4 text-end">
                                    @if($activeSubscription->is_active)
                                        <a href="{{ route('subscriptions.cancel') }}"
                                           onclick="return confirm('Are you sure you want to cancel your subscription?');"
                                           class="btn btn-outline-danger px-4">
                                            Cancel Subscription
                                        </a>
                                    @else
                                        <span class="badge bg-secondary">Cancelled</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-info">
                            You don’t have any active subscription right now.
                        </div>
                    @endif
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row gap-4">
                <div class="col-md-12">
                    <h3 class="mb-4">Available Subscription Packages</h3>
                </div>
                @forelse($packages as $package)
                    <div class="col-md-4 card subscription-cards mb-4 position-relative">

                        <!-- Featured Ribbon -->
                        {{--                    @if($package->is_featured)--}}
                        {{--                        <span class="badge bg-warning text-dark position-absolute"--}}
                        {{--                              style="top:10px; right:-20px; transform: rotate(45deg); padding:8px 30px; font-size:14px;">--}}
                        {{--                Featured--}}
                        {{--            </span>--}}
                        {{--                    @endif--}}

                        <h2>{{ $package->name }}</h2>
                        <p class="price">${{ number_format($package->price, 2) }}</p>
                        <p>{{ $package->description }}</p>

                        <ul class="text-start">
                            <!-- Duration -->
                            <li class="justify-content-start">
                                <i class="fa fa-check text-success"></i>
                                {{ $package->billing_cycle == 'monthly' ? '1 Month' : '12 Months' }} / Duration
                            </li>

                            <!-- Leads (Connects) -->
                            <li class="justify-content-start">
                                <i class="fa fa-check text-success"></i>
                                {{ $package->connects ?? 0 }} Leads / month
                            </li>

                            <!-- Features -->
                            @php
                                $features = is_array($package->features) ? $package->features : json_decode($package->features, true);
                            @endphp
                            @if(!empty($features))
                                @foreach($features as $feature)
                                    <li class="justify-content-start">
                                        <i class="fa fa-check text-success"></i> {{ $feature }}
                                    </li>
                                @endforeach
                            @endif
                        </ul>

                        <div class="subscribebutton" id="subscribebutton{{ $package->id }}">
                            @if($activeSubscription && $activeSubscription->subscription_package_id == $package->id)
                                <button type="button"
                                        class="btn btn-success w-100"
                                        disabled>
                                    Active Package
                                </button>
                            @else
                                <button type="button"
                                        class="btn btn-primary subscribe w-100"
                                        data-planid="{{ $package->id }}">
                                    <span class="btn-text">Subscribe</span>
                                    <span class="spinner-border spinner-border-sm ms-2 d-none" role="status" aria-hidden="true"></span>
                                </button>
                            @endif
                        </div>

                    </div>
                @empty
                    <p class="text-center">No packages found</p>
                @endforelse
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe("{{ env('STRIPE_KEY') }}");

        document.querySelectorAll('.subscribe').forEach(btn => {
            btn.addEventListener('click', function () {
                const packageId = this.dataset.planid;

                const spinner = this.querySelector('.spinner-border');
                const btnText = this.querySelector('.btn-text');

                // Show loader
                spinner.classList.remove('d-none');
                btnText.textContent = 'Processing...';
                this.disabled = true;

                fetch("{{ route('subscriptions.checkout') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        package_id: packageId
                    })
                })
                    .then(res => res.json())
                    .then(data => {
                        if (data.id) {
                            stripe.redirectToCheckout({ sessionId: data.id });
                        } else {
                            throw new Error(data.error || "Something went wrong!");
                        }
                    })
                    .catch(err => {
                        alertify.error(err.message);
                        // Reset button state
                        spinner.classList.add('d-none');
                        btnText.textContent = 'Subscribe';
                        this.disabled = false;
                    });

            });
        });
    </script>




@endpush