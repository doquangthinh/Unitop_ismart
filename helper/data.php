<?php

function show_array($data)
{
    if (is_array($data)) {
        echo "<pre>";
        print_r($data);
        echo "<pre>";
    }
}

function get_num_order_cart()
{
    if (isset($_SESSION['cart'])) {
        return $_SESSION['cart']['info']['num_order'];
    }
    return false;
}


function get_total_order_cart()
{
    if (isset($_SESSION['cart'])) {
        return $_SESSION['cart']['info']['total'];
    }
    return false;
}
