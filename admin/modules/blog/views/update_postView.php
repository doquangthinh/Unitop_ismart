<?php
get_header();
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Sửa bài viết</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <div class="section-detail">

                    <form method="POST" enctype="multipart/form-data" action="?mod=blog&action=update_post" >
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" value="<?php  if(!empty($blog_item['title'])) echo ($blog_item['title'])  ; ?>">
                        <?php echo form_error('title') ?>

                        <label for="created_date">Ngày tạo</label> 
                        <input type="date" name="created_date" id="created_date"  value="<?php  if(!empty($blog_item['created_date'])) echo ($blog_item['created_date'])  ; ?>">  
                        <?php echo form_error('created_date') ?>

                        <!-- <label for="title">Slug ( Friendly_url )</label>
                        <input type="text" name="slug" id="slug"> -->
                        <label for="desc">Mô tả bài viết</label>
                        <textarea name="blog_desc" id="desc" class="ckeditor"  value="" > <?php  if(!empty($blog_item['blog_desc'])) echo ($blog_item['blog_desc'])  ; ?></textarea>
                        <?php echo form_error('blog_desc') ?>

                        <label>Hình ảnh</label>
                        <div id="uploadFile">
                            <input type="file" name="file" id="upload-thumb" value="<?php   echo ($blog_item['thumb'])  ; ?>" >
                            <input type="submit" name="btn-upload-thumb" value="Upload" id="btn-upload-thumb">
                            <img src="../public/images/<?php  if(!empty($blog_item['thumb'])) echo ($blog_item['thumb'])  ; ?>">
                        </div>
                        <?php echo form_error('thumb') ?>

                        <label>Danh mục cha</label>
                        <select name="category" >
                            <option value="">-- Chọn danh mục --</option>
                            <option <?php if(isset($blog_item['category']) && $blog_item['category']=='danh muc 1') echo "selected='selected'" ?> value="danh muc 1">Danh mục 1</option>
                            <option <?php if(isset($blog_item['category']) && $blog_item['category']=='danh muc 2') echo "selected='selected'" ?> value="danh muc 2">Danh mục 2</option>
                            <option <?php if(isset($blog_item['category']) && $blog_item['category']=='danh muc 3') echo "selected='selected'" ?> value="danh muc 3">Danh mục 3</option>
                            <option <?php if(isset($blog_item['category']) && $blog_item['category']=='danh muc 4') echo "selected='selected'" ?> value="danh muc 4">Danh mục 4</option>
                        </select>
                        <?php echo form_error('category') ?>

                        <label for="">Trạng thái bài viết</label>
                        <label for="active">Active</label>
                        <input <?php if(isset($blog_item['status']) && $blog_item['status']=='active') echo "checked='checked'" ?> type="radio" name="status" id="active" value="active" >  
                        <label for="deactive">Deactive</label>
                        <input <?php if(isset($blog_item['status']) && $blog_item['status']=='deactive') echo "checked='checked'" ?> type="radio" name="status" id="deactive" value="deactive" > 
                        <?php echo form_error('status') ?>

                        <button type="submit" name="btn_update_post" >Cập nhật</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


<?php
get_footer();
?>