@extends('admin.partials.master')
@push('styles')
@endpush

@section('main-content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 p-4">
                        <h3 class="pb-2">Edit Job</h3>
                        <div class="card p-2">

                            <form method="post" action="{{ route('admin.update.job', $job->faker_id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="card-body">
                                    <h4>Job Details</h4>

                                    {{-- User --}}
                                    <div class="form-group col-md-12">
                                        <label for="user_id">Select User</label>
                                        <select name="user_id" id="user_id" class="form-control" required>
                                            <option value="">-- Select User --</option>
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}" {{ $job->user_id == $user->id ? 'selected' : '' }}>
                                                    {{ $user->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- Title --}}
                                    <div class="form-group">
                                        <label for="title">Job Title</label>
                                        <input type="text" name="title" class="form-control" id="title"
                                               placeholder="Job title" required value="{{ old('title', $job->title) }}">
                                    </div>

                                    {{-- Category & Subcategory --}}
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="category_id">Category</label>
                                            <select name="category_id" id="category_id" class="form-control" required>
                                                <option value="">-- Select Category --</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ $job->category_id == $category->id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6" id="sub_category_wrapper">
                                            <label for="sub_category_id">Subcategory</label>
                                            <select name="sub_category_id" id="sub_category_id" class="form-control">
                                                <option value="">-- Select Subcategory --</option>
                                                @foreach($subcategories as $subcat)
                                                    <option value="{{ $subcat->id }}" {{ $job->sub_category_id == $subcat->id ? 'selected' : '' }}>
                                                        {{ $subcat->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    {{-- Property Type --}}
                                    <div class="form-group">
                                        <label for="property_type">Property Type</label>
                                        <select name="property_type" id="property_type" class="form-control">
                                            <option value="">-- Select Property Type --</option>
                                            @foreach($propertyTypes as $propertyType)
                                                <option value="{{ $propertyType->name }}" {{ $job->property_type == $propertyType->name ? 'selected' : '' }}>
                                                    {{ $propertyType->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- Priority --}}
                                    <div class="form-group">
                                        <label for="priority">Priority</label>
                                        <select name="priority" id="priority" class="form-control">
                                            <option value="">-- Select Priority --</option>
                                            @foreach($priorities as $priority)
                                                <option value="{{ $priority->name }}" {{ $job->priority == $priority->name ? 'selected' : '' }}>
                                                    {{ $priority->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{-- Job Files --}}
                                    <div class="form-group">
                                        <label for="job_files">Upload Files</label>
                                        <input type="file" name="job_files[]" class="form-control" id="job_files" multiple>
                                        @if(!empty($job->job_files))
                                            <div class="mt-2">
                                                <strong>Existing Files:</strong>
                                                <ul>
                                                    @foreach($job->job_files as $file)
                                                        <li><a href="{{ asset($file) }}" target="_blank">{{ basename($file) }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </div>

                                    {{-- Description --}}
                                    <div class="form-group">
                                        <label for="description">Job Description</label>
                                        <textarea name="description" class="form-control" id="description" rows="4"
                                                  placeholder="Describe the job">{{ old('description', $job->description) }}</textarea>
                                    </div>

                                    {{-- Postal Code, City, Country --}}
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="postal_code">Postal Code</label>
                                            <input type="text" name="postal_code" class="form-control" id="postal_code" value="{{ old('postal_code', $job->postal_code) }}">
                                            <small id="postal_error" class="text-danger"></small>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="city">City</label>
                                            <input type="text" name="city" class="form-control" id="city" value="{{ old('city', $job->city) }}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="country">Country</label>
                                            <input type="text" name="country" class="form-control" id="country" value="{{ old('country', $job->country) }}">
                                        </div>
                                    </div>


                                </div>

                                <div class="card-footer">
                                    <button class="btn btn-primary" type="submit">Update Job</button>
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
            // Subcategory toggle
            function toggleSubcategory() {
                let categoryId = $('#category_id').val();
                let subcategoryWrapper = $('#sub_category_wrapper');

                if (!categoryId) {
                    subcategoryWrapper.hide();
                    $('#category_id').closest('.form-group').removeClass('col-md-6').addClass('col-md-12');
                    return;
                }

                $.ajax({
                    url: "{{ route('admin.get.subcategories') }}",
                    type: "GET",
                    data: { category_id: categoryId },
                    success: function (data) {
                        let dropdown = $('#sub_category_id');
                        dropdown.empty();

                        if (data.length > 0) {
                            dropdown.append('<option value="">-- Select Subcategory --</option>');
                            $.each(data, function (key, subcat) {
                                let selected = subcat.id == "{{ $job->sub_category_id }}" ? 'selected' : '';
                                dropdown.append('<option value="'+subcat.id+'" '+selected+'>'+subcat.name+'</option>');
                            });
                            subcategoryWrapper.show();
                            $('#category_id').closest('.form-group').removeClass('col-md-12').addClass('col-md-6');
                        } else {
                            subcategoryWrapper.hide();
                            $('#category_id').closest('.form-group').removeClass('col-md-6').addClass('col-md-12');
                        }
                    }
                });
            }
            toggleSubcategory();
            $('#category_id').on('change', toggleSubcategory);

            // Postal code verification
            $('#postal_code').on('blur', function () {
                let postalCode = $(this).val().trim().replace(/\s+/g, '');
                if (!postalCode) return;

                $.ajax({
                    url: "{{ route('admin.get.postal_code') }}",
                    type: "GET",
                    data: { postal_code: postalCode },
                    success: function (res) {
                        if(res.success) {
                            $('#city').val(res.city);
                            $('#country').val(res.country);
                            $('#postal_error').text('');
                        } else {
                            $('#city').val('');
                            $('#country').val('');
                            $('#postal_error').text(res.message);
                        }
                    },
                    error: function () {
                        $('#city').val('');
                        $('#country').val('');
                        $('#postal_error').text('Error verifying postal code');
                    }
                });
            });
        });
    </script>
@endpush
