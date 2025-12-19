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
                                    <div><h4>Job Priority Management</h4></div>
                                    <div>
                                        <button class="btn btn-primary p-2 rounded-0 ms-auto" data-toggle="modal" data-target="#createModal">
                                            Create New
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body">
                                <div id="alert-area"></div>
                                <div class="table-responsive">
                                    <table class="table table-striped" id="priorityTable">
                                        <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Priority Name</th>
                                            <th>Status</th>
                                            <th>Created At</th>
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
            <form id="createForm">@csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Add Priority</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Priority Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status" required>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
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
            <form id="editForm">@csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5>Edit Priority</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="edit_id">
                        <div class="form-group">
                            <label>Priority Name</label>
                            <input type="text" class="form-control" name="name" id="edit_name" required>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status" id="edit_status" required>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
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
    <script src="{{ asset('admin-assets/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function () {
            // Init DataTable
            let table = $('#priorityTable').DataTable({
                ajax: "{{ route('admin.priority.data') }}",
                columns: [
                    { data: 'index', name: 'index' },
                    { data: 'name', name: 'name' },
                    {
                        data: 'status',
                        render: function(data){
                            return data === 'Active'
                                ? '<span class="badge badge-success">Active</span>'
                                : '<span class="badge badge-danger">Inactive</span>';
                        }
                    },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });

            // Create
            $('#createForm').on('submit', function(e){
                e.preventDefault();
                let form = $(this);
                let btn = form.find('button[type=submit]');
                btn.addClass('btn-loading').prop('disabled', true);

                {{--$.post("{{ route('admin.priority.store') }}", form.serialize(), function(res){--}}
                {{--    $('#createModal').modal('hide');--}}
                {{--    table.ajax.reload();--}}
                {{--    showAlert('success', res.message);--}}
                {{--    form[0].reset();--}}
                {{--}).fail(()=> showAlert('danger','Something went wrong.'));--}}


                $.ajax({
                    url: "{{ route('admin.priority.store') }}",
                    method: "POST",
                    data: form.serialize(),
                    success: function(res){
                        $('#createModal').modal('hide');
                        table.ajax.reload();
                        alertify.success(res.message);
                    },
                    error: function(err){
                        alertify.error('Something went wrong.');
                    },
                    complete: function(){
                        btn.removeClass('btn-loading').prop('disabled', false);
                        form[0].reset();
                    }
                });
            });

            // Edit Modal Open
            $(document).on('click','.btn-edit', function(){
                $('#edit_id').val($(this).data('id'));
                $('#edit_name').val($(this).data('name'));
                $('#edit_status').val($(this).data('status'));
                $('#editModal').modal('show');
            });

            // Update
            $('#editForm').on('submit', function(e){
                e.preventDefault();

                let form = $(this);
                let btn = form.find('button[type=submit]');
                let id = $('#edit_id').val();
                btn.addClass('btn-loading').prop('disabled', true);

                $.ajax({
                    url: "/admin/job-priority-update/" + id,
                    method: "POST",
                    data: form.serialize(),
                    success: function(res){
                        $('#editModal').modal('hide');
                        table.ajax.reload();
                        alertify.success(res.message);
                    },
                    error: function(err){
                        alertify.error('Update failed.');
                    },
                    complete: function(){
                        btn.removeClass('btn-loading').prop('disabled', false);
                    }
                });


                // $.post("/admin/job-priority-update/"+id, $(this).serialize(), function(res){
                //     $('#editModal').modal('hide');
                //     table.ajax.reload();
                //     showAlert('success', res.message);
                // }).fail(()=> showAlert('danger','Update failed.'));
            });

            // Delete
            $(document).on('click', '.btn-delete', function(e){
                e.preventDefault();
                let url = $(this).attr('href');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
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
                                Swal.fire(
                                    'Deleted!',
                                    res.message,
                                    'success'
                                )
                            },
                            error: function(){
                                Swal.fire(
                                    'Error!',
                                    'Something went wrong.',
                                    'error'
                                )
                            }
                        });
                    }
                });
            });


            {{--$(document).on('click','.btn-delete', function(e){--}}
            {{--    e.preventDefault();--}}
            {{--    if(!confirm('Are you sure?')) return;--}}
            {{--    $.ajax({--}}
            {{--        url: $(this).attr('href'),--}}
            {{--        method: 'DELETE',--}}
            {{--        data: {_token: "{{ csrf_token() }}"},--}}
            {{--        success: function(res){--}}
            {{--            table.ajax.reload();--}}
            {{--            showAlert('success', res.message);--}}
            {{--        },--}}
            {{--        error: ()=> showAlert('danger','Error deleting record.')--}}
            {{--    });--}}
            {{--});--}}

            {{--// Alert--}}
            {{--function showAlert(type,msg){--}}
            {{--    $('#alert-area').html(`<div class="alert alert-${type}">${msg}</div>`);--}}
            {{--    setTimeout(()=>$('#alert-area').html(''),3000);--}}
            {{--}--}}
        });
    </script>
@endpush
