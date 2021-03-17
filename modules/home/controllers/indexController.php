<?php

function construct()
{
    load_model('index');
}

function indexAction()
{

    $list_mobile = get_list_product_by_cat_id(1);
    $list_laptop = get_list_product_by_cat_id(2);


    $info_cat_mobile = get_info_by_cat_id(1);
    $info_cat_laptop = get_info_by_cat_id(2);

    //lấy toàn bộ sản phẩm
    $list_product = get_list_product();


    $data['list_mobile'] = $list_mobile;
    $data['list_laptop'] = $list_laptop;

    $data['info_cat_mobile'] = $info_cat_mobile;
    $data['info_cat_laptop'] = $info_cat_laptop;



    $data['list_product'] = $list_product;


    load_view('index', $data);
}

function searchAction()
{
    if (isset($_POST['btn-search'])) {
        if (isset($_POST['search'])) {
            $search = $_POST['search'];
        }
       
    }
    $look_up_mobile = search_mobile($search);   
    $look_up_laptop = search_laptop($search);  
    $look_up_all = search_all($search);  
    
    $data['look_up_mobile']=$look_up_mobile;
    $data['look_up_laptop']=$look_up_laptop;
    $data['look_up_all']=$look_up_all;
    $data['search']=$search;


    load_view('search',$data);
}
