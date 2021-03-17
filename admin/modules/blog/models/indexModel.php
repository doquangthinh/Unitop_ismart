<?php

function get_list_users() {
    $result = db_fetch_array("SELECT * FROM `tbl_users`");
    return $result;
}

function get_user_by_id($id) {
    $item = db_fetch_row("SELECT * FROM `tbl_users` WHERE `user_id` = {$id}");
    return $item;
}

function get_list_blog(){
    $result = db_fetch_array("SELECT * FROM `tbl_blog`");
    return $result;
}

// function get_list_blog_active(){
//     $result = db_fetch_array("SELECT * FROM `tbl_blog` WHERE `status` = 'active' ");
//     return $result;
// }

function get_list_blog_deactive(){
    $result = db_fetch_array("SELECT * FROM `tbl_blog` WHERE `status` = 'deactive'");
    return $result;
}



function get_list_blog_active($start, $num_per_page, $where = "")
{
    if (!empty($where))
        $where = "WHERE {$where}";
    $list_blog = db_fetch_array("SELECT * FROM `tbl_blog` {$where} LIMIT {$start}, {$num_per_page} ");
    return $list_blog;

    // $list_item = array();
    // foreach ($list_products as $item) {
    //     $item['url'] = "?mod=products&action=detail_product&id={$item['id']}";
    //     $list_item[] = $item;
    // }
    // return $list_item;
}

function count_list_blog_active(){
    $result = db_fetch_array("SELECT * FROM `tbl_blog` WHERE `status` = 'active'");
    return $result;
}


function get_pagging($num_page, $page, $base_url = "")
{
    
    $str_pagging = "<ul id='list-paging' class='fl-right'>";

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

// <ul id="list-paging" class="fl-right">
//                         <li>
//                             <a href="" title=""><</a>
//                         </li>
//                         <li>
//                             <a href="" title="">1</a>
//                         </li>
//                         <li>
//                             <a href="" title="">2</a>
//                         </li>
//                         <li>
//                             <a href="" title="">3</a>
//                         </li>
//                         <li>
//                             <a href="" title="">></a>
//                         </li>
//                     </ul>


function add_blog($data){
    return db_insert('tbl_blog', $data);
}

