@extends('admin.partials.master')

@push('styles')
    <link rel="stylesheet" href="{{ asset('admin-assets/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin-assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endpush

@section('main-content')
    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Pay-Per-Lead Purchases</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Provider</th>
                                            <th>Job Title</th>
                                            <th>Purchase Price</th>
                                            <th>Payment ID</th>
                                            <th>Payment Status</th>
                                            <th>Lead Status</th>
                                            <th>Purchased At</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($payLeads as $key => $lead)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>
                                                    {{ $lead->provider->name ?? 'N/A' }}<br>
                                                    <small class="text-muted">{{ $lead->provider->email ?? '' }}</small>
                                                </td>
                                                <td>
                                                    {{ $lead->job->title ?? 'N/A' }}<br>
                                                    <small class="text-muted">Job ID: {{ $lead->job->faker_id }}</small>
                                                </td>
                                                <td>${{ $lead->purchase_price }}</td>
                                                <td>
                                                    @if($lead->stripe_payment_intent_id)
                                                        <span title="{{ $lead->stripe_payment_intent_id }}">
                                                                {{ Str::limit($lead->stripe_payment_intent_id, 20, '...') }}
                                                            </span>
                                                    @else
                                                        <span class="text-muted">N/A</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <span class="badge badge-{{ $lead->payment_status == 'paid' ? 'success' : 'danger' }}">
                                                        {{ ucfirst($lead->payment_status) }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-{{ $lead->lead_status == 'pending' ? 'warning' : 'success' }}">
                                                        {{ ucfirst($lead->lead_status) }}
                                                    </span>
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($lead->purchase_at)->format('Y-m-d H:i') }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="10" class="text-center text-muted">
                                                    No pay-per-lead records found.
                                                </td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('admin-assets/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('admin-assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/page/datatables.js') }}"></script>
@endpush
