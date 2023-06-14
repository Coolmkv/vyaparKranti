@extends('layouts.dashboardLayout')
@section('title', 'News Letter Subscribers')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Manage News Letter Subscribers</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-md-12">
                <x-data-table-card card_title="News Letter Data">
                    <th >Action</th>
                    <th>Email Id</th>
                    <th>Subscription Status</th>
                    <th>Verification Status</th>
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
                    url: "{{ route('newsLetterDetailsDataTable') }}",
                    type: 'POST',
                    data: {
                        '_token': '{{ csrf_token() }}'
                    }
                },
                "scrollX": true,
                "order": [
                    [1, 'desc']
                ],
                columns: [
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                    
                    {
                        data: '{{ \App\Models\NewsLetter::EMAIL_ID }}',
                        name: '{{ \App\Models\NewsLetter::EMAIL_ID }}'
                    },
                    {
                        data: '{{ \App\Models\NewsLetter::SUBSCRIPTION_STATUS }}',
                        name: '{{ \App\Models\NewsLetter::SUBSCRIPTION_STATUS }}'
                    },
                    {
                        data: '{{ \App\Models\NewsLetter::VERIFICATION_STATUS }}',
                        name: '{{ \App\Models\NewsLetter::VERIFICATION_STATUS }}'
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
                $("#item_image_id").attr("required",false);

            }
        });
        $(document).ready(function() {
            $("#submitForm").on("submit", function() {
                var form = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: '{{ route("addLibraryCategoriesItems") }}',
                    data: form,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        successMessage(response.message);
                        table.ajax.reload();
                        $("#id").val('');
                        $("#action").val("insert");
                        $("#item_image_id").attr("required",true);
                        $("#submitForm")[0].reset();
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

        function enableItem(id){
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
                            url: '{{ route("addLibraryCategoriesItems") }}',
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
                            url: '{{ route("addLibraryCategoriesItems") }}',
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
