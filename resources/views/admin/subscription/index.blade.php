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
                                <h4>User Subscriptions</h4>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>User</th>
                                            <th>Package</th>
                                            <th>Price</th>
                                            <th>Currency</th>
                                            <th>Status</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Remaining Connects</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($subscriptions as $key => $sub)
                                            <tr>
                                                <td class="text-center">{{ $key + 1 }}</td>
                                                <td>{{ $sub->user->name ?? 'N/A' }}</td>
                                                <td>{{ $sub->package->name ?? 'N/A' }}</td>
                                                <td>{{ $sub->price }}</td>
                                                <td>{{ $sub->currency }}</td>
                                                <td>
                                                    <span class="badge badge-{{ $sub->subscription_status == 'active' ? 'success' : 'danger' }}">
                                                        {{ ucfirst($sub->subscription_status) }}
                                                    </span>
                                                </td>
                                                <td>{{ $sub->start_date?->format('Y-m-d') ?? 'N/A' }}</td>
                                                <td>{{ $sub->end_date?->format('Y-m-d') ?? 'N/A' }}</td>
                                                <td>{{ $sub->remaining_connects }}</td>

                                            </tr>
                                        @empty
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
    <script src="{{ asset('admin-assets/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('admin-assets/js/page/datatables.js') }}"></script>
@endpush
