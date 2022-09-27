<?php echo view('resources/links'); ?>
<?php echo view('resources/css'); ?>
<div class="wrapper mb-5">
    <div class="logo">
        <img src="<?php echo base_url(); ?>/assets/img/mutlogoonly1.PNG" width="200px" height="2px" alt="">
    </div>
    <div class="text-center mt-4 name">
        Reset Password
    </div>
    <div class="text-center mt-4 text-dark">
        Enter a new password below.
    </div>
    <form class="p-3 mt-3" onsubmit="forgot(this);return false;">
        <div class="form-field d-flex align-items-center">
            <span class="fas fa-key"></span>
            <input type="password" name="password" placeholder="Password" autocomplete="off">
        </div>
        <div class="form-field d-flex align-items-center">
            <span class="fas fa-key"></span>
            <input type="password" name="confirmPassword" placeholder="Confirm Password" autocomplete="off">
        </div>
        <button class="btn mt-3 ">Submit</button>
    </form>
    <div class=" text-center fs-6">
        <a href="<?php echo base_url('public/'); ?>">Back To Login</a>
    </div>
</div>

<script>
    function forgot(form) {

        $.ajax({
            url: '<?php echo base_url('public/forgotPassword'); ?>',
            type: "post",
            data: new FormData(form),
            processData: false,
            beforeSend: function(xhr) {
                xhr.setRequestHeader('Authorization', 'Basic ' + btoa('testclient:testsecret'));
            },
            timeout: 0,
            contentType: false,
            cache: false,
            async: false,
            success: function(data) {
                if (data.error == false) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Forgot Password',
                        text: data.message,
                    })


                }

            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                console.log(XMLHttpRequest);

                data = JSON.parse(XMLHttpRequest.responseText);

                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: data.error_description,
                })

            }
        });

    }
</script>