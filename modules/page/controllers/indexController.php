<?php

function construct() {
   load_model('index');
}

function indexAction() {

   $id=(int) $_GET['id'];
   $item=get_page_by_id($id);
   $data['item']=$item;
   load_view('index',$data);
}



