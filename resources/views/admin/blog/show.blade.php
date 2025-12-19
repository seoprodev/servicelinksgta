@extends('admin.partials.master')
@push('styles')
@endpush

@section('main-content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 p-4">
                        <h3 class="pb-2">Blog Detail</h3>
                        <div class="card p-4">

                            <form>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Title</label>
                                        <input type="text" class="form-control" value="{{ $blog->title }}" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Status</label>
                                        <input type="text" class="form-control"
                                               value="{{ $blog->status ? 'Published' : 'Draft' }}" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Featured Image</label><br>
                                    @if($blog->image)
                                        <img src="{{ asset($blog->image) }}"
                                             alt="Blog Image" class="img-fluid rounded" style="max-width: 300px;">
                                    @else
                                        <p class="text-muted">No image uploaded</p>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Content</label>
                                    <div class="border p-3" style="background: #f9f9f9;">
                                        {!! $blog->content !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Created At</label>
                                    <input type="text" class="form-control"
                                           value="{{ $blog->created_at->format('Y-m-d H:i A') }}" readonly>
                                </div>

                                <div class="card-footer">
                                    <a href="{{ route('admin.manage.blog') }}" class="btn btn-dark">
                                        <- Back To List
                                    </a>
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
