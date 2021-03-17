<?php

function get_list_users() {
    $result = db_fetch_array("SELECT * FROM `tbl_users`");
    return $result;
}

function get_user_by_id($id) {
    $item = db_fetch_row("SELECT * FROM `tbl_users` WHERE `user_id` = {$id}");
    return $item;
}





//lấy danh sách sản phẩm theo cat_id ( điện thoại - laptop)
function get_list_product_by_cat_id($cat_id){
    $result = db_fetch_array("SELECT * FROM `tbl_products` WHERE `cat_id` ={$cat_id}");
        
    $list_item=array();
    foreach($result as $item){
        $item['url']="?mod=products&action=detail_product&id={$item['id']}";
        $list_item[] = $item;
    }
    return $list_item;
}

// lấy danh mục sản phẩm theo cat_id
function get_info_by_cat_id($cat_id)
{
    $result = db_fetch_row("SELECT * FROM `tbl_product_cat` WHERE `id` ={$cat_id}");
    $result['url']="?mod=products&action=index&cat_id={$cat_id}";
    return $result;
}

// lấy toàn bộ sản phẩm
function get_list_product(){
    $result = db_fetch_array("SELECT * FROM `tbl_products`");
    
    $list_item=array();
    foreach($result as $item){
        $item['url']="?mod=products&action=detail_product&id={$item['id']}";
        $list_item[] = $item;
    }
    
    return $list_item;
}


function search_mobile($look_up_mobile){
    $result = db_fetch_array("SELECT * FROM `tbl_products` WHERE `product_title` LIKE '%{$look_up_mobile}%' AND `cat_id`= 1 ");

    $list_item=array();
    foreach($result as $item){
        $item['url']="?mod=products&action=detail_product&id={$item['id']}";
        $list_item[] = $item;
    }
    return $list_item;
    
}


function search_laptop($look_up_laptop){
    $result = db_fetch_array("SELECT * FROM `tbl_products` WHERE `product_title` LIKE '%{$look_up_laptop}%' AND `cat_id`= 2 ");


    $list_item=array();
    foreach($result as $item){
        $item['url']="?mod=products&action=detail_product&id={$item['id']}";
        $list_item[] = $item;
    }
    return $list_item;
}

function search_all($look_up_all){
    $result = db_fetch_array("SELECT * FROM `tbl_products` WHERE `product_title` LIKE '%{$look_up_all}%'  ");

    $list_item=array();
    foreach($result as $item){
        $item['url']="?mod=products&action=detail_product&id={$item['id']}";
        $list_item[] = $item;
    }
    return $list_item;
    
}
