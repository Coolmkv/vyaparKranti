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
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
<script>
    $("#newsletter_form").submit(function(){
        $("#submit_newsletter_form").attr("disable",true);
        $.ajax({
        url:'{{ route("subscribeNewsLetter") }}',
        method:'post',
        data:{
            email:$("#subscription_email").val(),
            captcha_text:$("#captcha_text").val(),
            _token:$("input[name='_token']").val()
        },
        dataType:'json',
        success:function(response){
            refreshCapthca();
            if(response.status){
                successMessage(response.message);
                $("#newsletter_form")[0].reset();
                $("#submit_newsletter_form").attr("disable",false);
            }else{
                errorMessage(response.message);                
                $("#submit_newsletter_form").attr("disable",false);
            }
        },
        error:function(err){
            refreshCapthca();
            errorMessage("error occurred");
            $("#submit_newsletter_form").attr("disable",false);
        }
    });
    });
    function errorMessage(error_message){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: error_message             
          });
      }
      function successMessage(success_message){
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: success_message
          });
      }
    function refreshCapthca(){
    $.ajax({
        url:'{{ route("refreshCaptcha") }}',
        method:'get',
        dataType:'json',
        success:function(response){
            if(response.status){
                $("#captcha_img_id").attr("src",response.data);
                $("#captcha").val("");
            }else{
                errorMessage(response.message);
            }
        },
        error:function(err){
            errorMessage("error occurred");
        }
    });
}
</script>

</html>
