<?php

function get_list_users()
{
    $result = db_fetch_array("SELECT * FROM `tbl_users`");
    return $result;
}

function get_user_by_id($id)
{
    $item = db_fetch_row("SELECT * FROM `tbl_users` WHERE `user_id` = {$id}");
    return $item;
}

function get_product_by_id($id)
{
    $item = db_fetch_row("SELECT * FROM `tbl_products` WHERE `id` = {$id}");
    $item['url_add_cart'] = "?mod=products&action=detail_product&id={$id}";
    return $item;
}


//hàm thêm sản phẩm vào giỏ hàng
function add_cart($id)
{
    //thêm thông tin vào giỏ hàng
    $item = get_product_by_id($id);
    $qty = 1;
    if (isset($_SESSION['cart']) && array_key_exists($id, $_SESSION['cart']['buy'])) {
        $qty = $_SESSION['cart']['buy'][$id]['qty'] + 1;
    }
    // thêm thông tin sản phẩm vào giỏ hàng
    $_SESSION['cart']['buy'][$id] = array(
        'id' => $item['id'],
        'product_title' => $item['product_title'],
        'url' => $item['url_add_cart'],
        'price' => $item['price'],
        'old_price' => $item['old_price'],
        'code' => $item['code'],
        'product_desc' => $item['product_desc'],
        'product_thumb' => $item['product_thumb'],
        'product_content' => $item['product_content'],
        'qty' => $qty,
        'sub_total' => $item['price'] *  $qty
    );
    //cập nhật hóa đơn
    update_info_cart($id);
}



//hàm update tổng số lượng và tổng giá
function update_info_cart($id)
{
    $item = get_product_by_id($id);
    if (isset($_SESSION['cart'])) {
        $num_order = 0;
        $total = 0;
        foreach ($_SESSION['cart']['buy'] as $item) {
            $num_order += $item['qty'];
            $total += $item['sub_total'];
        }

        $_SESSION['cart']['info'] = array(
            'num_order' => $num_order,
            'total' => $total
        );
    }
}

function get_list_by_cart()
{
    if (isset($_SESSION['cart']['buy'])) {
        foreach ($_SESSION['cart']['buy'] as &$item) {
            $item['url_delete_cart'] = "?mod=cart&action=delete&id={$item['id']}";
        }
        return $_SESSION['cart']['buy'];
    }
    return false;
}

// function get_num_order_cart()
// {
//     if (isset($_SESSION['cart'])) {
//         return $_SESSION['cart']['info']['num_order'];
//     }
// }

function get_total_cart()
{
    if (isset($_SESSION['cart'])) {
        return $_SESSION['cart']['info']['total'];
    }
    return false;
}


function delete_cart($id)
{
    if (isset($_SESSION['cart'])) {
        // xóa sp có $id thong giỏ hàng
        if (!empty($id)) {
            unset($_SESSION['cart']['buy'][$id]);
            update_info_cart($id);
        } else {
            unset($_SESSION['cart']);
        }
    }
}


function delete_all()
{

    unset($_SESSION['cart']);
}


function update_cart($qty){
    foreach($qty as $id=>$newqty){
        $_SESSION['cart']['buy'][$id]['qty']=$newqty;
        $_SESSION['cart']['buy'][$id]['sub_total']=$newqty * $_SESSION['cart']['buy'][$id]['price'];
    }
    update_info_cart($id);
}

// thêm thông tin khách hàng vào db
function insert_info_customer($info_customer_order){
    return db_insert('tbl_info_customer',$info_customer_order );
}
//thêm thông tin đơn hàng vào db

function insert_info_order($info_order){
    return db_insert('tbl_order',$info_order);
}


// hàm thả về 1 bảng html chứa thông tin sản phẩm đã mua
function form_order() {
    $body = "";
    $total = currency_format($_SESSION['cart']['info']['total']);
    $temp=0;
    if (!empty($_SESSION)) {
        foreach ($_SESSION['cart']['buy'] as $item) {
            $temp++;
            $product_thumb = $item['product_thumb'];
            $product_title = $item['product_title'];
            $price = currency_format($item['price']);
            $qty = $item['qty'];
            $sub_total = currency_format($item['price'] * $qty);
            $body .= "
            <tr>
                <td>$temp </td>
                <td><a href='' title='' class='name-product'>{$product_title}</a></td>
                <td>{$price}</td>
                <td>{$qty}</td>
                <td>{$sub_total} </td>
            </tr>
            ";
        }
    }
    return "
    <table class='table table-hover ' border='1'>
                    <thead>
                        <tr class='table-primary'>
                            <th class='table-dark'>STT</th>
                            <th>Tên sản phẩm </th>
                            <th>Giá sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Tổng giá</th>
                        </tr>
                    </thead>
                    <tbody>
                    {$body}
                        
                    </tbody>
                </table>
    <p>Thành tiền : <strong>{$total}</strong></p> 
    ";
}


