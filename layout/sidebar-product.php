<div class="sidebar fl-left">
    <div class="section" id="category-product-wp">
        <div class="section-head">
            <h3 class="section-title">Danh mục sản phẩm</h3>
        </div>
        <div class="secion-detail">
        <ul class="list-item">
                <li>
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
                    <a href="?mod=products&action=index&cat_id=2" title="">Laptop</a>
                </li>

            </ul>
        </div>
    </div>
    <div class="section" id="filter-product-wp">
        <div class="section-head">
            <h3 class="section-title">Bộ lọc</h3>
        </div>
        <div class="section-detail">
            <form method="POST" action="?mod=products&action=filter&cat_id=1">
                <table>
                    <thead>
                        <tr>
                            <td colspan="2">Giá</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="radio" name="r-price" value="<= 5000000"></td>
                            <td>Dưới 5.000.000đ</td>
                        </tr>
                        
                        <tr>
                            <td><input type="radio" name="r-price"  value="  BETWEEN 5000000 AND 10000000 " ></td>
                            
                            <td>5.000.000đ - 10.000.000đ</td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="r-price" value=">= 10000000"></td>
                            
                            <td>Trên 10.000.000đ</td>
                            <?php echo form_error('price') ?>
                        </tr>
                    </tbody>
                </table>
               
                <table>
                    <thead>
                        <tr>
                            <td colspan="2">Hãng</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="radio" name="r-brand" value="Apple"></td>
                            <td>Apple</td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="r-brand" value="SamSung"></td>
                            <td>SamSung</td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="r-brand" value="Oppo"></td>
                            <td>Oppo</td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="r-brand" value="Xiaomi"></td>
                            <td>Xiaomi</td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="r-brand" value="Vsmart"></td>
                            
                            <td>Vsmart</td>
                            <?php echo form_error('brand') ?>
                        </tr>
                       
                    </tbody>
                </table>
                
                <!-- <table>
                    <thead>
                        <tr>
                            <td colspan="2">Loại</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="radio" name="r-price"></td>
                            <td>Điện thoại</td>
                        </tr>
                        <tr>
                            <td><input type="radio" name="r-price"></td>
                            <td>Laptop</td>
                        </tr>
                    </tbody>
                </table> -->

                <input type="submit" name="btn-filter" value="Lọc" style="color: white; background:#9fbff6; width:200px; border:1px solid green; border-radius:3px;" >
               
            </form>
            
        </div>
    </div>
    <div class="section" id="banner-wp">
        <div class="section-detail">
            <a href="?page=detail_product" title="" class="thumb">
                <img src="public/images/banner.png" alt="">
            </a>
        </div>
    </div>
</div>