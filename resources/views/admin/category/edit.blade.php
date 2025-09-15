@extends('admin.partials.master')

@section('main-content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 p-4">
                        <h3 class="pb-2">
                            {{ isset($subcategory) ? 'Edit Subcategory' : 'Edit Category' }}
                        </h3>
                        <div class="card p-4">

                            <form method="POST"
                                  action="{{ route('admin.update.category', [
                                      'type' => isset($subcategory) ? 'subcategory' : 'category',
                                      'id'   => $subcategory->faker_id ?? $category->faker_id
                                  ]) }}">
                            @csrf
                            @method('PATCH')

                            <!-- Name -->
                                <div class="form-group">
                                    <label>Name <span class="text-danger">*</span></label>
                                    <input type="text"
                                           name="name"
                                           class="form-control"
                                           value="{{ old('name', $subcategory->name ?? $category->name) }}"
                                           required>
                                </div>

                                <!-- Parent Category (only for subcategory) -->
                                @if(isset($subcategory))
                                    <div class="form-group">
                                        <label>Parent Category <span class="text-danger">*</span></label>
                                        <select name="category_id" class="form-control" required>
                                            <option value="">-- Select Category --</option>
                                            @foreach($categories as $cat)
                                                <option value="{{ $cat->id }}"
                                                        {{ $subcategory->category_id == $cat->id ? 'selected' : '' }}>
                                                    {{ $cat->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endif

                            <!-- Lead Price (only for category) -->
                                @if(isset($category))
                                    <div class="form-group">
                                        <label>Lead Price ($)</label>
                                        <input type="number" step="0.01"
                                               name="lead_price"
                                               class="form-control"
                                               value="{{ old('lead_price', $category->lead_price) }}"
                                               placeholder="Enter lead price">
                                    </div>
                            @endif

                            <!-- Description -->
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea name="description"
                                              class="form-control"
                                              rows="3">{{ old('description', $subcategory->description ?? $category->description) }}</textarea>
                                </div>

                                <!-- Status -->
                                <div class="form-group">
                                    <label>Status <span class="text-danger">*</span></label>
                                    <select name="is_active" class="form-control" required>
                                        <option value="1" {{ ($subcategory->is_active ?? $category->is_active) == 1 ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ ($subcategory->is_active ?? $category->is_active) == 0 ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('admin.manage.category') }}" class="btn btn-dark">Back</a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
