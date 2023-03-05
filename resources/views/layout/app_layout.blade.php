<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    @include('includes.head')
</head>

<body id="home" class="@yield("bodyClass")" data-spy="scroll" data-target="#navbar-wd" data-offset="98">

    <!-- LOADER -->
    <div id="preloader">
        <div class="loader">
            <img src="assets/images/loader.gif" alt="#" />
        </div>
    </div>
    <!-- end loader -->
    <!-- END LOADER -->

    <!-- Start header -->
    @include('includes.header')
    <!-- End header -->
    @yield("content")
    
    @include("includes.footer")

    

    <a href="#" id="scroll-to-top" class="hvr-radial-out"><i class="fa fa-angle-up"></i></a>
    @include("includes.script")
    <!-- Start Page script -->
    @yield("pageScript")
    <!-- End Page script -->

</body>

</html>
