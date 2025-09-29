@extends('frontend.user.partials.master')

@push('styles')
@endpush

@section('title', 'Create Review')

@section('user-main-content')

    <div class="col-xl-9 col-lg-8">
        <h4 class="mb-1">Write a Review</h4>

        <form method="post" enctype="multipart/form-data" action="{{ route('client.review.store') }}">
            @csrf
            <h6>Please share your experience by filling in the details below.</h6>
            <div class="row mt-4">

                {{-- Select Provider --}}
                <div class="col-md-12 mt-3">
                    <label class="form-label">Select Provider <span class="text-danger">*</span></label>
                    <select class="form-control" name="provider_id" required>
                        <option value="">-- Select Provider --</option>
                        @foreach($providers as $provider)
                            <option value="{{ $provider->id }}">{{ $provider->name }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Rating --}}
                <div class="col-md-12 mt-3">
                    <label class="form-label">Rating <span class="text-danger">*</span></label>
                    <select class="form-control" name="rating" required>
                        <option value="">-- Select Rating --</option>
                        <option value="5">⭐⭐⭐⭐⭐ - Excellent</option>
                        <option value="4">⭐⭐⭐⭐ - Good</option>
                        <option value="3">⭐⭐⭐ - Average</option>
                        <option value="2">⭐⭐ - Poor</option>
                        <option value="1">⭐ - Very Bad</option>
                    </select>
                </div>

                {{-- Review Title --}}
                <div class="col-md-12 mt-3">
                    <label class="form-label">Review Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="title" placeholder="E.g. Great service and fast delivery" required>
                </div>

                {{-- Review Message --}}
                <div class="col-md-12 mt-3">
                    <label class="form-label">Your Review <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="message" rows="6" required></textarea>
                </div>

                {{-- Attachments --}}
                <div class="col-md-12 mt-3">
                    <label class="form-label">Attachments (Optional)</label>
                    <input type="file" class="form-control" name="attachments[]" multiple>
                </div>
            </div>

            <div class="text-end mt-3">
                <button type="submit" class="btn btn-dark">Submit Review</button>
            </div>
        </form>
    </div>
@endsection
