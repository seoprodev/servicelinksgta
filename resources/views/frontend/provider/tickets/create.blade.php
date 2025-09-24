@extends('frontend.provider.partials.master')

@push('styles')
@endpush

@section('title', 'Create Ticket')

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

    <div class="col-xl-9 col-lg-8">
        <h4 class="mb-1">Create New Support Ticket</h4>

        <form method="post" enctype="multipart/form-data" action="{{ route('provider.store.ticket') }}">
            @csrf
            <h6>Please fill in the details below to submit your support request.</h6>
            <div class="row mt-4">

                {{-- Subject --}}
                <div class="col-md-12 mt-3">
                    <label class="form-label">Ticket Subject <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="subject" required>
                </div>

                {{-- Priority --}}
                <div class="col-md-12 mt-3">
                    <label class="form-label">Priority <span class="text-danger">*</span></label>
                    <select class="form-control" name="priority" required>
                        <option value="">-- Select Priority --</option>
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                    </select>
                </div>

                {{-- Message --}}
                <div class="col-md-12 mt-3">
                    <label class="form-label">Message <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="message" rows="6" required></textarea>
                </div>

                {{-- Attachments --}}
                <div class="col-md-12 mt-3">
                    <label class="form-label">Attachments (Optional)</label>
                    <input type="file" class="form-control" name="attachments[]" multiple>
                </div>
            </div>

            <div class="text-end mt-3">
                <button type="submit" class="btn btn-dark">Submit Ticket</button>
            </div>
        </form>
    </div>
    </div>
@endsection
