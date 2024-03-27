<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    @include('includes.head')
    <!-- Google tag (gtag.js) -->
    <script defer src="https://www.googletagmanager.com/gtag/js?id=G-FY39RJP7SH"></script>
    <script type="text/javascript">
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-FY39RJP7SH');
    </script>
    <!-- Meta Pixel Code -->
    <script type="text/javascript">
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '277363754826126');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=277363754826126&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->
</head>

<body id="{{Request::is('/') ? 'home' : 'information' }}" class="@yield('bodyClass')" data-spy="scroll" data-target="#navbar-wd" data-offset="98">

    <!-- LOADER -->
    <!-- <div id="preloader">
        <div class="loader">
            <img src="assets/images/loader.gif" alt="#" />
        </div>
    </div> -->
    <!-- end loader -->
    <!-- END LOADER -->

    <!-- Start header -->
    @include('includes.header')
    <!-- End header -->
    @yield('content')

    @include('includes.footer')



    <a href="#" id="scroll-to-top" class="hvr-radial-out"><i class="fa fa-angle-up"></i></a>
    @include('includes.script')
    <!-- Start Page script -->
    @yield('pageScript')
    <!-- End Page script -->

</body>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    $("#newsletter_form").submit(function() {
        $("#submit_newsletter_form").attr("disable", true);
        $.ajax({
            url: "{{ route('subscribeNewsLetter') }}",
            method: 'post',
            data: {
                email: $("#subscription_email").val(),
                captcha_text: $("#captcha_text").val(),
                _token: $("input[name='_token']").val()
            },
            dataType: 'json',
            success: function(response) {
                refreshCapthca();
                if (response.status) {
                    successMessage(response.message);
                    $("#newsletter_form")[0].reset();
                    $("#submit_newsletter_form").attr("disable", false);
                } else {
                    errorMessage(response.message);
                    $("#submit_newsletter_form").attr("disable", false);
                }
            },
            error: function(err) {
                refreshCapthca();
                errorMessage("error occurred");
                $("#submit_newsletter_form").attr("disable", false);
            }
        });
    });

    function errorMessage(error_message) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: error_message
        });
    }

    function successMessage(success_message) {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: success_message
        });
    }

    function refreshCapthca(imgId = 'captcha_img_id', textId = 'captcha') {
        $.ajax({
            url: "{{ route('refreshCaptcha') }}",
            method: 'get',
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    $("#" + imgId).attr("src", response.data);
                    $("#" + textId).val("");
                } else {
                    errorMessage(response.message);
                }
            },
            error: function(err) {
                errorMessage("error occurred");
            }
        });
    }
    $(".build-project").on("click",function(){
        refreshCapthca('captcha_img_id_build_project','captcha_text_build');
    });
    $("#build_project_form").submit(function() {
        $("#getQuote").attr("disable", true);
        let data = $(this).serialize();
        $.ajax({
            url: "{{ route('buildProjectFormSubmit') }}",
            method: 'post',
            data: data,
            dataType: 'json',
            success: function(response) {
                refreshCapthca('captcha_img_id_build_project','captcha_text_build');
                if (response.status) {
                    successMessage(response.message);
                    $("#build_project_form")[0].reset();
                    $("#getQuote").attr("disable", false);
                } else {
                    errorMessage(response.message);
                    $("#getQuote").attr("disable", false);
                }
            },
            error: function(err) {
                refreshCapthca('captcha_img_id_build_project','captcha_text_build');
                errorMessage("error occurred");
                $("#getQuote").attr("disable", false);
            }
        });
    });
    $("#queryFormSubmit").submit(function() {
        $("#submit-query").attr("disable", true);
        let data = $(this).serialize();
        $.ajax({
            url: '{{ route('contactUsForm') }}',
            method: 'post',
            data: data,
            dataType: 'json',
            success: function(response) {
                refreshCapthca('captcha_img_id_contact_us','captcha_text_query-form');
                if (response.status) {
                    successMessage(response.message);
                    $("#queryFormSubmit")[0].reset();
                    $("#submit-query").attr("disable", false);
                } else {
                    errorMessage(response.message);
                    $("#submit-query").attr("disable", false);
                }
            },
            error: function(err) {
                refreshCapthca('captcha_img_id_query-form','captcha_text_query-form');
                errorMessage("error occurred");
                $("#submit-query").attr("disable", false);
            }
        });
    });
</script>

</html>
