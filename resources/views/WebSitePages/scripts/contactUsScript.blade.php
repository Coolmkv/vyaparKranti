<script type="text/javascript">
    $("#contactFormSubmit").submit(function() {
        $("#submit").attr("disable", true);
        $.ajax({
            url: '{{ route('contactUsForm') }}',
            method: 'post',
            data: {
                name: $("#name").val(),
                emailId: $("#emailId").val(),
                contact_number: $("#contact_number").val(),
                message: $("#message").val(),
                captcha: $("#captcha_text_contactUs").val(),
                _token: $("input[name='_token']").val()
            },
            dataType: 'json',
            success: function(response) {
                refreshCapthca('captcha_img_id_contact_us','captcha_text_contactUs');
                if (response.status) {
                    successMessage(response.message);
                    $("#contactFormSubmit")[0].reset();
                    $("#submit").attr("disable", false);
                } else {
                    errorMessage(response.message);
                    $("#submit").attr("disable", false);
                }
            },
            error: function(err) {
                refreshCapthca('captcha_img_id_contact_us','captcha_text_contactUs');
                errorMessage("error occurred");
                $("#submit").attr("disable", false);
            }
        });
    });

    
</script>
