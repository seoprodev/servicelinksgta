@extends('frontend.provider.partials.master')

@section('title', 'Provider Subscriptions')
@section('provider-dashboard-content')
    <div class="col-xl-10 col-lg-8">
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



        <div class="row gap-1">
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