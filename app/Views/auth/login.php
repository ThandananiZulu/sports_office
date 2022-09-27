<?php echo view('resources/links'); ?>
<?php echo view('resources/css'); ?>
<div class="wrapper">
    <div class="logo">
        <img src="<?php echo base_url(); ?>/assets/img/mutlogoonly1.PNG" width="200px" height="2px" alt="">
    </div>
    <div class="text-center mt-4 name">
        Sports Office
    </div>
    <form class="p-3 mt-3" method="post" onsubmit="login(this);return false;">
        <div class="form-field d-flex align-items-center">
            <span class="far fa-user"></span>
            <input type="text" stlye="font-size: 20px" name="username" placeholder="Username" autocomplete="off">
            <input type="hidden" name="grant_type" value="password">
        </div>
        <div class="form-field d-flex align-items-center">
            <span class="fas fa-key"></span>
            <input type="password" name="password" placeholder="Password" autocomplete="off">
        </div>
        <button class="btn mt-3">Login</button>
    </form>
    <div class="text-center fs-6">
        <a href="<?php echo base_url('public/forgot'); ?>">Forget password?</a>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<script>
    function login(form) {
        $.ajax({
            url: '<?php echo base_url('public/user'); ?>',
            type: "POST",
            data: new FormData(form),
            processData: false,

            beforeSend: function(xhr) {
                xhr.setRequestHeader('Authorization', 'Basic ' + btoa('client:clientsecret'));
            },
            timeout: 0,
            contentType: false,
            cache: false,
            async: false,
            success: function(data) {
                if (data.error == false) {
                    var d = new Date();
                    d.setSeconds(d.getSeconds() + data.expires_in);

                    localStorage.setItem("token", data.access_token);
                    localStorage.setItem("expires_in", d);

                    setTimeout(function() {
                        Swal.fire({
                            icon: 'success',
                            title: 'Login Successful...',
                            text: data.message,
                        })

                        location.assign("<?php echo base_url('public/dashboard'); ?>");
                    }, 300);
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
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