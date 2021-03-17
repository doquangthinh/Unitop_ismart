<?php
get_header();
?>

<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm mới bài viết</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">

                    <form method="POST" enctype="multipart/form-data" id="form-upload-single" action="?mod=blog&action=add_post" >
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" value="<?php echo set_value('title') ?>">
                        <?php echo form_error('title') ?>

                        <label for="created_date">Ngày tạo</label> 
                        <input type="date" name="created_date" id="created_date" value="<?php echo set_value('created_date') ?>">   
                        <?php echo form_error('created_date') ?>

                        <!-- <label for="title">Slug ( Friendly_url )</label>
                        <input type="text" name="slug" id="slug"> -->
                        <label for="desc">Mô tả bài viết</label>
                        <textarea name="blog_desc" id="desc" class="ckeditor"  value="<?php echo set_value('blog_desc') ?>" ></textarea>
                        <?php echo form_error('blog_desc') ?>

                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <!-- <input type="file" name="file" id="upload-thumb"> -->
                            <!-- <input type="submit" name="btn-upload-thumb" value="Upload" id="btn-upload-thumb"> -->
                            <!-- <img src="public/images/img-thumb.png">
                            <label for="detail">Hình ảnh</label><br/><br/>
                            <input type="file" name="file" id="upload-thumb" data-uri="?mod=blog&action=uploadAjax"><br/><br/>
                            <input id="thumbnail_url" type ="hidden" name="thumbnail_url" value="" />
                            <input type="submit" name="Upload" value="Upload" id="upload_single_bt">
                            <div id="show_list_file" > -->


                            <!-- <label for="detail">Hình ảnh</label><br/><br/>
                            <input type="file" name="file" id="file" data-uri="upload_single.php"><br/><br/>
                            <input id="thumbnail_url" type ="hidden" name="thumbnail_url" value="" />
                            <input type="submit" name="Upload" value="Upload" id="upload_single_bt">
                            <div id="show_list_file" > -->

                        </div>

                        <form id="form-upload-single"  action="?mod=blog&action=uploadAjax" enctype="multipart/form-data" method="post">
                                <div class="form_group clearfix">
                                    <input type="file" name="file" id="file" data-uri="?mod=blog&action=uploadAjax"><br/><br/>
                                    <input id="thumbnail_url" type ="hidden" name="thumbnail_url" value="" />
                                    <input type="submit" name="Upload" value="Upload" id="upload_single_bt">
                                    <div id="show_list_file" >
                                    </div>
                                </div>
                            </form>
                        <?php echo form_error('thumb') ?>

                        <label>Danh mục cha</label>
                        <select name="category" >
                            <option value="">-- Chọn danh mục --</option>
                            <option value="danh muc 1">Danh mục 1</option>
                            <option value="danh muc 2">Danh mục 2</option>
                            <option value="danh muc 3">Danh mục 3</option>
                            <option value="danh muc 4">Danh mục 4</option>
                        </select>
                        <?php echo form_error('category') ?>

                        <label for="">Trạng thái bài viết</label>
                        <input type="radio" name="status" value="active" > Active  <br>
                        <input type="radio" name="status" value="deactive" > Deactive
                        <?php echo form_error('status') ?>

                        <button type="submit" name="btn_add_post" >Thêm mới</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


<?php
get_footer();
?>