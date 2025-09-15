@extends('frontend.user.partials.master')

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
@endpush

@section('title', 'My Jobs')

@section('user-main-content')
    <div class="col-xl-9 col-lg-8">
        <h4 class="mb-4">My Jobs</h4>

        <div class="card mb-5 shadow rounded-3 border-0">
            <!-- Job Header -->
            <div class="card-header bg-gradient text-white p-4" style="background: linear-gradient(90deg, #4e73df, #224abe);">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="mb-1">{{ $userJob->title ?? 'Untitled Job' }}</h3>
                        <small class="text-primary"><i class="bi bi-clock me-1"></i> Posted {{ $userJob->created_at->diffForHumans() }}</small>
                    </div>
                    <span class="badge bg-primary px-3 py-2 ">Urgent</span>
                </div>
            </div>

            <!-- Job Body -->
            <div class="card-body p-4">
                <!-- Job Details -->
                <h5 class="mb-3 border-bottom pb-2"><i class="bi bi-briefcase me-2 text-primary"></i>Job Details</h5>
                <div class="row mb-4">
                    <div class="col-md-6 mb-2"><i class="bi bi-tools me-2 text-primary"></i> Category: <strong>{{ $userJob->category->name ?? 'N/A' }}</strong></div>
                    <div class="col-md-6 mb-2"><i class="bi bi-building me-2 text-primary"></i> Property: <strong>{{ $userJob->property_type }}</strong></div>
                    <div class="col-md-6 mb-2"><i class="bi bi-geo-alt me-2 text-primary"></i> Location: <strong>{{ $userJob->city }}, {{ $userJob->country }}</strong></div>
                    <div class="col-md-6 mb-2"><i class="bi bi-cash me-2 text-primary"></i> Budget: <strong>$200 / Fixed</strong></div>
                </div>

                <!-- Description -->
                <h5 class="mb-3 border-bottom pb-2"><i class="bi bi-file-text me-2 text-primary"></i>Description</h5>
                <p class="text-muted">
                    {{ $userJob->description }}
                </p>
                @if(!empty($userJob->job_files))
                    <h5 class="mb-3 border-bottom pb-2">
                        <i class="bi bi-paperclip me-2 text-primary"></i>Attachments
                    </h5>
                    <div class="d-flex flex-wrap gap-3">
                        @foreach($userJob->job_files as $file)
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
                    <p class="mb-2"><strong>Name:</strong>  {{ $userJob->user->name ?? 'N/A' }}</p>
                    <p class="mb-2"><strong>Email:</strong>  {{ $userJob->user->email ?? 'N/A' }}</p>
                    <p class="mb-0"><strong>Phone:</strong>  {{ $userJob->user->profile->phone ?? 'N/A' }}</p>
                </div>

                <!-- Actions -->
                <div class="text-end mt-4">
                    <button class="btn btn-lg btn-primary shadow-sm">
                        <i class="bi bi-chat-dots me-2"></i> Contact Client
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
