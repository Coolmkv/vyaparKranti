<!DOCTYPE html>
<html lang="en">

<head>
    @include('include.head')    
</head>

<body>
    <!-- Navbar Start -->
    @include('include.navigation')
    <!-- Navbar End -->

    @yield('content')



    <!-- Footer Start -->
    @include('include.footer')
    
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>

    @include('include.script')
    @yield('script')
</body>
</html>