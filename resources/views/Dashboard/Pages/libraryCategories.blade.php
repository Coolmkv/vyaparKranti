@extends('layouts.dashboardLayout')
@section('title', 'Manage Categories')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Manage Library Categories</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Add Library Categories</h5>
                        {{-- <small class="text-muted float-end">Default label</small> --}}
                    </div>
                    <div class="alert-success card-body">
                        <x-form enctype="multipart/form-data" action="javascript:" >
                            <input type="hidden" name="action" id="action" value="insert">
                            <div class="row">
                                <x-input-group-element title="Category Name" placeholder="Category Name" id="category_name_id" name="category_name"  required></x-input-group-element>
                                
                                <x-input-group-element title="Category Icon" type="file" accept="image/*" placeholder="Category Name" id="category_icon_id" name="category_icon"  required></x-input-group-element>
                                
                                <x-text-area-group-element title="Category Details" id="category_details" name="category_details" required></x-text-area-group-element>
                            </div>
                        </x-form>                         
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
            $("#submitForm").on("submit", function() {
                var form = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: '{{ route("addLibraryCategories") }}',
                    data: form,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        alert(response.message);
                        table.ajax.reload();
                        $("#id").val('');
                        $("#action").val("insert");
                        $("#submitForm")[0].reset();
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
