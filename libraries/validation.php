<?php

use function Aws\filter;

function is_username($username) {
    $pattern = "/^[A-Za-z0-9_\.]{6,32}$/";
    if (!preg_match($pattern, $username, $matchs))
        return FALSE;
    return TRUE;
}

function is_password($password) {
    $pattern = "/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";
    if (!preg_match($pattern, $password, $matchs))
        return FALSE;
    return TRUE;
}

// function is_email($email){
//     if(!filter_var($email,FILLTER_VALIDATE_EMAIL)){
//         return false;
//     }
//     return true;
// }

function form_error($label_field) {
    global $error; // BIẾN TOÀN CỤC
    if (!empty($error[$label_field]))
        return " <p class='error'> $error[$label_field] </p>";
}

function set_value($label_field) { // Một $ là Tên Trường
    global $$label_field; // Hai $ là tên Biến
    if (!empty($$label_field))
        return $$label_field;
}

function is_number($number) {
   
    $pattern = "/^(09|03|07|08|05)+([0-9]{8})$/";
    if (!preg_match($pattern, $number, $matchs))
        return FALSE;
    return TRUE;
}

?>