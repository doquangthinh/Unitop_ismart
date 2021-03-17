<?php
get_header();
?>

<div id="main-content-wp" class="clearfix blog-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Blog</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-blog-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title">Blog</h3>
                </div>
                <div class="section-detail">
                <?php
                    if (!empty($list_blog)) {
                ?>
                     <ul class="list-item">
                            <?php foreach($list_blog as $item){
                                ?>
                                <li class="clearfix">
                                    <a href="?mod=blog&action=index" title="" class="thumb fl-left">
                                        <img src="public/images/<?php echo $item['thumb'] ?>" alt="">
                                    </a>
                                    <div class="info fl-right">
                                        <a href="?page=detail_blog" title="" class="title"><?php echo $item['title'] ?></a>
                                        <span class="create-date"><?php echo $item['created_date'] ?></span>
                                        <strong class="text-primary"><?php echo $item['category'] ?></strong>
                                        <p class="desc"><?php echo $item['blog_desc'] ?></p>
                                    </div>
                                </li>

                                <?php
                            } ?>
                        

                        </ul>

                    <?php
                        } 
                    ?>
                   
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail">
                    <?php
                        echo get_pagging($num_page, $page, "?mod=blog&action=index");
                    ?>
                    <!-- <ul class="list-item clearfix">
                        <li>
                            <a href="" title="">1</a>
                        </li>
                        <li>
                            <a href="" title="">2</a>
                        </li>
                        <li>
                            <a href="" title="">3</a>
                        </li>
                    </ul> -->
                </div>
            </div>
        </div>
        <?php get_sidebar('detailProduct'); ?>
    </div>
</div>


<?php
get_footer();
?>




