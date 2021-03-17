<?php
get_header();
?>


<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm sản phẩm</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">

                    <form method="POST" enctype="multipart/form-data" action="?mod=products&action=add_product">

                        <label for="product-name">Tên sản phẩm</label>
                        <input type="text" name="product_title" id="product-name" value="<?php echo set_value('product_title') ?>">
                        <?php echo form_error('product_title') ?>

                        <label for="product-code">Mã sản phẩm</label>
                        <input type="text" name="code" id="product-code" value="<?php echo set_value('code') ?>">
                        <?php echo form_error('code') ?>

                        <label for="price">Giá sản phẩm</label>
                        <input type="text" name="price" id="price" value="<?php echo set_value('price') ?>">
                        <?php echo form_error('price') ?>

                        <label for="brand">Hãng</label>
                        <input type="text" name="brand" id="brand" value="<?php echo set_value('brand') ?>">
                        <?php echo form_error('brand') ?>

                        <label for="desc">Mô tả ngắn</label>
                        <textarea name="product_desc" id="desc"><?php echo set_value('product_desc') ?></textarea>
                        <?php echo form_error('product_desc') ?>

                        <label for="desc">Chi tiết</label>
                        <textarea name="product_content" id="desc" class="ckeditor"><?php echo set_value('product_content') ?></textarea>
                        <?php echo form_error('product_content') ?>

                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <!-- <form enctype="multipart/form-data" action="?mod=products&action=upload_ajax" method="POST"> -->
                                <input type="file" name="file" id="upload-thumb"> <br> <br>
                                <input type="submit" name="btn_upload" value="Upload" id="btn-upload-thumb">
                                <img src="public/images/img-thumb.png">
                            <!-- </form> -->
                        </div>

                        <!-- <?php echo form_error('product_desc') ?> -->


                        <label>Danh mục sản phẩm</label>
                        <select name="cat_id">
                            <option value="">-- Chọn danh mục --</option>
                            <option value="1">Điện thoại</option>
                            <option value="2">Laptop</option>
                        </select>
                        <?php echo form_error('cat_id') ?>

                        <label>Trạng thái</label>
                        <select name="status">
                            <option value="0">-- Chọn danh mục --</option>
                            <option value="1">Chờ duyệt</option>
                            <option value="2">Đã đăng</option>
                        </select>

                        <button type="submit" name="btn_add_product" id="btn-submit">Thêm mới</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>