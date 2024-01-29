@extends('layout.app_layout')
@section('title', $category_name??"")
@section('bodyClass', 'inner_page')
@section('content')
<style>
    /*
     * Custom Control:
     * ---------------
     */
    /* custom classes are always prefixed by "spl-" automatically */
    .spl-like{
        background-image: url(demo/gallery/heart-outline.svg);
        background-size: 23px;
    }
    /* optionally, additional state to toggle the button: */
    .spl-like.on{
        background-image: url(demo/gallery/heart.svg);
    }
    /*
     * Custom Animation:
     * -----------------
     */
    /* custom scene transition (slide effect) */
    .only-this-gallery.show .spl-scene{
        transition: transform 0.2s ease;
    }
    /* custom animation "visible state" (css context by custom classname "only-this-gallery" to apply these animation just on a specific gallery) */
    .only-this-gallery.show .spl-pane > *{
        clip-path: circle(100% at center);
        transition: transform 0.35s ease,
                    opacity 0.65s ease,
                    clip-path 0.8s ease;
    }
    /* custom animation "hidden state" ("custom" is the name of the animation you pass as gallery option) */
    .only-this-gallery .spl-pane .custom {
        clip-path: circle(0px at center) ;
        transition: transform 0.65s ease,
                    opacity 0.65s ease;
    }
    /* animation state when gallery is hidden */
    #spotlight.only-this-gallery{
        clip-path: circle(0px at center);
    }
    /* animation state when gallery will open */
    #spotlight.only-this-gallery.show{
        clip-path: circle(100% at center);
        transition: clip-path 0.65s ease 0.15s;
    }
    .slider-img-w50{
        width: 50%;
    }
</style>
    <!-- Start Banner -->
    <div class="section inner_page_header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="full">
                        <h3>{{ $category_name??""}}</h3>
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
                 

                <div class="spotlight-group row" data-fit="contain" data-autohide="all">
                    @if (isset($categoriesItems))
                        @foreach ($categoriesItems as $item)
                            <a class="spotlight p-3" href="{{ $item->{App\Models\CategoryItems::ITEM_IMAGE} }}" data-button="Enquire Now" data-button-href="javascript:alert('You can open an URL or execute some Javascript here.')" 
                                data-description="{{  $item->{App\Models\CategoryItems::ITEM_TITLE}." ".$item->{App\Models\CategoryItems::ITEM_DETAILS} }}">
                                <img class="slider-img-w50" src="{{ $item->{App\Models\CategoryItems::ITEM_IMAGE} }}" alt="Category Image">
                            </a>                                
                        @endforeach
                    @endif
                </div>            
            </div>
        </div>
    </div>
    <!-- end section -->


@endsection

@section('pageScript')
<script src="dist/spotlight.bundle.js"></script>
    <script type="text/javascript">
        function gotTo(link){
            window.location = link;
        }
    </script>
@endsection
