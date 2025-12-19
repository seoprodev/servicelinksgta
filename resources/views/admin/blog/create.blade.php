@extends('admin.partials.master')
@push('styles')
    <link rel="stylesheet" href="{{ asset('admin-assets/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/bundles/summernote/summernote-bs4.css') }}">
@endpush

@section('main-content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 p-4">
                        <h3 class="pb-2">Create Blog</h3>
                        <div class="card p-2">

                            <form method="post" action="{{ route('admin.store.blog') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">

                                    <!-- Blog Details -->
                                    <h4>Blog Details</h4>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="title">Blog Title</label>
                                            <input type="text" name="title" class="form-control" id="title"
                                                   placeholder="Enter blog title" required value="{{ old('title') }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="image">Featured Image</label>
                                            <input type="file" name="image" class="form-control" id="image"
                                                   accept="image/*">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="content">Content</label>
                                        <textarea name="content" id="content-editor" class="form-control" rows="6">{{ old('content') }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1" selected>Published</option>
                                            <option value="0">Draft</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="card-footer">
                                    <button class="btn btn-primary" type="submit">Submit</button>
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
    <script src="{{ asset('admin-assets/bundles/summernote/summernote-bs4.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#content-editor').summernote({
                height: 250,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['view', ['codeview']]
                ]
            });
        });
    </script>
@endpush
