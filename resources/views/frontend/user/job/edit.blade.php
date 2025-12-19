@extends('frontend.user.partials.master')

@push('styles')
@endpush

@section('title', 'Edit Job')

@section('user-main-content')

    <div class="col-xl-9 col-lg-8">
        <h4 class="mb-1">Edit Job</h4>

        <form method="post" enctype="multipart/form-data" action="{{ route('user.job.update', $job->faker_id) }}">
            @csrf
            @method('PATCH')

            <h6>Update your job details below.</h6>

            <div class="row mt-4">
                {{-- Title --}}
                <div class="col-md-12 mt-3">
                    <label class="form-label">Job Title <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="title" required
                           value="{{ old('title', $job->title) }}">
                </div>

                {{-- Category --}}
                <div class="col-md-6 mt-3">
                    <label class="form-label">Select Job Category <span class="text-danger">*</span></label>
                    <select class="form-control" name="category_id" id="categorySelect" required>
                        <option value="">-- Select Category --</option>
                        @foreach($jobCategories as $category)
                            <option value="{{ $category->id }}"
                                    {{ old('category_id', $job->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Subcategory --}}
                <div class="col-md-6 mt-3" id="subcategoryWrapper" style="{{ $job->sub_category_id ? '' : 'display:none;' }}">
                    <label class="form-label">Select a specific service</label>
                    <select class="form-control" name="sub_category_id" id="subcategorySelect">
                        <option value="">-- Select Subcategory --</option>
                        @if($subcategories)
                            @foreach($subcategories as $sub)
                                <option value="{{ $sub->id }}"
                                        {{ old('sub_category_id', $job->sub_category_id) == $sub->id ? 'selected' : '' }}>
                                    {{ $sub->name }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                </div>

                {{-- Property Type --}}
                <div class="col-md-6 mt-3">
                    <label class="form-label">Property Type <span class="text-danger">*</span></label>
                    <select class="form-control" name="property_type" required>
                        <option value="">-- Select Property Type --</option>
                        @foreach($propertyType as $property)
                            <option value="{{ $property->name }}"
                                    {{ old('property_type', $job->property_type) == $property->name ? 'selected' : '' }}>
                                {{ $property->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Priority --}}
                <div class="col-md-6 mt-3">
                    <label class="form-label">When would you like to have the job done?</label>
                    <select class="form-control" name="priority">
                        <option value="">-- Select Time --</option>
                        @foreach($priority as $item)
                            <option value="{{ $item->name }}"
                                    {{ old('priority', $job->priority) == $item->name ? 'selected' : '' }}>
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Postal Code --}}
                <div class="col-md-6 mt-3">
                    <label class="form-label">Postal Code <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="postal_code" required
                           value="{{ old('postal_code', $job->postal_code) }}">
                </div>
                {{-- Budget --}}
                <div class="col-md-6 mt-3">
                    <label class="form-label">Estimated Budget (in USD) <span class="text-danger">*</span></label>
                    <div class="input-group">
                        <span class="input-group-text">$</span>
                        <input type="number" class="form-control" name="budget" required value="{{ old('postal_code', $job->budget) }}" step="0.01" min="0">
                    </div>
                </div>
                {{-- Status --}}
                <div class="col-md-6 mt-3">
                    <label class="form-label">Job Status <span class="text-danger">*</span></label>
                    <select class="form-control" name="status" required>
                        <option value="">-- Select Status --</option>
                        <option value="pending" {{ old('status', $job->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="active" {{ old('status', $job->status) == 'active' ? 'selected' : '' }}>Active</option>
                        <option value="completed" {{ old('status', $job->status) == 'completed' ? 'selected' : '' }}>Hired</option>
                        <option value="cancelled" {{ old('status', $job->status) == 'cancelled' ? 'selected' : '' }}>Do Not Call</option>
                    </select>
                </div>


                {{-- Existing Photos --}}
                @if(!empty($job->job_files))
                    <div class="col-md-12 mt-3">
                        <label class="form-label">Existing Attachments</label>
                        <div class="d-flex flex-wrap gap-3">
                            @foreach($job->job_files as $file)
                                <a href="{{ asset($file) }}" target="_blank">
                                    <img src="{{ asset($file) }}"
                                         class="img-fluid rounded shadow-sm border"
                                         style="width:120px; height:80px; object-fit:cover;">
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                {{-- Upload New Photos --}}
                <div class="col-md-12 mt-3">
                    <label class="form-label">Upload New Photos (Optional)</label>
                    <input type="file" class="form-control" name="job_file[]" multiple>
                </div>

                {{-- Description --}}
                <div class="col-md-12 mt-3">
                    <label class="form-label">Job Description</label>
                    <textarea class="form-control" name="description" rows="5">{{ old('description', $job->description) }}</textarea>
                </div>
            </div>

            <div class="text-end mt-3">
                <button type="submit" class="btn btn-dark">Update Job</button>
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
