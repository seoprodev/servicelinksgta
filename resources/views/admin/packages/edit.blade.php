@extends('admin.partials.master')
@push('styles')
@endpush

@section('main-content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 p-4">
                        <h3 class="pb-2">Edit Package</h3>
                        <div class="card p-4">

                            <form method="post" action="{{ route('admin.update.package', $package->faker_id) }}">
                                @csrf
                                @method('PATCH')
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Package Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ old('name', $package->name) }}" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Price ($)</label>
                                        <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $package->price) }}" required>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Billing Cycle</label>
                                        <select name="billing_cycle" class="form-control">
                                            <option value="monthly" {{ $package->billing_cycle == 'monthly' ? 'selected' : '' }}>Monthly</option>
                                            <option value="quarterly" {{ $package->billing_cycle == 'quarterly' ? 'selected' : '' }}>Quarterly</option>
                                            <option value="yearly" {{ $package->billing_cycle == 'yearly' ? 'selected' : '' }}>Yearly</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Connects (Credits)</label>
                                        <input type="number" name="connects" class="form-control" value="{{ old('connects', $package->connects) }}">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Featured</label>
                                        <select name="is_featured" class="form-control">
                                            <option value="0" {{ $package->is_featured == 0 ? 'selected' : '' }}>No</option>
                                            <option value="1" {{ $package->is_featured == 1 ? 'selected' : '' }}>Yes</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Status</label>
                                        <select name="is_active" class="form-control">
                                            <option value="1" {{ $package->is_active == 1 ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ $package->is_active == 0 ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" rows="3">{{ old('description', $package->description) }}</textarea>
                                </div>

                                <!-- Features Section -->
                                <div class="form-group">
                                    <label>Features</label>
                                    <div id="features-wrapper">
                                        @php
                                            $features = is_array($package->features) ? $package->features : json_decode($package->features, true);
                                        @endphp
                                        @if(!empty($features))
                                            @foreach($features as $feature)
                                                <div class="d-flex mb-2 feature-item">
                                                    <input type="text" name="features[]" class="form-control" value="{{ $feature }}" />
                                                    <button type="button" class="btn btn-danger btn-sm ms-2 remove-feature">Remove</button>
                                                </div>
                                            @endforeach
                                        @else
                                            <div class="d-flex mb-2 feature-item">
                                                <input type="text" name="features[]" class="form-control" placeholder="Enter feature" />
                                                <button type="button" class="btn btn-danger btn-sm ms-2 remove-feature">Remove</button>
                                            </div>
                                        @endif
                                    </div>
                                    <button type="button" id="add-feature" class="btn btn-success btn-sm mt-2">+ Add More</button>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('admin.manage.package') }}" class="btn btn-dark">Cancel</a>
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
            $("#add-feature").click(function () {
                let featureHtml = `
                <div class="d-flex mb-2 feature-item">
                    <input type="text" name="features[]" class="form-control" placeholder="Enter feature" />
                    <button type="button" class="btn btn-danger btn-sm ms-2 remove-feature">Remove</button>
                </div>`;
                $("#features-wrapper").append(featureHtml);
            });

            $(document).on("click", ".remove-feature", function () {
                $(this).closest(".feature-item").remove();
            });
        });
    </script>
@endpush
