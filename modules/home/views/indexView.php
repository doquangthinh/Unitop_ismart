<?php
get_header();
?>




<div id="main-content-wp" class="home-page clearfix">
    <div class="wp-inner">
        <div class="main-content fl-right">
            <div class="section" id="slider-wp">
                <div class="section-detail">
                    <div class="item">
                        <img src="public/images/slider-01.png" alt="">
                    </div>
                    <div class="item">
                        <img src="public/images/slider-02.png" alt="">
                    </div>
                    <div class="item">
                        <img src="public/images/slider-03.png" alt="">
                    </div>
                </div>
            </div>
            <div class="section" id="support-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-1.png">
                            </div>
                            <h3 class="title">Miễn phí vận chuyển</h3>
                            <p class="desc">Tới tận tay khách hàng</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-2.png">
                            </div>
                            <h3 class="title">Tư vấn 24/7</h3>
                            <p class="desc">1900.9999</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-3.png">
                            </div>
                            <h3 class="title">Tiết kiệm hơn</h3>
                            <p class="desc">Với nhiều ưu đãi cực lớn</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-4.png">
                            </div>
                            <h3 class="title">Thanh toán nhanh</h3>
                            <p class="desc">Hỗ trợ nhiều hình thức</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="public/images/icon-5.png">
                            </div>
                            <h3 class="title">Đặt hàng online</h3>
                            <p class="desc">Thao tác đơn giản</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="section" id="feature-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm nổi bật</h3>
                </div>
                <div class="section-detail">

                    <?php

                    if (isset($list_product)) {
                    ?>
                        <ul class="list-item">
                            <?php

                            foreach ($list_product as $item) {
                            ?>
                                <li>
                                    <a href="<?php echo $item['url'] ?>" title="" class="thumb">
                                        <img src="<?php echo $item['product_thumb'] ?>">
                                    </a>
                                    <a href="?mod=product&action=detail_product" title="" class="product-name"><?php echo $item['product_title'] ?></a>
                                    <div class="price">
                                        <span class="new"><?php echo currency_format($item['price']) ?></span>
                                        <span class="old"><?php echo currency_format($item['old_price']) ?></span>
                                    </div>
                                    <div class="action clearfix">
                                        <a href="<?php echo $item['url'] ?>" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                        <a href="<?php echo $item['url'] ?>" title="" class="buy-now fl-right">Mua ngay</a>
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
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title"><a href="<?php echo $info_cat_mobile['url'] ?>"><?php echo $info_cat_mobile['cat_title'] ?></a></h3>
                </div>
                <div class="section-detail">
                    <?php
                    if (!empty($list_mobile)) {
                    ?>
                        <ul class="list-item clearfix">
                            <?php
                            foreach ($list_mobile as $item) {
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
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title"><a href="<?php echo $info_cat_laptop['url'] ?>"><?php echo $info_cat_laptop['cat_title'] ?></h3>
                </div>
                <div class="section-detail">
                    <?php
                    if (!empty($list_laptop)) {
                    ?>
                        <ul class="list-item clearfix">
                            <?php
                            foreach ($list_laptop as $item) {
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
        </div>
        <?php get_sidebar() ?>
    </div>
</div>






<?php
get_footer();
?>