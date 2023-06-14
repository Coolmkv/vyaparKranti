@extends('layouts.dashboardLayout')
@section('title', 'Manage Categories Items')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Manage Library Category Items</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Add Library Category Items</h5>
                        {{-- <small class="text-muted float-end">Default label</small> --}}
                    </div>
                    <div class="alert-success card-body">
                        <x-form enctype="multipart/form-data" action="javascript:">
                            <input type="hidden" name="id" id="id" value="">
                            <input type="hidden" name="action" id="action" value="insert">
                            <div class="row">
                                <x-select title="Library Category" name="library_category_id" id="library_category_id"
                                    required>
                                    @if (!empty($categories))
                                        <option value="">Select Option</option>
                                        @foreach ($categories as $item)
                                            <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                                        @endforeach
                                    @endif
                                </x-select>
                                <x-input-group-element title="Item Title" placeholder="Item Title" id="item_title_id"
                                    name="item_title"></x-input-group-element>

                                <x-input-group-element title="Item Image" type="file" accept="image/*"
                                    placeholder="Item Image" id="item_image_id" name="item_image" required>
                                </x-input-group-element>

                                <x-text-area-group-element title="Item Details" id="item_details" name="item_details"
                                    placeholder="Item Details"></x-text-area-group-element>
                            </div>
                        </x-form>
                    </div>
                </div>
                <x-data-table-card card_title="Library Data">
                    <th>Action</th>
                    <th>Library Category</th>
                    <th>Item Title</th>
                    <th>Item Image</th>
                    <th>Item Details</th>
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
                    url: "{{ route('categoryItemDetailsDataTable') }}",
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
                        data: 'library_category.category_name',
                        name: '{{ \App\Models\CategoryItems::LIBRARY_CATEGORY_ID }}'
                    },
                    {
                        data: '{{ \App\Models\CategoryItems::ITEM_TITLE }}',
                        name: '{{ \App\Models\CategoryItems::ITEM_TITLE }}'
                    },
                    {
                        data: 'iconImage',
                        name: '{{ \App\Models\CategoryItems::ITEM_IMAGE }}',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: '{{ \App\Models\CategoryItems::ITEM_DETAILS }}',
                        name: '{{ \App\Models\CategoryItems::ITEM_DETAILS }}'
                    }

                ]
            });

        });
        $(document).on("click", ".edit", function() {
            let row = $.parseJSON(atob($(this).data("row")));
            if (row['id']) {
                $("#id").val(row['id']);
                $("#category_name_id").val(row['category_name']);
                $("#category_details").val(row['category_details']);
                $("#action").val("update");
                $("#item_image_id").attr("required", false);

            }
        });
        $(document).ready(function() {
            $("#submitForm").on("submit", function() {
                var form = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: '{{ route('addLibraryCategoriesItems') }}',
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
                            url: '{{ route('addLibraryCategoriesItems') }}',
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
                            url: '{{ route('addLibraryCategoriesItems') }}',
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
