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


// lấy danh mục sản phẩm theo cat_id
function get_info_by_cat_id($cat_id)
{
    $result = db_fetch_row("SELECT * FROM `tbl_product_cat` WHERE `id` ={$cat_id}");
    return $result;
}

//lấy danh sách sản phẩm theo cat_id ( điện thoại - laptop)
function get_list_product_by_cat_id($cat_id)
{
    $result = db_fetch_array("SELECT * FROM `tbl_products` WHERE `cat_id` ={$cat_id}");

    $list_item = array();
    foreach ($result as $item) {
        $item['url'] = "?mod=products&action=detail_product&id={$item['id']}";
        $list_item[] = $item;
    }
    return $list_item;
}

// lấy từng sản phẩm theo id 
function get_product_by_id($id)
{
    $item = db_fetch_row("SELECT * FROM `tbl_products` WHERE `id` = {$id}");
    $item['url_add_cart'] = "?mod=cart&action=add&id={$id}";
    return $item;
}

// lọc sản phẩm theo giá và thương hiệu
function filter($price, $brand, $cat_id)
{
    $result = db_fetch_array("SELECT * FROM `tbl_products` WHERE `price`  {$price}  AND `brand` = '{$brand}' AND `cat_id`='{$cat_id}'  ");
    $list_item = array();
    foreach ($result as $item) {
        $item['url'] = "?mod=products&action=detail_product&id={$item['id']}";
        $list_item[] = $item;
    }
    return $list_item;
    // return $result;
}

// function filter_price($price){
//     $result = db_fetch_array("SELECT * FROM `tbl_products` WHERE `price` {$price}     ");
//     return $result;
// }

// function filter_brand($brand){
//     $result = db_fetch_array("SELECT * FROM `tbl_products` WHERE `brand` = '{$brand}'   ");
//     return $result;
// }



function sort_mobile($sort)
{
    $result = db_fetch_array("SELECT * FROM `tbl_products` WHERE `cat_id` = 1 ORDER BY $sort ");
    $list_item = array();
    foreach ($result as $item) {
        $item['url'] = "?mod=cart&action=show&id={$item['id']}";
        $list_item[] = $item;
    }
    return $list_item;
}


function sort_laptop($sort)
{
    $result = db_fetch_array("SELECT * FROM `tbl_products` WHERE `cat_id` = 2  ORDER BY $sort ");
    $list_item = array();
    foreach ($result as $item) {
        $item['url'] = "?mod=cart&action=show&id={$item['id']}";
        $list_item[] = $item;
    }
    return $list_item;
}



function get_products($start, $num_per_page, $where = "")
{
    if (!empty($where))
        $where = "WHERE {$where}";
    $list_products = db_fetch_array("SELECT * FROM `tbl_products` {$where} LIMIT {$start}, {$num_per_page} ");
    // return $list_products;


    $list_item = array();
    foreach ($list_products as $item) {
        $item['url'] = "?mod=products&action=detail_product&id={$item['id']}";
        $list_item[] = $item;
    }
    return $list_item;
}


function get_pagging($num_page, $page, $base_url = "")
{
    $str_pagging = "<ul class='list-item clearfix'>";

    if ($page > 1) {
        $page_prev = $page - 1;
        $str_pagging .= "<li> <a href='{$base_url}&page=$page_prev'>Trước</a></li>";
    }
    for ($i = 1; $i <= $num_page; $i++) {
        $active = "";
        if ($i == $page)
            $active = " class='active'";
        $str_pagging .= "<li {$active}> <a href='{$base_url}&page={$i}'>{$i}</a></li>";
    }
    // unset($active);
    if ($page < $num_page) {
        $page_next = $page + 1;
        $str_pagging .= "<li> <a href='{$base_url}&page={$page_next}'>Sau</a></li>";
    }
    $str_pagging .= "</ul>";
    return $str_pagging;
}



// <ul class="list-item clearfix">
//         <li>
//             <a href="" title="">Trước</a>
//         </li>
//         <li>
//             <a href="" title="">1</a>
//         </li>
//         <li>
//             <a href="" title="">2</a>
//         </li>
//         <li>
//             <a href="" title="">3</a>
//         </li>
//         <li>
//             <a href="" title="">Sau</a>
//         </li>
// </ul>


function get_list_product_by_brand($brand, $cat_id)
{
    $result = db_fetch_array("SELECT * FROM `tbl_products` WHERE `cat_id` = '{$cat_id}' AND `brand` = '{$brand}' ");

    $list_item = array();
    foreach ($result as $item) {
        $item['url'] = "?mod=products&action=detail_product&id={$item['id']}";
        $list_item[] = $item;
    }
    return $list_item;
}
