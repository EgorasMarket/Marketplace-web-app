<?php
if (!isset($_COOKIE['walletId'])) {
    $get_url = $_SERVER['QUERY_STRING'];

    $get_url_filtered =  str_replace("url=", "", $get_url);

    $set_url = setcookie("goto", $get_url_filtered, time() + 13600, "/");
    header('Location: /login');
} else {
    $walletId = $_COOKIE['walletId'];
}
