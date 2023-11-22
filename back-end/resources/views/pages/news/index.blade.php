@extends('layout.default')
@push('custom-style')
    <link rel="stylesheet" href="{{ asset('assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
@endpush
@section('content')
    <div class="row mb-4">
        <div class="col-12 col-xl-12 stretch-card">
            <h3>News</h3>
        </div>
    </div>

    <!--Create modal-->
    <div class="modal fade " id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Create New News</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('news.store') }}" method="POST" id="addAward" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group mb-3">
                            <label for="">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Content</label>
                            <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Thumbnail</label>
                            <input type="file" class="form-control" id="thumbnail" name="thumbnail" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Publish Now</label>
                            <select name="published" id="published" class="form-select">
                                <option value="true">Publish now</option>
                                <option value="false">Save as draft</option>
                            </select>
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
                    <h5 class="modal-title" id="updateModalLabel">Update News</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('news.store') }}" method="POST" id="updateHeadline"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @method('PATCH')
                        <div class="form-group mb-3">
                            <label for="">Title</label>
                            <input type="text" class="form-control" id="title_edit" name="title_edit" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Slug</label>
                            <input type="text" class="form-control" id="slug_edit" name="slug_edit" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Content</label>
                            <textarea name="content_edit" id="content_edit" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Thumbnail</label>
                            <input type="file" class="form-control" id="thumbnail_edit" name="thumbnail_edit">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Publish Now</label>
                            <select name="published_edit" id="published_edit" class="form-select">
                            </select>
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
                        <h6 class="card-title">News Data</h6>
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
                                    <th>Thumbnail</th>
                                    <th>Slug</th>
                                    <th>Title</th>
                                    <th>Published</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td><img src="{{ url('storage/news/' . $item->thumbnail) }}" alt=""></td>
                                        <td>{{ $item->slug }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>
                                            <div class="form-check form-switch mb-2">
                                                <input type="checkbox" class="form-check-input"
                                                    data-id="{{ $item->id }}"
                                                    {{ $item->published ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('D, d-M-Y') }}</td>
                                        <td>
                                            <form action="{{ route('news.destroy', ['news' => $item->id]) }}"
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
        <script src="{{ asset('assets/vendors/tinymce/tinymce.min.js') }}"></script>
        <script src="{{ asset('assets/js/tinymce.js') }}"></script>
        <script>
            $(document).ready(function() {
                var csrf = '{{ csrf_token() }}'
                $('#title').on('keyup', function() {
                    let text = $("#title").val()
                    let makeSlug = convertToSlug($(this).val())
                    $("#slug").val(makeSlug)
                })
                $('#title_edit').on('keyup', function() {
                    let text = $("#title_edit").val()
                    let makeSlug = convertToSlug($(this).val())
                    $("#slug_edit").val(makeSlug)
                })

                function convertToSlug(Text) {
                    return Text.toLowerCase()
                        .replace(/ /g, "-")
                        .replace(/[^\w-]+/g, "");
                }

                $('.form-check-input').on('change', function() {
                    var checkbox = $(this);
                    var itemId = checkbox.data('id');
                    var published = checkbox.prop('checked');
                    var url = "{{ route('news.updateItemPublished', ['id' => ':id']) }}";
                    url = url.replace(':id', itemId)

                    $.ajax({
                        type: 'POST',
                        url: url,
                        data: {
                            _token: csrf,
                            published: published
                        },
                        success: function(response) {
                            console.log(response.message);
                        },
                        error: function(error) {
                            console.error('Gagal memperbarui is_active:', error);
                        }
                    });
                });

                $('.btn-edit').on('click', function() {
                    var itemId = $(this).data('id');
                    var url = "{{ route('news.show', ['news' => ':news']) }}";
                    var actionUrl = "{{ route('news.update', ['news' => ':news']) }}"
                    url = url.replace(':news', itemId)
                    actionUrl = actionUrl.replace(":news", itemId)

                    $("#updateHeadline").attr('action', actionUrl)
                    $.ajax({
                        type: "GET",
                        url: url,
                        success: function(response) {
                            $('#published_edit').empty();
                            $("#title_edit").val(response.title)
                            $("#slug_edit").val(response.slug)
                            tinymce.get("content_edit").setContent(response.content);
                            $('#published_edit').append($('<option>', {
                                value: "true",
                                text: 'Publish now',
                                selected: response.published === 1 ? true : false
                            }));
                            $('#published_edit').append($('<option>', {
                                value: "false",
                                text: 'Save as draft',
                                selected: response.published === 0 ? true : false
                            }));
                        }
                    });
                })
            });
        </script>
    @endpush
@stop
