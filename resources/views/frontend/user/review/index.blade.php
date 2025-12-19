@extends('frontend.user.partials.master')

@section('title', 'My Reviews')

@push('styles')
    <link href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@endpush

@section('user-main-content')
    <div class="col-xl-9 col-lg-8">
        <div class="d-flex align-items-center mb-4">
            <h4 class="mb-0">My Reviews</h4>
            <a href="{{ route('client.review.create') }}" class="btn btn-primary ms-auto">
                Write a New Review
            </a>
        </div>

        <div id="review-data">
            <table class="table table-bordered reviews-table">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Provider</th>
                    <th>Title</th>
                    <th>Rating</th>
                    <th>Message</th>
                    <th>Attachments</th>
                    <th>Created At</th>
                </tr>
                </thead>
                <tbody>
                @foreach($reviews as $index => $review)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $review->provider->name ?? 'N/A' }}</td>
                        <td>{{ $review->title }}</td>
                        <td>{{ $review->rating }}/5</td>
                        <td>{{ Str::limit($review->message, 50) }}</td>
                        <td>
                            @if(!empty($review->attachments))
                                @php
                                    $attachments = is_string($review->attachments) ? json_decode($review->attachments, true) : $review->attachments;
                                @endphp

                                @if(!empty($attachments))
                                    @foreach($attachments as $file)
                                        <a href="{{ asset($file) }}" target="_blank" class="btn btn-sm btn-outline-primary mb-1">View</a>
                                    @endforeach
                                @endif
                            @endif

                        </td>
                        <td>{{ $review->created_at->format('d M, Y') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
            $('.reviews-table').DataTable({
                pageLength: 10,
                lengthMenu: [5, 10, 25, 50, 100],
                ordering: true,
                searching: true,
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search reviews..."
                }
            });
        });
    </script>
@endpush
