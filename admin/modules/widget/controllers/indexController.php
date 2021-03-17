<?php

function construct() {
    load_model('index');
}

function indexAction() {
   load_view('index');
}

function add_widgetAction() {
    load_view('widget');
}

function list_widgetAction(){
    load_view('list_widget');
}
