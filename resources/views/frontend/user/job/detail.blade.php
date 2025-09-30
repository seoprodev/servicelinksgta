@extends('frontend.user.partials.master')

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
@endpush

@section('title', 'My Job Detail')

@section('user-main-content')
    <div class="col-xl-9 col-lg-8">
        <h4 class="mb-4">My Job Detail</h4>

        <div class="card mb-5 shadow rounded-3 border-0">
            <!-- Job Header -->


            <div class="card-header bg-gradient text-white p-4" style="background: linear-gradient(90deg, #4e73df, #224abe);">
                <div class="text-end">
                    <div class="dropdown d-inline-block">
                        <button class="btn btn-lg btn-secondary shadow-sm dropdown-toggle" type="button" id="jobActionsMenu" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="jobActionsMenu">
                            <li>
                                <a class="dropdown-item" href="{{ route('user.job.edit', $userJob->faker_id) }}">
                                    <i class="bi bi-pencil-square me-2"></i> Edit Job
                                </a>
                            </li>
{{--                            <li>--}}
{{--                                <a class="dropdown-item" href="#">--}}
{{--                                    <i class="bi bi-chat-dots me-2"></i> Contact Client--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <a class="dropdown-item text-danger" href="#" onclick="return confirm('Are you sure you want to delete this job?');">--}}
{{--                                    <i class="bi bi-trash me-2"></i> Delete Job--}}
{{--                                </a>--}}
{{--                            </li>--}}
                        </ul>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="badge bg-primary px-3 py-2 ">{{ $userJob->priority  }}</span>
                        <h3 class="mb-1">{{ $userJob->title ?? 'Untitled Job' }}</h3>
                        <small class="text-primary"><i class="bi bi-clock me-1"></i> Posted {{ $userJob->created_at->diffForHumans() }}</small>
                    </div>
                    @php
                        use function Symfony\Component\String\match;$status = $userJob->status ?? 'pending';
                        $badgeClass = match($status) {
                            'active' => 'bg-success',
                            'completed' => 'bg-info',
                            'cancelled' => 'bg-danger',
                            default => 'bg-secondary'
                        };
                    @endphp
                    <span class="badge {{ $badgeClass }} px-3 py-2 text-capitalize">
                    {{ $status === 'completed' ? 'Hired' : ($status === 'cancelled' ? 'Do Not Call' : ucfirst($status)) }}
                </span>
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
                    <div class="col-md-6 mb-2"><i class="bi bi-cash me-2 text-primary"></i> Budget: <strong>${{ $userJob->budget }} / Fixed</strong></div>
                </div>

                <!-- Description -->
                <h5 class="mb-3 border-bottom pb-2"><i class="bi bi-file-text me-2 text-primary"></i>Description</h5>
                <p class="text-muted">
                    {{ $userJob->description }}
                </p>
                @if(!empty($userJob->job_files))
                    <h5 class="mb-3 border-bottom pb-2">
                        <i class="bi bi-paperclip me-2 text-primary"></i> Attachments
                    </h5>
                    <div class="row g-3">
                        @foreach($userJob->job_files as $index => $file)
                            <div class="col-md-3 col-sm-4 col-6">
                                <div class="position-relative border rounded shadow-sm overflow-hidden">
                                    <a href="{{ asset($file) }}" target="_blank">
                                        <img src="{{ asset($file) }}"
                                             class="img-fluid w-100"
                                             alt="Attachment"
                                             style="height: 150px; object-fit: cover;">
                                    </a>
                                    <form action="{{ route('user.job.attachment.delete', [$userJob->id, $index]) }}"
                                          method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this attachment?');"
                                          class="position-absolute top-0 end-0 m-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger rounded-circle shadow">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
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




            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
