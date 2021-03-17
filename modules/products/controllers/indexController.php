<?php

function construct()
{
    load_model('index');
}


// xử lí đổ dữ liệu sản phẩm điện thoại và laptop 
function indexAction()
{
    // lấy danh mục sản phẩm
    $cat_id = (int) !empty($_GET['cat_id']) ? $_GET['cat_id'] : '1';
    $info_cat = get_info_by_cat_id($cat_id);

    // lấy dữ liệu sản phẩm theo cat_id
    $list_item = get_list_product_by_cat_id($cat_id);

    // $data['list_item'] = $list_item;
    $data['info_cat'] = $info_cat;
    $num_rows = db_num_rows("SELECT * FROM `tbl_products` WHERE `cat_id`='{$cat_id}'");
    $num_per_page = 4;          //số bản ghi mỗi trang 
    $total_row = $num_rows;     // tổng số bản ghi
    $num_page = ceil($total_row / $num_per_page);  // làm tròn trần // tổng số bản ghi chia số bản ghi trên mỗi trang

    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // trang hiện tại
    $start = ($page - 1) * $num_per_page; // trang bắt dầu

    $list_products = get_products($start, $num_per_page, " `cat_id`= {$cat_id}");
    // $list_users=get_users($start, $num_per_page,"`gender`=male"); kèm theo điều kiện giới tính = nam
    // lấy từ  start= 0 và lấy 4 bản ghi 


    $data['list_products'] = $list_products;
    $data['page'] = $page;
    $data['num_page'] = $num_page;
    $data['num_rows'] = $num_rows;

    load_view('category_product', $data);
}


// xử lí chi tiết mỗi sản phẩm
function detail_productAction()
{
    //lấy dữ liệu sản phẩm theo id
    $id = (int)$_GET['id'];
    $item = get_product_by_id($id);
    $data['item'] = $item;
    load_view('detail_product', $data);
}



// sx san pham
function filterAction()
{
    // $cat_id = (int) ($_GET['cat_id']);
    $cat_id = (int) !empty($_GET['cat_id']) ? $_GET['cat_id'] : '';
    $info_cat = get_info_by_cat_id($cat_id);

    global $brand ,$price,$error;
    if (isset($_POST['btn-filter'])) {

        $error = array();

        if (empty($_POST['r-price'])) {
            $error['price'] = "Bạn chưa chọn giá";
        } else {
            $price = $_POST['r-price'];
        }


        if (empty($_POST['r-brand'])) {
            $error['brand'] = "Bạn chưa chọn hãng ";
        } else {
            $brand = $_POST['r-brand'];
        }

        $filter = filter($price, $brand, $cat_id);  
        $data['filter'] = $filter;
        $data['info_cat'] = $info_cat;

        // $data['price'] = $price;
        // $data['brand'] = $brand;

        load_view('category_product_filter', $data);
       
    }
    
}





// lọc sản phẩm theo tên ,giá 
function sortAction()
{

    $cat_id = (int) !empty($_GET['cat_id']) ? $_GET['cat_id'] : '1';
    $info_cat = get_info_by_cat_id($cat_id);

    if (isset($_POST['btn-sort'])) {

        if (isset($_POST['select'])) {
            $sort = $_POST['select'];
        }

        // echo $sort;
    }

    $select_sort_mobile = sort_mobile($sort);
    $select_sort_laptop = sort_laptop($sort);

    $data['select_sort_mobile'] = $select_sort_mobile;
    $data['select_sort_laptop'] = $select_sort_laptop;

    $data['info_cat'] = $info_cat;

    load_view('sort_product', $data);
}


function sub_menuAction(){

    $brand = $_GET['brand'];
    $cat_id=$_GET['cat_id'];
    $info_cat = get_info_by_cat_id($cat_id);
    $list_product_by_brand = get_list_product_by_brand($brand,$cat_id);

    $data['list_product_by_brand']= $list_product_by_brand;
    $data['info_cat']=$info_cat;
    $data['brand']=$brand;
    load_view('index',$data);
}

function show_productAction(){
    
    $num_rows = db_num_rows("SELECT * FROM `tbl_products` ");
    $num_per_page = 8;          //số bản ghi mỗi trang 
    $total_row = $num_rows;     // tổng số bản ghi
    $num_page = ceil($total_row / $num_per_page);  // làm tròn trần // tổng số bản ghi chia số bản ghi trên mỗi trang
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // trang hiện tại
    $start = ($page - 1) * $num_per_page; // trang bắt dầu
    $list_products = get_products($start, $num_per_page,);
    // $list_users=get_users($start, $num_per_page,"`gender`=male"); kèm theo điều kiện giới tính = nam
    // lấy từ  start= 0 và lấy 4 bản ghi 


    $data['list_products'] = $list_products;
    $data['page'] = $page;
    $data['num_page'] = $num_page;

    load_view('show_product', $data);
}