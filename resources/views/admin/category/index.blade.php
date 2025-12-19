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
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Category Management</h4>
                        <a href="{{ route('admin.create.category') }}" class="btn btn-primary p-2 rounded-0 ms-auto">Create Category</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table-1">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Parent</th>
                                <th>Slug</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($categories as $key => $category)
                                {{-- Parent Category --}}
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><strong>{{ $category->name }}</strong></td>
                                    <td><span class="badge badge-primary">Category</span></td>
                                    <td>-</td>
                                    <td>{{ $category->slug }}</td>
                                    <td>{{ $category->description ?? '-' }}</td>
                                    <td>
                                    <span class="badge {{ $category->is_active ? 'badge-success' : 'badge-danger' }}">
                                        {{ $category->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                    </td>
                                    <td>{{ $category->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        <a href="{{ route('admin.show.category', ['type' => 'category', 'id' => $category->faker_id]) }}" class="btn btn-info btn-sm">Detail</a>
                                        <a href="{{ route('admin.edit.category', ['type' => 'category', 'id' => $category->faker_id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('admin.delete.category', ['type' => 'category', 'id' => $category->faker_id]) }}" method="POST" class="d-inline">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>

                                {{-- Subcategories of this category --}}
                                @foreach($category->subcategories as $subKey => $subcategory)
                                    <tr>
                                        <td>{{ $key + 1 }}.{{ $subKey + 1 }}</td>
                                        <td>&mdash; {{ $subcategory->name }}</td>
                                        <td><span class="badge badge-secondary">Subcategory</span></td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $subcategory->slug }}</td>
                                        <td>{{ $subcategory->description ?? '-' }}</td>
                                        <td>
                                            <span class="badge {{ $subcategory->is_active ? 'badge-success' : 'badge-danger' }}">
                                                {{ $subcategory->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>{{ $subcategory->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            <a href="{{ route('admin.show.category', ['type' => 'subcategory', 'id' => $subcategory->faker_id]) }}" class="btn btn-info btn-sm">Detail</a>
                                            <a href="{{ route('admin.edit.category', ['type' => 'subcategory', 'id' => $subcategory->faker_id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                            <form action="{{ route('admin.delete.category', ['type' => 'subcategory', 'id' => $subcategory->faker_id]) }}" method="POST" class="d-inline">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            @empty
                                <tr><td colspan="9" class="text-center">No categories found</td></tr>
                            @endforelse
                            </tbody>
                        </table>
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
    <script src="{{ asset('admin-assets/js/page/datatables.js') }}"></script>
@endpush
