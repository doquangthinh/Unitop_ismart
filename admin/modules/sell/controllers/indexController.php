<?php

function construct() {
    load_model('index');
}

function indexAction() {
   load_view('index');
}


function list_orderAction() {
    load_view('list_order');
}


function list_customerAction() {
    load_view('list_customer');
}
 

function detail_orderAction() {

    $info_order = get_info_order();
    $data['info_order']=$info_order;
    load_view('detail_order',$data);
}
 


 
 
