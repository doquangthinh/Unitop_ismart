<html>

<head>
    <title>Trang Đăng kí</title>
    <link href="public/css/reset.css" rel="stylesheet" type="text/css" />
    <link href="public/css/login.css" rel="stylesheet" type="text/css" />

</head>

<body>
    <div id="wp-form-login">
        <h1 class="page-title"> Đăng kí tài khoản </h1>
        <form id="form-login" action="" method="post">

            
            <input type="text" name="fullname" id="fullname" value="<?php echo set_value('fullname') ?>" placeholder="Fullname" />
            <?php echo form_error('fullname'); ?>

            <input type="email" name="email" id="email" value="<?php echo set_value('email') ?>" placeholder="Email" />
            <?php echo form_error('email'); ?>

            <input type="text" name="username" id="username" value="<?php echo set_value('username') ?>" placeholder="Ussername" />
            <?php echo form_error('username'); ?>

            <input type="password" name="password" id="password" value="" placeholder="Password" />
            <?php echo form_error('password'); ?>

            <input type="submit" id="btn-reg" name="btn-reg" value="Đăng kí" />
            <?php echo form_error('account'); ?>

            <input type="checkbox" name="remember_me" id="remember_me" />
            <label for="remember_me">Ghi nhớ đăng nhập </label>
        </form>

        <a href="?mod=users&action=login" id="reg">Đăng Nhập </a> <br>


    </div>
</body>

</html>