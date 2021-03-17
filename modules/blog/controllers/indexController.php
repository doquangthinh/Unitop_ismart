<?php

function construct() {
    load_model('index');
}

function indexAction() {

    $num_rows = db_num_rows("SELECT * FROM `tbl_blog` WHERE `status` = 'active' ");
    $num_per_page = 3;          //số bản ghi mỗi trang 
    $total_row = $num_rows;     // tổng số bản ghi
    $num_page = ceil($total_row / $num_per_page);  // làm tròn trần // tổng số bản ghi chia số bản ghi trên mỗi trang
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // trang hiện tại
    $start = ($page - 1) * $num_per_page; // trang bắt dầu
    $list_blog = get_blog($start, $num_per_page,"`status` = 'active' ");
    // $list_users=get_users($start, $num_per_page,"`gender`=male"); kèm theo điều kiện giới tính = nam
    // lấy từ  start= 0 và lấy 4 bản ghi 
    $data['list_blog'] = $list_blog;
    $data['page'] = $page;
    $data['num_page'] = $num_page;

   load_view('index',$data);

}

function addAction() {
    
}

function editAction() {
   
}

function mainAction(){
    echo 'bài viết';
}
