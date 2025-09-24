@extends('admin.partials.master')

@push('styles')
    <link rel="stylesheet" href="{{ asset('admin-assets/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endpush

@section('main-content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-header">
                                <div class="d-flex justify-content-between w-100">
                                    <div><h4>Blog Management</h4></div>
                                    <div>
                                        <a href="{{ route('admin.create.blog') }}" class="btn btn-primary p-2 rounded-0 ms-auto">
                                            Create New Blog
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($blogs as $key => $blog)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $blog->title }}</td>
                                                <td>
                                                    @if($blog->image)
                                                        <img src="{{ asset($blog->image) }}" alt="blog-image" width="80">
                                                    @else
                                                        <span class="text-muted">No Image</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($blog->is_active)
                                                        <div class="badge badge-success">Published</div>
                                                    @else
                                                        <div class="badge badge-secondary">Draft</div>
                                                    @endif
                                                </td>
                                                <td>{{ $blog->created_at->format('Y-m-d') }}</td>
                                                <td>
                                                    <a href="{{ route('admin.edit.blog', $blog->faker_id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                    <a href="{{ route('admin.show.blog', $blog->faker_id) }}" class="btn btn-info btn-sm">Detail</a>
                                                    <a href="{{ route('admin.delete.blog', $blog->faker_id) }}" class="btn btn-danger btn-sm"
                                                       onclick="return confirm('Are you sure you want to delete this blog?')">
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">No blogs found</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('admin-assets/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('admin-assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin-assets/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('admin-assets/js/page/datatables.js') }}"></script>
@endpush
