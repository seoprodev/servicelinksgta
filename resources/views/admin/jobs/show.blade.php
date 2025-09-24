@extends('admin.partials.master')
@push('styles')
@endpush

@section('main-content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 p-4">
                        <h3 class="pb-2">Job Detail</h3>
                        <div class="card p-4">

                            <form>
                                {{-- User & Title --}}
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>User</label>
                                        <input type="text" class="form-control" value="{{ $job->user->name ?? '-' }}" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Job Title</label>
                                        <input type="text" class="form-control" value="{{ $job->title }}" readonly>
                                    </div>
                                </div>

                                {{-- Category & Subcategory --}}
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Category</label>
                                        <input type="text" class="form-control" value="{{ $job->category->name ?? '-' }}" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Subcategory</label>
                                        <input type="text" class="form-control" value="{{ $job->subcategory->name ?? '-' }}" readonly>
                                    </div>
                                </div>

                                {{-- Property Type & Priority --}}
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Property Type</label>
                                        <input type="text" class="form-control" value="{{ $job->property_type ?? '-' }}" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Priority</label>
                                        <input type="text" class="form-control" value="{{ $job->priority ?? '-' }}" readonly>
                                    </div>
                                </div>

                                {{-- Postal Code, City, Country --}}
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Postal Code</label>
                                        <input type="text" class="form-control" value="{{ $job->postal_code ?? '-' }}" readonly>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>City</label>
                                        <input type="text" class="form-control" value="{{ $job->city ?? '-' }}" readonly>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Country</label>
                                        <input type="text" class="form-control" value="{{ $job->country ?? '-' }}" readonly>
                                    </div>
                                </div>

                                {{-- Description --}}
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="4" readonly>{{ $job->description }}</textarea>
                                </div>

                                {{-- Job Files --}}
                                <div class="form-group">
                                    <label>Uploaded Files</label>
                                    @if(!empty($job->job_files))
                                        <ul class="list-group">
                                            @foreach($job->job_files as $file)
                                                <li class="list-group-item">
                                                    <a href="{{ asset($file) }}" target="_blank">{{ basename($file) }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p class="text-muted">No files uploaded</p>
                                    @endif
                                </div>

                                {{-- Status & Active --}}
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Status</label>
                                        <input type="text" class="form-control" value="{{ ucfirst($job->status ?? '-') }}" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Active</label>
                                        <input type="text" class="form-control" value="{{ $job->is_active ? 'Yes' : 'No' }}" readonly>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <a href="{{ route('admin.manage.job') }}" class="btn btn-dark"><- Back To List</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush
