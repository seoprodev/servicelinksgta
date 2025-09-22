@extends('frontend.user.partials.master')

@section('title', 'My Tickets')
@push('styles')
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endpush
@section('user-main-content')
    <div class="col-xl-9 col-lg-8">
        <div class="d-flex align-items-center mb-4">
            <h4 class="mb-0">My Support Tickets</h4>
            <a href="{{ route('user.create.ticket') }}" class="btn btn-primary ms-auto">
                Create New Ticket
            </a>
        </div>
        <div id="ticket-data">
            @include('frontend.user.tickets.table', ['tickets' => $tickets])
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
            $('.tickets-table').DataTable({
                pageLength: 10,
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
