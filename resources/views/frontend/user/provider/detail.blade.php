@extends('frontend.user.partials.master')

@push('styles')
    <style>
        .provider-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            padding: 20px;
        }
        .provider-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #003b57;
        }
        .info-label {
            font-weight: 600;
            color: #555;
        }
        .info-value {
            color: #222;
        }
    </style>
@endpush

@section('title', 'Provider Detail')

@section('user-main-content')
    <div class="col-xl-9 col-lg-8">
        <div class="provider-card">
            <div class="d-flex align-items-center mb-4">
                <div class="me-4">
                    @if($provider->profile->avatar)
                        <img src="{{ asset($provider->profile->avatar) }}" alt="Avatar" class="provider-avatar">
                    @else
                        <img src="{{ asset('default-avatar.png') }}" alt="Avatar" class="provider-avatar">
                    @endif
                </div>
                <div>
                    <h3 class="mb-1">{{ $provider->profile->first_name }} {{ $provider->profile->last_name }}</h3>
                    <p class="text-muted mb-1"><i class="feather-map-pin"></i>
                        {{ ucfirst($provider->profile->city) }}, {{ ucfirst($provider->profile->state) }}, {{ strtoupper($provider->profile->country) }}
                    </p>
                    <p class="text-muted mb-0">
                        <i class="feather-phone"></i> {{ $provider->profile->phone }}
                    </p>
                </div>
            </div>

            <hr>

            <h5>About</h5>
            <p>{{ $provider->profile->bio ?? 'No bio available.' }}</p>

            <div class="row mt-4">
                <div class="col-md-6">
                    <p><span class="info-label">Gender:</span> <span class="info-value">{{ ucfirst($provider->profile->gender) }}</span></p>
                    <p><span class="info-label">Date of Birth:</span> <span class="info-value">{{ $provider->profile->dob }}</span></p>
                    <p><span class="info-label">Email:</span> <span class="info-value">{{ $provider->email }}</span></p>
                </div>
                <div class="col-md-6">
                    <p><span class="info-label">Company:</span> <span class="info-value">{{ $provider->profile->company_name }}</span></p>
                    <p><span class="info-label">Address:</span> <span class="info-value">{{ $provider->profile->address }}</span></p>
                    <p><span class="info-label">Postal Code:</span> <span class="info-value">{{ $provider->profile->postal_code }}</span></p>
                </div>
            </div>

            <hr>

            <h5>Verification Documents</h5>
            <div class="row">
                <div class="col-md-6">
                    <p><span class="info-label">Business License:</span></p>
                    @if($provider->profile->business_license)
                        <a href="{{ asset($provider->profile->business_license) }}" target="_blank" class="btn btn-sm btn-outline-primary">View</a>
                    @else
                        <span class="text-muted">Not Uploaded</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <p><span class="info-label">Government Document:</span></p>
                    @if($provider->profile->government_doc)
                        <a href="{{ asset($provider->profile->government_doc) }}" target="_blank" class="btn btn-sm btn-outline-primary">View</a>
                    @else
                        <span class="text-muted">Not Uploaded</span>
                    @endif
                </div>
            </div>

{{--            <div class="mt-4">--}}
{{--                <a href="" class="btn btn-primary">--}}
{{--                    <i class="feather-message-circle"></i> Chat with {{ $provider->profile->first_name }}--}}
{{--                </a>--}}
{{--                <a href="" class="btn btn-outline-secondary">--}}
{{--                    <i class="feather-help-circle"></i> Create Support Ticket--}}
{{--                </a>--}}
{{--            </div>--}}
        </div>
    </div>
@endsection
