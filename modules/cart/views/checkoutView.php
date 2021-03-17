<?php
get_header();

// show_array($list_buy);
?>


<div id="main-content-wp" class="checkout-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?page=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Thanh toán</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="customer-info-wp">
            <div class="section-head">
                <h1 class="section-title">Thông tin khách hàng</h1>
            </div>
            <div class="section-detail">

                <form method="POST" action="?mod=cart&action=check_out_order" name="form-checkout">
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="fullname">Họ tên</label>
                            <input type="text" name="fullname" id="fullname"  style="border-radius:10px;">
                            <?php echo form_error('fullname') ?>
                        </div>
                        <div class="form-col fl-right">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email"   style="border-radius:10px;">
                            <?php echo form_error('email') ?>
                        </div>
                    </div>
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="address">Địa chỉ</label>
                            <input type="text" name="address" id="address"  style="border-radius:10px;">
                            <?php echo form_error('address') ?>
                        </div>
                        <div class="form-col fl-right">
                            <label for="phone">Số điện thoại</label>
                            <input type="tel" name="phone" id="phone"style="border-radius:10px;">
                            <?php echo form_error('phone') ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-col">
                            <label for="notes">Ghi chú</label>
                            <textarea name="note" style="border-radius:10px;"></textarea>
                            <?php echo form_error('note') ?>
                        </div>
                    </div>
            </div>
        </div>
        <div class="section" id="order-review-wp">
            <div class="section-head">
                <h1 class="section-title">Thông tin đơn hàng</h1>
            </div>
            <div class="section-detail">

                <?php
                if (!empty($list_buy)) {
                ?>

                    <table class="shop-table">
                        <thead>
                            <tr>

                                <td>
                                    Có
                                    <strong>
                                        <?php
                                        $num_order = get_num_order_cart();
                                        if ($num_order > 0) {
                                        ?>
                                            <span id="num"> <?php echo $num_order; ?></span>

                                        <?php
                                        }
                                        ?>
                                    </strong>
                                    sản phẩm </td>
                                <td>Tổng</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($list_buy as $item) {
                            ?>

                                <tr class="cart-item">
                                    <td class="product-name"><?php echo $item['product_title'] ?><strong class="product-quantity">x <?php echo $item['qty'] ?></strong></td>
                                    <td class="product-total"><?php echo currency_format($item['sub_total']) ?></td>
                                </tr>

                            <?php
                            }
                            ?>


                        </tbody>
                        <tfoot>
                            <tr class="order-total">
                                <td>Tổng đơn hàng:</td>
                                <td><strong class="total-price"><?php echo currency_format(get_total_cart()); ?></strong></td>
                            </tr>
                        </tfoot>
                    </table>

                <?php
                }
                ?>


                <div id="payment-checkout-wp">
                    <ul id="payment_methods">
                        <li>
                            <input type="radio" id="direct-payment" name="payment-method" value="online-payment">
                            <label for="online-payment">Thanh toán online</label>
                        </li>
                        <li>
                            <input type="radio" id="payment-home" name="payment-method" value="payment-home">
                            <label for="payment-home">Thanh toán tại nhà</label>
                        </li>
                    </ul>
                </div>

                <?php echo form_error('payment_method') ?>

                <div class="place-order-wp clearfix">
                    <input type="submit" id="order-now" name="btn_check_out" value="Đặt hàng">
                </div>

                </form>

            </div>
        </div>
    </div>
</div>

<?php
get_footer()
?>