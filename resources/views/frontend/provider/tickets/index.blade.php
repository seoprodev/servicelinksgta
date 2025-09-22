@extends('frontend.provider.partials.master')

@section('title', 'My Tickets')
@push('styles')
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endpush
@section('provider-dashboard-content')
    <div class="col-xl-10 col-lg-8">
        <div class="breadcrumb-bar text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <h2 class="breadcrumb-title mb-2">Dashboard</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center mb-0">
                                <li class="breadcrumb-item"><a
                                            href="https://servicelinksgta.globalhostpros.com/user/dashboard"><i
                                                class="ti ti-home-2"></i></a></li>
                                <li class="breadcrumb-item">Provider</li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="breadcrumb-bg">
                    <img src="{{ asset('frontend-assets/img/bg/breadcrumb-bg-01.png') }}" class="breadcrumb-bg-1"
                         alt="Img">
                    <img src="{{ asset('frontend-assets/img/bg/breadcrumb-bg-02.png') }}" class="breadcrumb-bg-2"
                         alt="Img">
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="d-flex align-items-center mb-4">
                <h4 class="mb-0">My Support Tickets</h4>
                <a href="{{ route('provider.create.ticket') }}" class="btn btn-primary ms-auto">
                    Create New Ticket
                </a>
            </div>

            {{-- Ticket List (AJAX content will load here) --}}
            <div id="ticket-data">
                @include('frontend.provider.tickets.table', ['tickets' => $tickets])
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
            $('.tickets-table').DataTable({
                pageLength: 10, // default rows per page
                lengthMenu: [5, 10, 25, 50, 100],
                ordering: true,
                searching: true,
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search tickets..."
                }
            });
        });
    </script>
@endpush
