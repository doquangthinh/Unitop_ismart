<!-- 

<html>
    <head>
        <title>Trang Đăng nhập</title>
        <link href="public/reset.css" rel="stylesheet" type="text/css"/>
        <link href="public/login.css" rel="stylesheet" type="text/css"/>

    </head>
    <body>
        <div id="wp-form-login">
            <h1 class="page-title"> Đăng Nhập </h1>
            <form id="form-login" action="" method="post">

                <input type="text" name="username" id="username" value="<?php echo set_value('username') ?>" placeholder="Ussername"/>
                <?php echo form_error('username'); ?>

                <input type="password" name="password" id="password" value="" placeholder="Password"/>
                <?php echo form_error('password'); ?>

                <input type="submit" id="btn-login" name="btn-login" value="Đăng Nhập" />
                <?php echo form_error('account'); ?>

                <input type="checkbox" name="remember_me" id="remember_me"/>  
                <label for="remember_me">Ghi nhớ đăng nhập </label> 
            </form>
         
            

        </div>
    </body>
</html> -->


<!-- 

<html>
    <head>
        <title>Trang Đăng nhập</title>
        <link href="public/css/reset.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/login.css" rel="stylesheet" type="text/css"/>

    </head>
    <body>
        <div id="wp-form-login">
            <h1 class="page-title"> Đăng Nhập </h1>
            <form id="form-login" action="" method="post">

                <input type="text" name="username" id="username" value="<?php echo set_value('username') ?>" placeholder="Ussername"/>
                <?php echo form_error('username'); ?>

                <input type="password" name="password" id="password" value="" placeholder="Password"/>
                <?php echo form_error('password'); ?>

                <input type="submit" id="btn-login" name="btn-login" value="Đăng Nhập" />
                <?php echo form_error('account'); ?>

                <input type="checkbox" name="remember_me" id="remember_me"/>  
                <label for="remember_me">Ghi nhớ đăng nhập </label> 
            </form>
            <a href="<?php echo base_url("?mod=users&action=reset"); ?>" id="lost-pass">Quên mật khẩu</a>
            <a href="<?php echo base_url("?mod=users&action=reg"); ?>" id="reg">Đăng kí</a>
            

        </div>
    </body>
</html> -->

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/login-form-02/fonts/icomoon/style.css">
    <link rel="stylesheet" href="public/login-form-02/css/owl.carousel.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="public/login-form-02/css/bootstrap.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="public/login-form-02/css/style.css">
    <title>Admin    </title>
  </head>
  <body>
  

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('public/login-form-02/images/bg_1.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3>Login to <strong>Login</strong></h3>
            <form action="" method="post">
              <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Your Email" value="<?php echo set_value('username') ?>" id="username">
                <?php echo form_error('username'); ?>
              </div>
              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Your Password" id="password">
                <?php echo form_error('password'); ?>
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" name="remember_me" id="remember_me" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="<?php echo base_url("?mod=users&action=reset"); ?>" class="forgot-pass">Forgot Password</a></span> 
              </div>

              <input type="submit" value="Log In" name="btn-login" class="btn btn-block btn-primary">
              <?php echo form_error('account'); ?>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
    

    <script src="public/login-form-02/js/jquery-3.3.1.min.js"></script>
    <script src="public/login-form-02/js/popper.min.js"></script>
    <script src="public/login-form-02/js/bootstrap.min.js"></script>
    <script src="public/login-form-02/js/main.js"></script>
  </body>
</html>




