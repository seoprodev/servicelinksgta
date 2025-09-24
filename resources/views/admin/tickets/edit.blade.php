@extends('admin.partials.master')

@push('styles')
@endpush

@section('main-content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12 p-4">
                        <h3 class="pb-2">Edit Ticket</h3>
                        <div class="card p-4">

                            <form method="post" action="{{ route('admin.update.ticket', $ticket->faker_id) }}">
                                @csrf
                                @method('PATCH')

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Subject</label>
                                        <input type="text" name="subject" class="form-control" value="{{ old('subject', $ticket->subject) }}" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Priority</label>
                                        <select name="priority" class="form-control" required>
                                            <option value="low" {{ $ticket->priority == 'low' ? 'selected' : '' }}>Low</option>
                                            <option value="medium" {{ $ticket->priority == 'medium' ? 'selected' : '' }}>Medium</option>
                                            <option value="high" {{ $ticket->priority == 'high' ? 'selected' : '' }}>High</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Status</label>
                                        <select name="status" class="form-control" required>
                                            <option value="open" {{ $ticket->status == 'open' ? 'selected' : '' }}>Open</option>
                                            <option value="pending" {{ $ticket->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                            <option value="complete" {{ $ticket->status == 'complete' ? 'selected' : '' }}>Complete</option>
                                            <option value="hold" {{ $ticket->status == 'hold' ? 'selected' : '' }}>Hold</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>User</label>
                                        <input type="text" class="form-control" value="{{ $ticket->user->name ?? 'N/A' }}" disabled>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Message</label>
                                    <textarea name="message" class="form-control" rows="4">{{ old('message', $ticket->message) }}</textarea>
                                </div>

{{--                                <div class="form-group">--}}
{{--                                    <label>Attachments</label>--}}
{{--                                    <input type="text" name="attachments" class="form-control" value="{{ old('attachments', is_array($ticket->attachments) ? implode(',', $ticket->attachments) : $ticket->attachments) }}" placeholder="Comma separated file names">--}}
{{--                                    <small class="text-muted">Enter comma separated filenames for attachments (if any)</small>--}}
{{--                                </div>--}}

                                <div class="card-footer mt-3">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('admin.manage.ticket') }}" class="btn btn-dark">Cancel</a>
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
