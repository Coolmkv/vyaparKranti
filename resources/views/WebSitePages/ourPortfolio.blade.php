@extends('layout.app_layout')
@section('title', 'Library')
@section('bodyClass', 'inner_page')
@section('content')

    <!-- Start Banner -->
    <div class="section inner_page_header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="full">
                        <h3>Library</h3>
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
                                <h2><span class="theme_color">CHOOSE </span>What are you looking for</h2>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row margin-top_30">
                @if (!empty($categories))
                    @foreach ($categories as $item)
                        <div class="col-md-4" onclick="gotTo('{{ route('libraryCategory',['id'=>$item->{App\Models\LibraryCategories::ID}] ) }}')">
                            <div class="service_blog">
                                <div class="service_icons">
                                    <img width="75" height="75" src="{{ $item->{App\Models\LibraryCategories::CATEGORY_ICON} }}" alt="#">
                                </div>
                                <div class="full">
                                    <h4>{{ $item->{App\Models\LibraryCategories::CATEGORY_NAME} }}</h4>
                                </div>
                                <div class="full">
                                   <p>{{ $item->{App\Models\LibraryCategories::CATEGORY_DETAILS} }}</p>
                                </div>
                            </div>
                        </div>            
                    @endforeach
                @endif
                 
            </div>
        </div>
    </div>
    <!-- end section -->


@endsection

@section('pageScript')
    <script type="text/javascript">
        function gotTo(link){
            window.location = link;
        }
    </script>
@endsection
