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
                                <div class="d-flex justify-content-between w-100">
                                    <div><h4>Countries Management</h4></div>
                                    <div>
                                        <button class="btn btn-primary p-2 rounded-0 ms-auto" data-toggle="modal" data-target="#createModal">
                                            Create New
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="countryTable">
                                        <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Postal Code</th>
                                            <th>State</th>
                                            <th>City</th>
                                            <th>Country</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Create Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form id="createForm">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Add Country</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Postal Code</label>
                            <input type="text" class="form-control" name="postal_code" required>
                        </div>
                        <div class="form-group">
                            <label>State</label>
                            <input type="text" class="form-control" name="state" required>
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" class="form-control" name="city" required>
                        </div>
                        <div class="form-group">
                            <label>Country</label>
                            <input type="text" class="form-control" name="country" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form id="editForm">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Edit Country</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="edit_id">
                        <div class="form-group">
                            <label>Postal Code</label>
                            <input type="text" class="form-control" name="postal_code" id="edit_postal_code" required>
                        </div>
                        <div class="form-group">
                            <label>State</label>
                            <input type="text" class="form-control" name="state" id="edit_state" required>
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" class="form-control" name="city" id="edit_city" required>
                        </div>
                        <div class="form-group">
                            <label>Country</label>
                            <input type="text" class="form-control" name="country" id="edit_country" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('admin-assets/bundles/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('admin-assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function () {
            let table = $('#countryTable').DataTable({
                ajax: "{{ route('admin.country.data') }}",
                columns: [
                    { data: 'index', name: 'index' },
                    { data: 'postal_code', name: 'postal_code' },
                    { data: 'state', name: 'state' },
                    { data: 'city', name: 'city' },
                    { data: 'country', name: 'country' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });

            // Create
            $('#createForm').on('submit', function(e){
                e.preventDefault();
                $.post("{{ route('admin.country.store') }}", $(this).serialize(), function(res){
                    $('#createModal').modal('hide');
                    table.ajax.reload();
                    Swal.fire('Success!', res.message, 'success');
                    $('#createForm')[0].reset();
                }).fail(() => Swal.fire('Error!', 'Something went wrong.', 'error'));
            });

            // Open Edit
            $(document).on('click', '.btn-edit', function(){
                $('#edit_id').val($(this).data('id'));
                $('#edit_postal_code').val($(this).data('postal'));
                $('#edit_state').val($(this).data('state'));
                $('#edit_city').val($(this).data('city'));
                $('#edit_country').val($(this).data('country'));
                $('#editModal').modal('show');
            });

            // Update
            $('#editForm').on('submit', function(e){
                e.preventDefault();
                let id = $('#edit_id').val();
                $.post("/admin/country-update/" + id, $(this).serialize(), function(res){
                    $('#editModal').modal('hide');
                    table.ajax.reload();
                    Swal.fire('Updated!', res.message, 'success');
                }).fail(() => Swal.fire('Error!', 'Update failed.', 'error'));
            });

            // Delete
            $(document).on('click', '.btn-delete', function(e){
                e.preventDefault();
                let url = $(this).attr('href');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "This will be deleted permanently!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: url,
                            method: "DELETE",
                            data: {_token: "{{ csrf_token() }}"},
                            success: function(res){
                                table.ajax.reload();
                                Swal.fire('Deleted!', res.message, 'success');
                            },
                            error: function(){
                                Swal.fire('Error!', 'Something went wrong.', 'error');
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
