@extends('admin.partials.master')
@push('styles')
@endpush

@section('main-content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 p-4">
                        <h3 class="pb-2">Package Detail</h3>
                        <div class="card p-4">

                            <form>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Package Name</label>
                                        <input type="text" class="form-control" value="{{ $package->name }}" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Price ($)</label>
                                        <input type="text" class="form-control" value="${{ number_format($package->price, 2) }}" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Billing Cycle</label>
                                        <input type="text" class="form-control" value="{{ ucfirst($package->billing_cycle) }}" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Connects (Credits)</label>
                                        <input type="text" class="form-control" value="{{ $package->connects ?? '-' }}" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Featured</label>
                                        <input type="text" class="form-control" value="{{ $package->is_featured ? 'Yes' : 'No' }}" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Status</label>
                                        <input type="text" class="form-control" value="{{ $package->is_active ? 'Active' : 'Inactive' }}" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" rows="3" readonly>{{ $package->description }}</textarea>
                                </div>

                                <!-- Features Section -->
                                <div class="form-group">
                                    <label>Features</label>
                                    @php
                                        $features = is_array($package->features) ? $package->features : json_decode($package->features, true);
                                    @endphp
                                    @if(!empty($features))
                                        <ul class="list-group">
                                            @foreach($features as $feature)
                                                <li class="list-group-item">{{ $feature }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p class="text-muted">No features added</p>
                                    @endif
                                </div>

                                <div class="card-footer">
                                    <a href="{{ route('admin.manage.package') }}" class="btn btn-dark"><- Back To List</a>
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
@endpush
