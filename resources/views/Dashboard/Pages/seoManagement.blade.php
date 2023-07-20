@extends('layouts.dashboardLayout')
@section('title', 'SEO Management')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Manage SEO Details</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Add SEO Details</h5>
                        {{-- <small class="text-muted float-end">Default label</small> --}}
                    </div>
                    <div class="alert-success card-body">
                        <x-form enctype="multipart/form-data" action="javascript:">
                            <input type="hidden" name="id" id="id" value="">
                            <input type="hidden" name="action" id="action" value="insert">
                            <div class="row">
                                <x-select title="Select Page" name="model_id" id="model_id"
                                    required>
                                    @if (!empty($pages))
                                        <option value="">Select Option</option>
                                        @foreach ($pages as $item)
                                            <option value="{{ $item->id }}">{{ $item->route_name }}</option>
                                        @endforeach
                                    @endif
                                </x-select>
                                <x-input-group-element title="Description" placeholder="Description" id="description_id" name="description"></x-input-group-element>

                                <x-input-group-element title="Title" placeholder="title" id="title_id" name="title"></x-input-group-element>


                                <x-input-group-element title="Image" type="file" accept="image/*" placeholder="Image" id="image_id" name="image" >
                                </x-input-group-element>
                                
                                <x-input-group-element title="Author" placeholder="Author" id="author_id" name="author"></x-input-group-element>

                                <x-input-group-element title="Robots" placeholder="Robots" id="robots_id" name="robots"></x-input-group-element>

                            </div>
                        </x-form>
                    </div>
                </div>
                <x-data-table-card card_title="SEO Data">
                     
                </x-data-table-card>
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
                    url: "{{ route('seoDataTable') }}",
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
                        searchable: false,
                        title:'Action'
                    },

                    {
                        data: 'id',
                        name: 'id',
                        title:'Id'
                    },
                    {
                        data: 'route_name',
                        name: 'Page',
                        title:'Page'
                    },
                    {
                        data: 'seoImage',
                        name: 'seo_data.seoImage',
                        orderable: false,
                        searchable: false,
                        title:'SEO Image'
                    },
                    {
                        data: 'seo_data.description',
                        name: 'seo_data.description',
                        title:'Description'
                    },
                    {
                        data: 'seo_data.title',
                        name: 'seo_data.title',
                        title:'Title'
                    },
                    {
                        data: 'seo_data.author',
                        name: 'seo_data.author',
                        title:'Author'
                    },
                    {
                        data: 'seo_data.robots',
                        name: 'seo_data.robots',
                        title:'Robots'
                    }

                ]
            });

        });
        $(document).on("click", ".edit", function() {
            let row = $.parseJSON(atob($(this).data("row")));
            if (row['id']) {
                $("#id").val(row['id']);
                $("#model_id").val(row['seo_data']['model_id']);
                $("#description_id").val(row['seo_data']['description']);
                $("#title_id").val(row['seo_data']['title']);
                $("#author_id").val(row['seo_data']['author']);
                $("#robots_id").val(row['seo_data']['robots']);
                $("#action").val("update");
                scrollToDiv("layout-navbar");
            }else{
                errorMessage("Invalid data");
            }
        });
        $(document).ready(function() {
            $("#submitForm").on("submit", function() {
                var form = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: '{{ route('addSEODetails') }}',
                    data: form,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.status) {
                            successMessage(response.message);
                            table.ajax.reload()
                            $("#id").val('');
                            $("#action").val("insert");
                            $("#item_image_id").attr("required", true);
                            $("#submitForm")[0].reset();
                        } else {
                            errorMessage(response.message);
                        }
                    },
                    error: function(response) {

                        errorMessage(response.responseJSON.message);
                    },
                    failure: function(response) {
                        errorMessage(response.message);
                    }
                });
            });
        });

        function enableItem(id) {
            if (id) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "This item will be visible in view!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, enable it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'POST',
                            url: '{{ route('addSEODetails') }}',
                            data: {
                                id: id,
                                action: "enable",
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

        function deleteItem(id) {
            if (id) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "This item will be removed from view!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, disable it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'POST',
                            url: '{{ route('addSEODetails') }}',
                            data: {
                                id: id,
                                action: "disable",
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
