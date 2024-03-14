@extends('layouts.dashboardLayout')
@section('title', 'Build A Projetc Form Data')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Manage Build A Projetc Form Data</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-md-12">
                <x-data-table-card card_title="Build A Projetc Form Data">
                     
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
                "autoWidth": false,
                "scrollX": true,
                scrollY: 300,
                columnDefs: [{ width: 200, targets: 1 }],
                fixedColumns: true,
                scrollCollapse: true,
                ajax: {
                    url: "{{ route('buildAprojectDataTable') }}",
                    type: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}'
                    }
                },
                "order": [
                    [0, 'desc']
                ],  
                columns: [
                    {
                        data: 'id',
                        name: 'id',
                        title:'Id'
                    },
                    {
                        data: 'name',
                        name: 'name',
                        title:'Name'
                    },
                    {
                        data: 'company',
                        name: 'company',
                        title:'Company'
                    },
                    {
                        data: 'email',
                        name: 'email',
                        title:'Email'
                    },
                    {
                        data: 'phone_number',
                        name: 'phone_number',
                        title:'Phone Number'
                    },
                    {
                        data: 'description',
                        name: 'description',
                        title:'Description'
                    },
                    {
                        data: 'options',
                        name: 'selected_options',
                        title:'Selected Options',
                        width:"500 px"
                    },
                    {
                        data: 'ip',
                        name: 'ip',
                        title:'IP'
                    },
                    {
                        data: 'created_at_format',
                        name: 'created_at',
                        title:'Created At'
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
