<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function successMessage(success_message,reload=false){
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: success_message
      }).then(function(){
          if (reload) {
          window.location.reload();
        }
      });
  }
  function errorMessage(error_message){
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: error_message             
      });
  } 
    $(document).ready(function() {
     
        $('.dateTime').datetimepicker({
            sideBySide: true,
            icons: {
                time: "fa fa-clock-o",
                date: "fa fa-calendar",
                up: "fa fa-arrow-up",
                down: "fa fa-arrow-down"
            }
        });

        
        $("#booking_form").on("submit", function() {
            $("#bookNow").prop("disabled",true);
            var form = new FormData(this);
            $.ajax({
                type: 'POST',
                url: '{{ route('submitBooking') }}',
                data: form,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    $("#bookNow").prop("disabled",false);
                    if(response.status){
                        successMessage(response.message,"reload");
                    }else{
                        errorMessage(response.message);
                        refreshCapthca();
                    }
                                            
                },
                failure: function(response) {
                    $("#bookNow").prop("disabled",false);
                    errorMessage(response.message);
                    refreshCapthca();
                }
            });
        });
    });

    function refreshCapthca() {
        $.ajax({
            url: '{{ route('refreshCaptcha') }}',
            method: 'get',
            dataType: 'json',
            success: function(response) {
                if (response.status) {
                    $("#captcha_img_id").attr("src", response.data);
                    $("#captcha").val("");
                } else {
                    errorMessage(response.message);
                }
            },
            error: function(err) {
                errorMessage("error occurred");
            }
        });
    }
</script>