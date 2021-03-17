<div class="sidebar fl-left">
    <div class="section" id="category-product-wp">
        <div class="section-head">
            <h3 class="section-title">Danh mục sản phẩm</h3>
        </div>
        <div class="secion-detail">
        <ul class="list-item">
                <li>
                <!-- ?mod=products&action=index&cat_id=1 -->
                    <a href="?mod=products&action=index&cat_id=1" title="">Điện thoại</a>
                    <ul class="sub-menu">
                        <li>
                            <a href="?mod=products&action=sub_menu&brand=apple&cat_id=1" title="">Iphone</a>
                        </li>
                        <li>
                            <a href="?mod=products&action=sub_menu&brand=samsung&cat_id=1" title="">Samsung</a>
                            <!-- <ul class="sub-menu">
                                <li>
                                    <a href="?page=category_product" title="">Iphone X</a>
                                </li>
                                <li>
                                    <a href="?page=category_product" title="">Iphone 8</a>
                                </li>
                                <li>
                                    <a href="?page=category_product" title="">Iphone 8 Plus</a>
                                </li>
                            </ul> -->
                        </li>
                        <li>
                            <a href="?mod=products&action=sub_menu&brand=vsmart&cat_id=1" title="">Vsmart</a>
                        </li>

                        <li>
                            <a href="?mod=products&action=sub_menu&brand=oppo&cat_id=1" title="">Oppo</a>
                        </li>

                        <li>
                            <a href="?mod=products&action=sub_menu&brand=xiaomi&cat_id=1" title="">Xiaomi</a>
                        </li>
                       
                    </ul>
                </li>

                <li>
                <!-- ?mod=products&action=index&cat_id=2 -->
                    <a href="?mod=products&action=index&cat_id=2" title="">Laptop</a>
                </li>

            </ul>
        </div>
    </div>
    <div class="section" id="selling-wp">
        <div class="section-head">
            <h3 class="section-title">Sản phẩm bán chạy</h3>
        </div>
        <div class="section-detail">

            <?php
            if (isset($list_product)) {
            ?>
                <ul class="list-item">
                    <?php
                    foreach ($list_product as $item) {
                    ?>

                        <li class="clearfix">
                            <a href="<?php echo $item['url'] ?>" title="" class="thumb fl-left">
                                <img src="<?php echo $item['product_thumb'] ?>" alt="">
                            </a>
                            <div class="info fl-right">
                                <a href="<?php echo $item['url'] ?>" title="" class="product-name"><?php echo $item['product_title'] ?></a>
                                <div class="price">
                                    <span class="new"><?php echo currency_format($item['price']) ?></span>
                                    <span class="old"><?php echo currency_format($item['old_price']) ?></span>
                                </div>
                                <a href="<?php echo $item['url'] ?>" title="" class="buy-now">Mua ngay</a>
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
    <div class="section" id="banner-wp">
        <div class="section-detail">
            <a href="" title="" class="thumb">
                <img src="public/images/banner.png" alt="">
            </a>
        </div>
    </div>
</div>