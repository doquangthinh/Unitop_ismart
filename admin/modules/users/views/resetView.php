<?php
get_header();

// echo ($_POST['pass-old']);
?>

<div id="main-content-wp" class="change-pass-page">
   
    <div class="wrap clearfix">
        <?php
        get_sidebar('users');
        ?>
        <div id="content" class="fl-right">
            <div class="section" id="detail-page">
                <div class="section-detail">

                    <form method="POST">
                        <label for="old-pass">Mật khẩu cũ</label>
                        <input type="password" name="pass-old" id="pass-old" ">
                        <p><?php echo form_error('pass-old'); ?></p>

                        <label for="new-pass">Mật khẩu mới</label>
                        <input type="password" name="pass-new" id="pass-new">

                        <label for="confirm-pass">Xác nhận mật khẩu</label>
                        <input type="password" name="confirm-pass" id="confirm-pass">

                        <button type="submit" name="btn-update-password" id="btn-submit">Cập nhật</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>