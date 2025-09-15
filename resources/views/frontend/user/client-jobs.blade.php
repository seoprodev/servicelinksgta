@extends('frontend.user.partials.master')

@push('styles')
@endpush

@section('title', 'My Jobs')

@section('user-main-content')
    <div class="col-xl-9 col-lg-8">
        <div class="d-flex align-items-center justify-content-between flex-wrap row-gap-3 mb-4">
            <h4>My Jobs</h4>
        </div>
        <div class="row">
        @forelse($userJobs as $job)
            <div class="col-12">
                    <div class="card p-0 border-left">
                        <div class="card-body p-0">
                            <div class="img-sec w-100">
                                <a href="" class="serv_img">

                                </a>
                                <div class="image-tag d-flex justify-content-end align-items-center">
                                    {{-- koi badge waghera yahan aa sakta hai --}}
                                </div>
                            </div>

                            <div class="p-3">
                                <h5 class="mb-2">
                                    <a href="">
                                        {{ $job->title ?? 'Untitled Job' }}
                                    </a>
                                </h5>
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="fs-14 mb-0">
                                        <i class="ti ti-tool me-2"></i>
                                        {{ $job->category->name ?? 'N/A' }} &nbsp;&nbsp;&nbsp;

                                        <i class="ti ti-map-pin me-2"></i>
                                        {{ $job->city }}, {{ $job->country }} &nbsp;&nbsp;&nbsp;

                                        <i class="ti ti-clock me-2"></i>
                                        {{ $job->created_at->diffForHumans() }}
                                    </p>

                                    <a href="{{ route('user.job.detail', \App\Helpers\FakerURL::id_e($job->id)) }}" class="btn bg-primary">View Detail</a>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>
        @empty
            <p>No Jobs Found!</p>
        @endforelse
        </div>
    </div>
@endsection

@push('scripts')
@endpush
