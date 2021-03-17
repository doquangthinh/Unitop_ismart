<?php
get_header();
?>

<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới bài viết thành công</h3>
                    
                </div>
                Click vào <a href="?mod=blog&action=add_post">đây</a> để tiếp tục thêm bài viết
                hoặc <a href="?mod=blog&action=list_post">quay lại</a> trang danh sách bài viết
            </div>
            
        </div>
    </div>
</div>


<?php
get_footer();
?>