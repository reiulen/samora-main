@extends('layout.default')
@push('custom-style')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
@endpush
@section('content')
    <div class="row mb-4">
        <div class="col-12 col-xl-12 stretch-card">
            <h3>Corporate Communication</h3>
        </div>
    </div>

    <!--Create modal-->
    <div class="modal fade " id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Store New File</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('corporate-communication.store') }}" method="POST" id="addAward"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group mb-3">
                            <label for="">Jenis File</label>
                           <select name="type" id="type" class="form-select" aria-label="Default select example">
                               <option selected>-- Pilih --</option>
                                @foreach($type as $t)
                                    <option value="{{ $t }}">{{ $t }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">File</label>
                            <input type="file" class="form-control mb-3" id="file" name="file">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="addAward">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!--End Create Modal-->

    <!--Update modal-->
    <div class="modal fade " id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update File</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('gallery.store') }}" method="POST" id="updateHeadline"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @method('PATCH')
                        <div class="form-group mb-3">
                            <label for="">Jenis File</label>
                           <select name="type_edit" id="type_edit" class="form-select" aria-label="Default select example">
                               <option selected>-- Pilih --</option>
                                @foreach($type as $t)
                                    <option value="{{ $t }}">{{ $t }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Title</label>
                            <input type="text" class="form-control" id="title_edit" name="title_edit" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">File</label>
                            <input type="file" class="form-control mb-3" id="file_edit" name="file_edit">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="updateHeadline">Save</button>
                </div>
            </div>
        </div>
    </div>
    <!--End Update Modal-->

    @if (Session::has('message'))
        <div class="alert {{ Session::get('alert-class') }} alert-dismissible fade show" role="alert">
            {{ Session::get('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h6 class="card-title">Corporate Communication Data</h6>
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#createModal">
                            Create
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table id="dataTableExample" class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>File Name</th>
                                    <th>Jenis File</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td class="text-capitalize">{{ $item->type }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('D, d-M-Y') }}</td>
                                        <td>
                                            <form
                                                action="{{ route('corporate-communication.destroy', ['corporate_communication' => $item->id]) }}"
                                                method="POST">
                                                @method('DELETE')
                                                {{ csrf_field() }}
                                                <button type="button" class="btn btn-info btn-sm btn-edit"
                                                    data-id="{{ $item->id }}" data-bs-toggle="modal"
                                                    data-bs-target="#updateModal">
                                                    Edit
                                                </button>
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('custom-script')
        <script src="{{ asset('assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
        <script src="{{ asset('assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
        <script src="{{ asset('assets/js/data-table.js') }}"></script>
        <script>
            $(document).ready(function() {
                var csrf = '{{ csrf_token() }}'

                $('.btn-edit').on('click', function() {
                    var itemId = $(this).data('id');
                    var url =
                        "{{ route('corporate-communication.show', ['corporate_communication' => ':id']) }}";
                    var actionUrl =
                        "{{ route('corporate-communication.update', ['corporate_communication' => ':corporate_communication']) }}"
                    url = url.replace(':id', itemId)
                    actionUrl = actionUrl.replace(":corporate_communication", itemId)

                    $("#updateHeadline").attr('action', actionUrl)
                    $.ajax({
                        type: "GET",
                        url: url,
                        success: function(response) {
                            $("#title_edit").val(response.title)
                            $("#type_edit").val(response.type)
                        }
                    });
                })
            });
        </script>
    @endpush
@stop
