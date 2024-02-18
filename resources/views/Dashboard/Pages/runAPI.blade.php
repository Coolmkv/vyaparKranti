@extends('layouts.dashboardLayout')
@section('title', 'Run API')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Run API</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Run API</h5>
                        {{-- <small class="text-muted float-end">Default label</small> --}}
                    </div>
                    <div class="alert-success card-body">
                        <x-form   action="{{ route('runAPIForm') }}" method="get">
                            <div class="row">
                                 
                                <x-input-group-element title="Method" placeholder="Method" id="Method" name="method" value="post"></x-input-group-element>

                                <x-input-group-element title="header" placeholder="header" id="header" name="header" value=""></x-input-group-element>


                                <x-input-group-element title="payload" placeholder="payload" id="payload" name="payload"></x-input-group-element>
                                
                                <x-input-group-element title="url" placeholder="url" id="url" name="url" value="https://b2bapiflights.benzyinfotech.com"></x-input-group-element>

                                 

                            </div>
                        </x-form>
                    </div>
                </div> 
            </div>
        </div>
    </div>
@endsection
 