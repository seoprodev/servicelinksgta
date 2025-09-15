@extends('admin.partials.master')
@push('styles')
@endpush
@section('main-content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 p-4">
                        <h3 class="pb-2">Create Category / SubCategory</h3>
                        <div class="card p-2">

                            <form method="post" action="{{ route('admin.store.category') }}">
                                @csrf
                                <div class="card-body">

                                    <!-- Select Type -->
                                    <div class="form-group">
                                        <label for="type">Type <span class="text-danger">*</span></label>
                                        <select id="type" name="type" class="form-control" required>
                                            <option value="">-- Select Type --</option>
                                            <option value="category">Category</option>
                                            <option value="subcategory">SubCategory</option>
                                        </select>
                                    </div>

                                    <!-- Parent Category (Only for SubCategory) -->
                                    <div class="form-group d-none" id="parent-category-wrapper">
                                        <label for="parent_id">Select Parent Category</label>
                                        <select name="parent_id" id="parent_id" class="form-control">
                                            <option value="">-- Choose Category --</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Lead Price (Only for Category) -->
                                    <div class="form-group d-none" id="lead-price-wrapper">
                                        <label for="lead_price">Lead Price ($)</label>
                                        <input type="number" step="0.01" name="lead_price" id="lead_price"
                                               class="form-control" placeholder="Enter lead price" value="{{ old('lead_price') }}">
                                    </div>

                                    <!-- Name -->
                                    <div class="form-group">
                                        <label for="name">Name <span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control" id="name"
                                               placeholder="Enter name" required value="{{ old('name') }}">
                                    </div>

                                    <!-- Description -->
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" class="form-control" id="description" rows="3"
                                                  placeholder="Short description...">{{ old('description') }}</textarea>
                                    </div>

                                    <!-- Status -->
                                    <div class="form-group">
                                        <label for="is_active">Status <span class="text-danger">*</span></label>
                                        <select name="is_active" id="is_active" class="form-control" required>
                                            <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="card-footer">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                    <a href="{{ route('admin.manage.category') }}" class="btn btn-dark">Cancel</a>
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
    <script>
        $(document).ready(function () {
            $('#type').on('change', function () {
                let selected = $(this).val();

                if (selected === 'subcategory') {
                    $('#parent-category-wrapper').removeClass('d-none');
                    $('#lead-price-wrapper').addClass('d-none'); // hide lead price
                } else if (selected === 'category') {
                    $('#lead-price-wrapper').removeClass('d-none'); // show lead price
                    $('#parent-category-wrapper').addClass('d-none'); // hide parent select
                } else {
                    $('#parent-category-wrapper').addClass('d-none');
                    $('#lead-price-wrapper').addClass('d-none');
                }
            });
        });
    </script>
@endpush
