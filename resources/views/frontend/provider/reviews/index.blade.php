@extends('frontend.provider.partials.master')

@section('title', 'My Reviews')
@push('styles')
    <style>
        .review-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            padding: 20px;
            margin-bottom: 20px;
            height: 100%;
        }
        .star {
            color: #ffc107;
            font-size: 14px;
        }
        .review-message {
            font-size: 14px;
            color: #555;
        }
    </style>
@endpush

@section('provider-dashboard-content')
    <div class="col-xl-12 col-lg-12">
        <div class="breadcrumb-bar text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <h2 class="breadcrumb-title mb-2">My Reviews</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center mb-0">
                                <li class="breadcrumb-item">
                                    <a href="javascript:"><i class="ti ti-home-2"></i></a>
                                </li>
                                <li class="breadcrumb-item">Provider</li>
                                <li class="breadcrumb-item active" aria-current="page">My Reviews</li>
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

        <div class="container mt-4">
            <div class="row">
                @forelse($reviews as $review)
                    <div class="col-md-4 col-sm-6 mb-4">
                        <div class="review-card">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h6 class="mb-0">{{ $review->title }}</h6>
                                <div>
                                    @for($i = 1; $i <= 5; $i++)
                                        <span class="star">{{ $i <= $review->rating ? '★' : '☆' }}</span>
                                    @endfor
                                </div>
                            </div>
                            <p class="mb-1 text-muted small">
                                By {{ $review->client->name ?? 'Unknown' }} • {{ $review->created_at->diffForHumans() }}
                            </p>
                            <p class="review-message">{{ $review->message }}</p>

                            @if(!empty($review->attachments))
                                @php
                                    $attachments = is_string($review->attachments) ? json_decode($review->attachments, true) : $review->attachments;
                                @endphp

                                @if(!empty($attachments))
                                    <div class="mb-2">
                                        @foreach($attachments as $file)
                                            <a href="{{ asset($file) }}" target="_blank" class="">
                                                <img src="{{ asset($file) }}" width="50px" height="50px">
                                            </a>
                                        @endforeach
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center text-muted">No reviews available yet.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
