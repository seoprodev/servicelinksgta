@extends('admin.partials.master')
@push('styles')
@endpush

@section('main-content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 p-4">
                        <h3 class="pb-2">Create Package</h3>
                        <div class="card p-2">

                            <form method="post" action="{{ route('admin.store.package') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <!-- Package Details -->
                                    <h4>Package Details</h4>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="name">Package Name</label>
                                            <input type="text" name="name" class="form-control" id="name" placeholder="e.g. Basic, Pro" required value="{{ old('name') }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="price">Price ($)</label>
                                            <input type="number" step="0.01" name="price" class="form-control" id="price" placeholder="e.g. 19.99" required value="{{ old('price') }}">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="billing_cycle">Billing Cycle</label>
                                            <select name="billing_cycle" id="billing_cycle" class="form-control" required>
                                                <option value="monthly">Monthly</option>
                                                <option value="yearly">Yearly</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="connects">Connects (Credits)</label>
                                            <input type="number" name="connects" class="form-control" id="connects" placeholder="e.g. 50" value="{{ old('connects') }}">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="is_featured">Featured</label>
                                            <select name="is_featured" id="is_featured" class="form-control">
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="is_active">Status</label>
                                            <select name="is_active" id="is_active" class="form-control">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" class="form-control" id="description" rows="3" placeholder="Short package description...">{{ old('description') }}</textarea>
                                    </div>

                                    <!-- Features with Add More -->
                                    <div class="form-group">
                                        <label>Features</label>
                                        <div id="features-wrapper">
                                            <div class="d-flex mb-2 feature-item">
                                                <input type="text" name="features[]" class="form-control" placeholder="Enter feature" />
                                                <button type="button" class="btn btn-danger btn-sm ms-2 remove-feature">Remove</button>
                                            </div>
                                        </div>
                                        <button type="button" id="add-feature" class="btn btn-success btn-sm mt-2">+ Add More</button>
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
    <script>
        $(document).ready(function () {
            // Add new feature input
            $('#add-feature').on('click', function () {
                let featureHtml = `
                <div class="d-flex mb-2 feature-item">
                    <input type="text" name="features[]" class="form-control" placeholder="Enter feature" />
                    <button type="button" class="btn btn-danger btn-sm ms-2 remove-feature">Remove</button>
                </div>
            `;
                $('#features-wrapper').append(featureHtml);
            });

            $(document).on('click', '.remove-feature', function () {
                $(this).closest('.feature-item').remove();
            });
        });
    </script>
@endpush
