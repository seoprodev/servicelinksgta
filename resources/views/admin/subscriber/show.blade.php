@extends('admin.partials.master')
@push('styles')
@endpush

@section('main-content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 p-4">
                        <h3 class="pb-2">Contact Detail</h3>
                        <div class="card p-4">

                            <form>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Name</label>
                                        <input type="text" class="form-control" value="{{ $contact->name }}" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Email</label>
                                        <input type="text" class="form-control" value="{{ $contact->email }}" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" value="{{ $contact->phone_number ?? '-' }}" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Status</label>
                                        <input type="text" class="form-control"
                                               value="{{ $contact->is_view ? 'Seen' : 'New' }}" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea class="form-control" rows="4" readonly>{{ $contact->message }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label>Received At</label>
                                    <input type="text" class="form-control" value="{{ $contact->created_at->format('Y-m-d H:i') }}" readonly>
                                </div>

                                <div class="card-footer">
                                    <a href="{{ route('admin.contact.index') }}" class="btn btn-dark"><- Back To List</a>
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
