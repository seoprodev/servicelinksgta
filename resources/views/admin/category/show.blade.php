@extends('admin.partials.master')

@section('main-content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 p-4">
                        <h3 class="pb-2">
                            {{ isset($subcategory) ? 'Subcategory Detail' : 'Category Detail' }}
                        </h3>
                        <div class="card p-4">

                            <!-- Name -->
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control"
                                       value="{{ $subcategory->name ?? $category->name }}" disabled>
                            </div>

                            <!-- Parent Category (only for subcategory) -->
                            @if(isset($subcategory))
                                <div class="form-group">
                                    <label>Parent Category</label>
                                    <input type="text" class="form-control"
                                           value="{{ $subcategory->category->name ?? 'N/A' }}" disabled>
                                </div>
                            @endif

                        <!-- Lead Price (only for category) -->
                            @if(isset($category))
                                <div class="form-group">
                                    <label>Lead Price</label>
                                    <input type="text" class="form-control"
                                           value="{{ $category->lead_price ? '$' . number_format($category->lead_price, 2) : 'N/A' }}" disabled>
                                </div>
                        @endif

                        <!-- Description -->
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="3" disabled>
                                    {{ $subcategory->description ?? $category->description }}
                                </textarea>
                            </div>

                            <!-- Status -->
                            <div class="form-group">
                                <label>Status</label><br>
                                @if(($subcategory->is_active ?? $category->is_active) == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                            </div>

                            <div class="card-footer">
                                <a href="{{ route('admin.manage.category') }}" class="btn btn-dark"><- Back To List</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
