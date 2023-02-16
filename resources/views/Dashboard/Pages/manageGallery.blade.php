@extends('layouts.dashboardLayout')
@section('title', 'Manage Gallery')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Manage Gallery</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Add Gallery Items</h5>
                        {{-- <small class="text-muted float-end">Default label</small> --}}
                    </div>
                    <div class="alert-success card-body">
                        <form method="POST" enctype="multipart/form-data" action="javascript:" id="galleryItems">
                            @csrf
                            <input type="hidden" name="id" id="id" value="">
                            <input type="hidden" name="action" id="action" value="insert">
                            <div class="row">
                                <div class="col-md-4 col-sm-12 mb-3">
                                    <label class="form-label" for="local_image">Upload Images</label>
                                    <input type="file" name="local_image[]" class="form-control" id="local_image"
                                        placeholder="Images" accept="image/*" multiple>
                                </div>
                                <div class="col-md-4 col-sm-12 mb-3">
                                    <label class="form-label" for="image_link">Image Link</label>
                                    <input type="url" name="image_link" class="form-control" id="image_link"
                                        placeholder="Image Link">
                                </div>
                                <div class="col-md-4 col-sm-12 mb-3">
                                    <label class="form-label" for="alternate_text">Alternate Text</label>
                                    <input type="text" name="alternate_text" class="form-control" id="alternate_text"
                                        placeholder="Alernate Text For Image">
                                </div>
                                <div class="col-md-4 col-sm-12 mb-3">
                                    <label class="form-label" for="local_video">Upload Video</label>
                                    <input type="file" name="local_video" class="form-control" id="local_video"
                                        placeholder="Video" >
                                </div>
                                <div class="col-md-4 col-sm-12 mb-3">
                                    <label class="form-label" for="video_link">Video Link</label>
                                    <input type="url" name="video_link" class="form-control" id="video_link"
                                        placeholder="Video Link">
                                </div>
                                <div class="col-md-4 col-sm-12 mb-3">
                                    <label class="form-label" for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="Gallery Item Title">
                                </div>
                                <div class="col-md-4 col-sm-12 mb-3">
                                    <label class="form-label" for="description">Description</label>
                                    <textarea class="form-control" id="description" name="description" placeholder="Gallery Item Description"></textarea>
                                </div>
                                <div class="col-md-4 col-sm-12 mb-3">
                                    <label class="form-label" for="position">Position</label>
                                    <input type="number" class="form-control" id="position" name="position"
                                        placeholder="Position">
                                </div>
                                <div class="col-md-4 col-sm-12 mb-3">
                                    <label class="form-label" for="view_status">View Status</label>
                                    <select class="form-control" name="view_status" id="view_status">
                                        <option value="visible">Visibile</option>
                                        <option value="hidden">Hidden</option>
                                    </select>
                                </div>
                                <div class="col-md-12 col-sm-12 mb-3 text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                </div>
                            </div>



                        </form>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Gallery Data</h5>
                    </div>
                    <div class="alert-info card-body">
                        <table class="table table-bordered data-table table-responsive">
                            <thead>
                                <tr>
                                    <th width="100px">Action</th>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Alternate Text</th>
                                    <th>Image Local</th>
                                    <th>Image Link</th>
                                    <th>Video Local</th>
                                    <th>Video Link</th>
                                    <th>Position</th>
                                    <th>View Status</th>

                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        let site_url = '{{ url('/') }}';
        var table = "";
        $(function() {

            table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('addGalleryDataTable') }}",
                    type: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}'
                    }
                },
                "scrollX": true,
                "order": [
                    [1, 'desc']
                ],
                columns: [{
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: '{{ \App\Models\GalleryItem::ID }}',
                        name: '{{ \App\Models\GalleryItem::ID }}'
                    },
                    {
                        data: '{{ \App\Models\GalleryItem::TITLE }}',
                        name: '{{ \App\Models\GalleryItem::TITLE }}'
                    },
                    {
                        data: '{{ \App\Models\GalleryItem::DESCRIPTION }}',
                        name: '{{ \App\Models\GalleryItem::DESCRIPTION }}'
                    },
                    {
                        data: '{{ \App\Models\GalleryItem::ALTERNATE_TEXT }}',
                        name: '{{ \App\Models\GalleryItem::ALTERNATE_TEXT }}'
                    },
                    {
                        data: '{{ \App\Models\GalleryItem::LOCAL_IMAGE }}',
                        render: function(data, type) {
                            let image = '';
                            if (data) {
                                image += '<img alt="Stored Image" src="' + site_url + data +
                                    '" class="img-thumbnail">';
                            }
                            return image;
                        },
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: '{{ \App\Models\GalleryItem::LOCAL_IMAGE }}',
                        render: function(data, type) {

                            let image = '';
                            if (data) {
                                image += '<img alt="Image Link" src="' + data +
                                    '" class="img-thumbnail">';
                            }
                            return image;
                        },
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: '{{ \App\Models\GalleryItem::LOCAL_VIDEO }}',
                        render: function(data, type) {
                            let video = '';
                            if (data) {
                                video += '<video width="100" height="100" controls><source src="' +
                                    site_url + data + '" type="video/mp4">' +
                                    'Your browser does not support the video tag.</video>';
                            }
                            return video;
                        },
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: '{{ \App\Models\GalleryItem::VIDEO_LINK }}',
                        render: function(data, type) {
                            let video = '';
                            if (data) {
                                video += '<video width="100" height="100" controls><source src="' +
                                    data + '" type="video/mp4">' +
                                    'Your browser does not support the video tag.</video>';
                            }
                            return video;
                        },
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: '{{ \App\Models\GalleryItem::POSITION }}',
                        name: '{{ \App\Models\GalleryItem::POSITION }}'
                    },
                    {
                        data: '{{ \App\Models\GalleryItem::VIEW_STATUS }}',
                        name: '{{ \App\Models\GalleryItem::VIEW_STATUS }}'
                    },

                ]
            });

        });
        $(document).on("click", ".edit", function() {
            let row = $.parseJSON(atob($(this).data("row")));
            if (row['id']) {
                $("#id").val(row['id']);
                $("#image_link").val(row['image_link']);
                $("#alternate_text").val(row['alternate_text']);
                $("#video_link").val(row['video_link']);
                $("#title").val(row['title']);
                $("#description").val(row['description']);
                $("#position").val(row['position']);
                $("#view_status").val(row['view_status']);
                $("#action").val("update");

            }
        });
        $(document).ready(function() {
            $("#galleryItems").on("submit", function() {
                var form = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: '{{ route('addGalleryItems') }}',
                    data: form,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        alert(response.message);
                        table.ajax.reload();
                        $("#id").val('');
                        $("#action").val("insert");
                        $("#galleryItems")[0].reset();
                    },
                    failure: function(response) {
                        alert(response.message);
                    }
                });
            });
        });

        function deleteGallery(id) {
            if (id) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "This item will be removed!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'POST',
                            url: '{{ route('addGalleryItems') }}',
                            data: {
                                id: id,
                                action: "delete",
                                '_token': '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                if (response.status) {
                                    successMessage(response.message);
                                    table.ajax.reload()
                                } else {
                                    errorMessage(response.message);
                                }
                            },
                            failure: function(response) {
                                errorMessage(response.message);
                            }
                        });
                    }
                });

            } else {
                errorMessage("Something went wrong. Code 102");
            }
        }
    </script>
    @include('Dashboard.include.dataTablesScript')
@endsection
