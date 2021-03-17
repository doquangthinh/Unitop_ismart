<html>

<head>
    <title>Thiết lập mật khẩu mới</title>
    <link href="public/css/reset.css" rel="stylesheet" type="text/css" />
    <link href="public/css/login.css" rel="stylesheet" type="text/css" />

</head>

<body>
    <div id="wp-form-login">
        <h2 class="page-title" style="margin-bottom:30px;"> Mật khẩu mới </h2>
        <form id="form-login" action="" method="post">

            <input type="password" name="password" id="password" value="" placeholder="Password" />
            <?php echo form_error('password'); ?>

            <input type="submit" id="btn-login" name="btn-new-pass" value="Lưu mật khẩu">
            <?php echo form_error('account'); ?>




        </form>
        <a href="<?php echo base_url("?mod=users&action=login"); ?>" id="lost-pass">Đăng nhập</a>
        <a href="<?php echo base_url("?mod=users&action=reg"); ?>" id="reg">Đăng kí</a>


    </div>
</body>

</html>