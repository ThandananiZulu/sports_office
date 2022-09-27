<?php echo view('resources/links'); ?>
<?php echo view('resources/css'); ?>
<div class="wrapper">
    <div class="logo">
        <img src="<?php echo base_url(); ?>/assets/img/mutlogoonly1.PNG" width="200px" height="2px" alt="">
    </div>
    <div class="text-center mt-4 name">
        staff
    </div>
    <form class="p-3 mt-3">
        <div class="form-field d-flex align-items-center">
            <span class="far fa-user"></span>
            <input type="text" stlye="font-size: 20px" name="userName" placeholder="Username" autocomplete="off">
        </div>
        <div class="form-field d-flex align-items-center">
            <span class="fas fa-key"></span>
            <input type="password" name="password" placeholder="Password" autocomplete="off">
        </div>
        <button class="btn mt-3 ">Register</button>
    </form>
    <div class="text-center fs-6">
        <a href="<?php echo base_url('public/route/forgot'); ?>">Forget password?</a> or <a href="#">Sign up</a>
    </div>
</div>