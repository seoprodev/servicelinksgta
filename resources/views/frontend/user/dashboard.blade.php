@extends('frontend.user.partials.master')

@section('title', 'Client Dashboard')

@section('user-main-content')
    <div class="col-xl-9 col-lg-8">
        <div class="dashboard-header mb-4">
            <h4 class="mb-2">Welcome Back, {{ $user->profile->first_name ?? $user->name }} 👋</h4>
            <p class="text-muted">Here’s a quick snapshot of your activity</p>
        </div>

        <!-- Quick Stats -->
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body text-center">
                        <i class="ti ti-world fs-30 text-primary mb-3"></i>
                        <h5 class="fw-bold mb-1">{{ $totalJobs }}</h5>
                        <p class="mb-0 text-muted">Jobs Posted</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body text-center">
                        <i class="ti ti-calendar-time fs-30 text-warning mb-3"></i>
                        <h5 class="fw-bold mb-1">{{ $activeJobs }}</h5>
                        <p class="mb-0 text-muted">Active Jobs</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body text-center">
                        <i class="ti ti-check fs-30 text-success mb-3"></i>
                        <h5 class="fw-bold mb-1">{{ $completedJobs }}</h5>
                        <p class="mb-0 text-muted">Completed Jobs</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Jobs -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h6 class="mb-0 fw-bold">Recent Jobs</h6>
                <a href="{{ route('client.jobs') }}" class="text-primary small">View All</a>
            </div>
            <div class="card-body p-0">
                @if($recentJobs->count() > 0)
                    <ul class="list-group list-group-flush">
                        @foreach($recentJobs as $job)
                            <li class="list-group-item d-flex justify-content-between">
                                <span>{{ $job->title }}</span>
                                <span class="badge
                                    @if($job->status == 'completed') bg-success
                                    @elseif($job->status == 'active') bg-warning text-dark
                                    @else bg-secondary @endif">
                                    {{ ucfirst($job->status) }}
                                </span>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="p-3 mb-0 text-muted">No jobs posted yet.</p>
                @endif
            </div>
        </div>

        <!-- Quick Links -->
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body text-center">
                        <i class="ti ti-plus fs-30 text-info mb-2"></i>
                        <h6 class="fw-bold">Post a Job</h6>
                        <p class="text-muted small">Create a new job request and connect with providers</p>
                        <a href="{{ route('client.create.job') }}" class="btn btn-outline-info btn-sm">Post Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body text-center">
                        <i class="ti ti-message-circle fs-30 text-purple mb-2"></i>
                        <h6 class="fw-bold">Chat with Providers</h6>
                        <p class="text-muted small">Stay in touch with service providers directly</p>
                        <a href="{{ route('chat.index') }}" class="btn btn-outline-purple btn-sm">Go to Chat</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
