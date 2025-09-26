@extends('frontend.user.partials.master')

@push('styles')
@endpush

@section('title', 'Post New Job')

@section('user-main-content')

    <div class="col-xl-9 col-lg-8">
        <h4 class="mb-1">Post New Job</h4>

        <form method="post" enctype="multipart/form-data" action="{{ route('user.job.store') }}">
            @csrf
            {{-- General Info --}}
            <h6>Describe your job and get in touch with pros near you.</h6>
            <div class="row mt-4">
                {{-- Title --}}
                <div class="col-md-12 mt-3">
                    <label class="form-label">Job Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="title" required value="{{ old('title') }}">
                </div>

                {{-- Category --}}
                <div class="col-md-6 mt-3">
                    <label class="form-label">Select Job Category <span class="text-danger">*</span></label>
                    <select class="form-control" name="category_id" id="categorySelect" required>
                        <option value="">-- Select Category --</option>
                        @foreach($jobCategories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Subcategory (hidden by default) --}}
                <div class="col-md-6 mt-3" id="subcategoryWrapper" style="{{ old('sub_category_id') ? '' : 'display: none;' }}">
                    <label class="form-label">Select a specific service</label>
                    <select class="form-control" name="sub_category_id" id="subcategorySelect">
                        <option value="">-- Select Subcategory --</option>
                        {{-- Agar subcategories AJAX se load ho rahi hain to JS mai old value ko set karna hoga --}}
                    </select>
                </div>

                {{-- Property Type --}}
                <div class="col-md-6 mt-3">
                    <label class="form-label">What type of property does your job involve? <span class="text-danger">*</span></label>
                    <select class="form-control" name="property_type" required>
                        <option value="">-- Select Property Type --</option>
                        @foreach($propertyType as $property)
                            <option value="{{ $property->name }}" {{ old('property_type') == $property->name ? 'selected' : '' }}>
                                {{ $property->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Priority / Job Time --}}
                <div class="col-md-6 mt-3">
                    <label class="form-label">When would you like to have the job done? (Optional)</label>
                    <select class="form-control" name="priority">
                        <option value="">-- Select Time --</option>
                        @foreach($priority as $item)
                            <option value="{{ $item->name }}" {{ old('priority') == $item->name ? 'selected' : '' }}>
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Postal Code --}}
                <div class="col-md-12 mt-3">
                    <label class="form-label">Postal code for the job <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="postal_code" required value="{{ old('postal_code') }}">
                </div>

                {{-- Photos --}}
                <div class="col-md-12 mt-3">
                    <label class="form-label">Would you like to add any photos or plans? (Optional)</label>
                    <input type="file" class="form-control" name="job_file[]" multiple>
                    {{-- File input mai old() kaam nahi karega, kyunki security ki wajah se browser previous file remember nahi karta --}}
                </div>

                {{-- Description --}}
                <div class="col-md-12 mt-3">
                    <label class="form-label">Job Description</label>
                    <textarea class="form-control" name="description" rows="5">{{ old('description') }}</textarea>
                </div>
            </div>

            <div class="text-end mt-3">
                <button type="submit" class="btn btn-dark">Post Job</button>
            </div>
        </form>

    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#categorySelect').on('change', function() {
                let categoryId = $(this).val();

                if (categoryId) {
                    $.ajax({
                        url: "{{ route('get.subcategories', '') }}/" + categoryId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            if (data.length > 0) {
                                $('#subcategoryWrapper').show();
                                $('#subcategorySelect').empty();
                                $('#subcategorySelect').append('<option value="">-- Select Subcategory --</option>');
                                $.each(data, function(key, value) {
                                    $('#subcategorySelect').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                                });
                            } else {
                                $('#subcategoryWrapper').hide();
                                $('#subcategorySelect').empty();
                            }
                        }
                    });
                } else {
                    $('#subcategoryWrapper').hide();
                    $('#subcategorySelect').empty();
                }
            });
        });
    </script>
@endpush
