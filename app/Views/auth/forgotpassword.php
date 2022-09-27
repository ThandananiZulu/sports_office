<?php echo view('resources/links'); ?>
<?php echo view('resources/css'); ?>
<div class="wrapper">
    <div class="logo">
        <img src="<?php echo base_url(); ?>/assets/img/mutlogoonly1.PNG" width="200px" height="2px" alt="">
    </div>
    <div class="text-center mt-4 name">
        Forgot Password
    </div>
    <div class="text-center mt-4 text-dark">
        Enter your email or username and we'll send you a link to get back into your account.
    </div>
    <form class="p-3 mt-3" onsubmit="forgot(this);return false;">
        <div class="form-field d-flex align-items-center mt-3 mb-4">
            <span class="far fa-envelope"></span>
            <input type="text" stlye="font-size: 20px" name="username" placeholder="Email" autocomplete="off">
        </div>
        <button class="btn mt-3 ">Submit</button>
    </form>
    <div class="text-center fs-6">
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

                    location.assign("<?php echo base_url('public/resetPassword'); ?>");
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