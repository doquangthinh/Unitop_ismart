

<html>
    <head>
        <title>Khôi phục mật khẩu</title>
        <link href="public/css/reset.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/login.css" rel="stylesheet" type="text/css"/>

    </head>
    <body>
        <div id="wp-form-login">
            <h2 class="page-title" style="margin-bottom:30px;"> Khôi phục mật khẩu </h2>
            <form id="form-login" action="" method="post">

                <input type="text" name="email" id="email" value="<?php echo set_value('email') ?>" placeholder="Email"/>
                <?php echo form_error('email'); ?>
                <input type="submit" id="btn-login" name="btn-reset" value="Gửi Yêu Cầu">
                
                <?php echo form_error('account'); ?>



                
            </form>
            <a href="<?php echo base_url("?mod=users&action=login"); ?>" id="lost-pass">Đăng nhập</a>
            <a href="<?php echo base_url("?mod=users&action=reg"); ?>" id="reg">Đăng kí</a>
            

        </div>
    </body>
</html>
