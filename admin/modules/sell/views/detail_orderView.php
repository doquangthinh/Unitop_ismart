<?php
get_header();
?>

<div id="main-content-wp" class="list-product-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="detail-exhibition fl-right">
            <div class="section" id="info">
                <div class="section-head">
                    <h3 class="section-title">Thông tin đơn hàng</h3>
                </div>
                <ul class="list-item">
                    <li>
                        <h3 class="title">Mã đơn hàng</h3>
                        <span class="detail">WEBCAMP#1494007211</span>
                    </li>
                    <li>
                        <h3 class="title">Địa chỉ nhận hàng</h3>
                        <span class="detail">Hà Nội / 01689141595</span>
                    </li>
                    <li>
                        <h3 class="title">Thông tin vận chuyển</h3>
                        <span class="detail">Thanh toán tại nhà</span>
                    </li>
                    <form method="POST" action="">
                        <li>
                            <h3 class="title">Tình trạng đơn hàng</h3>
                            <select name="status">
                                <option value='0'>Chờ duyệt</option>
                                <option selected='selected' value='1'>Đang vận chuyển</option>
                                <option value='2'>Thành công</option>
                            </select>
                            <input type="submit" name="sm_status" value="Cập nhật đơn hàng">
                        </li>
                    </form>
                </ul>
            </div>
            <div class="section">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm đơn hàng</h3>
                </div>
                <div class="table-responsive">
                    <table class="table info-exhibition">

                        <thead>
                            <tr>
                                <td class="thead-text">STT</td>
                                <td class="thead-text">Ảnh sản phẩm</td>
                                <td class="thead-text">Tên sản phẩm</td>
                                <td class="thead-text">Đơn giá</td>
                                <td class="thead-text">Số lượng</td>
                                <td class="thead-text">Thành tiền</td>
                            </tr>
                        </thead>

                        <?php
                        if (isset($info_order)) {
                        ?>
                            <tbody>
                                <?php
                                $temp = 0;
                                foreach ($info_order as $item) {
                                    $temp++;
                                ?>
                                    <tr>
                                        <td class="thead-text"><?php echo $temp; ?></td>
                                        <td class="thead-text">
                                            <div class="thumb">
                                                <img src="<?php echo "../" . $item['product_thumb']; ?>" alt="">
                                            </div>
                                        </td>
                                        <td class="thead-text"><?php echo $item['product_title']; ?></td>
                                        <td class="thead-text"><?php echo currency_format($item['price']); ?></td>
                                        <td class="thead-text"><?php echo $item['qty']; ?></td>
                                        <td class="thead-text"><?php echo currency_format($item['sub_total']); ?></td>
                                    </tr>
                                <?php
                                }
                                ?>

                            </tbody>

                        <?php
                        } else {
                        ?>
                            <p>Không tồn tại thông tin đơn hàng</p>
                        <?php
                        }
                        ?>


                    </table>
                </div>
            </div>
            <div class="section">
                <h3 class="section-title">Giá trị đơn hàng</h3>
                <div class="section-detail">
                    <ul class="list-item clearfix">

                        <li>
                            <span class="total-fee">Tổng số lượng</span>
                            <span class="total">Tổng đơn hàng</span>
                        </li>

                        <?php
                        foreach ($info_order as $item) {
                        ?>
                            <li>
                                <span class="total-fee"><strong><?php echo $item['num_order'] ?></strong> sản phẩm</span>
                                <span class="total"><?php echo $item['total'] ?> </span>
                            </li>
                        <?php
                        }
                        ?>


                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php
get_footer();
?>