@extends('layout.app_layout')
@section('title', 'Library Category Name')
@section('bodyClass', 'inner_page')
@section('content')

    <!-- Start Banner -->
    <div class="section inner_page_header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="full">
                        <h3>Library Category Name</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end Banner -->


    <!-- section -->
    <div class="section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="heading_main text_align_left">
                            <div class="right">
                                <h2><span class="theme_color">Find </span>What are you looking for</h2>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row margin-top_30">
                
                <div class="col-md-4" onclick="gotTo('http://www.vyapar-kranti.local/library_category?id=1')">
                    <div class="service_blog">
                        <div class="service_icons">
                            <img width="75" height="75" src="assets/img/icon-6.png" alt="#">
                        </div>
                        <div class="full">
                            <h4>ADMINISTRATIVE SERVICES</h4>
                        </div>
                        <div class="full">
                             
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->


@endsection

@section('pageScript')
    <script>
        function gotTo(link){
            window.location = link;
        }
    </script>
@endsection
