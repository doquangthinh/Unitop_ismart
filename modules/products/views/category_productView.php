<?php
get_header();
?>



<div id="main-content-wp" class="clearfix category-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title=""><strong><?php echo $info_cat['cat_title'] ?></strong></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-product-wp">

                <div class="section-head clearfix">
                    <h3 class="section-title fl-left"><?php echo $info_cat['cat_title'] ?></h3>
                    <div class="filter-wp fl-right">
                        <p class="desc">Hiển thị <strong><?php echo  count($list_products) ?> / <?php echo  ($num_rows)?> </strong> sản phẩm</p>
                        <div class="form-filter">

                            <form method="POST" action="?mod=products&action=sort">
                                <select name="select">
                                    <!-- <option value="0">Sắp xếp</option> -->
                                    <option value="`product_title`  ASC">Từ A-Z</option>
                                    <option value="`product_title`  DESC">Từ Z-A</option>
                                    <option value="`price`  ASC">Giá thấp lên cao</option>
                                    <option value="`price`  DESC">Giá cao xuống thấp</option>

                                </select>
                                <button type="submit" name="btn-sort">Lọc</button>
                            </form>

                        </div>
                    </div>
                </div>

                <div class="section-detail">
                    <?php
                    if (!empty($list_products)) {
                    ?>
                        <ul class="list-item clearfix">
                            <?php
                            foreach ($list_products as $item) {
                            ?>
                                <li>
                                    <a href="<?php echo $item['url'] ?>" title="" class="thumb">
                                        <img src="<?php echo $item['product_thumb'] ?>">
                                    </a>
                                    <a href="<?php echo $item['url'] ?>" title="" class="product-name"><?php echo $item['product_title'] ?></a>
                                    <div class="price">
                                        <span class="new"><?php echo currency_format($item['price']) ?></span>
                                        <span class="old"><?php echo currency_format($item['old_price']) ?></span>
                                    </div>
                                    <div class="action clearfix">
                                        <a href="<?php echo $item['url'] ?>" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                        <a href="<?php echo $item['url'] ?>" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                    </div>
                                </li>


                            <?php
                            }
                            ?>

                        </ul>
                    <?php
                    }
                    ?>

                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail">
                    <?php
                    echo get_pagging($num_page, $page, "?mod=products&action=index&cat_id={$info_cat['id']}");
                    ?>
                </div>
            </div>
        </div>
        <?php
        if ($info_cat['id'] == 1) {
            get_sidebar('product');
        } else if ($info_cat['id'] == 2) {
            get_sidebar('product_laptop');
        }
        ?>
    </div>
</div>
<?php
get_footer();
?>