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
                        <h3 class="pb-2">Edit Blog</h3>
                        <div class="card p-2">

                            <form method="post" action="{{ route('admin.update.blog', $blog->faker_id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')

                                <div class="card-body">

                                    <!-- Blog Title aur Image -->
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="title">Blog Title</label>
                                            <input type="text" name="title" class="form-control" id="title"
                                                   value="{{ old('title', $blog->title) }}" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="image">Featured Image</label>
                                            <input type="file" name="image" class="form-control" id="image" accept="image/*">
                                            @if($blog->image)
                                                <div class="mt-2">
                                                    <img src="{{ asset($blog->image) }}" alt="Blog Image"
                                                         style="width: 120px; height:auto; border:1px solid #ddd; padding:2px;">
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Blog Content -->
                                    <div class="form-group">
                                        <label for="content-editor">Content</label>
                                        <textarea name="content" id="content-editor" class="form-control" rows="6">{{ old('content', $blog->content) }}</textarea>
                                    </div>

                                    <!-- Status -->
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1" {{ old('status', $blog->is_active) == 1 ? 'selected' : '' }}>Published</option>
                                            <option value="0" {{ old('status', $blog->is_active) == 0 ? 'selected' : '' }}>Draft</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="card-footer">
                                    <button class="btn btn-primary" type="submit">Update</button>
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
                height: 300,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['view', ['fullscreen', 'codeview']]
                ]
            });
        });
    </script>
@endpush
