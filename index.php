<?php

error_reporting(E_ALL);
session_start();
include __DIR__ . "/config/connect.php";
$logged = false;
if (isset($_SESSION['username'])) {
    $logged = true;
    //header
    include __DIR__ . "/layouts/header.php";
    //sidebar
    if ($_SESSION['level'] == "admin") {
        include __DIR__ . "/layouts/sidebar.php";
    }
}
//content
$queries = [
    'page' => ''
];

if (isset($_SERVER['QUERY_STRING'])) {
    parse_str($_SERVER["QUERY_STRING"], $queries);
}
switch ($queries['page']) {

        //product 
    case 'create_product':
        if ($logged) include __DIR__ . "/pages/admin/product/create.php";
        break;

    case 'index_product':
        if ($logged)  include __DIR__ . "/pages/admin/product/index.php";
        else
            header("location:/index.php");
        break;

    case 'edit_product':
        if ($logged)   include __DIR__ . "/pages/admin/product/edit.php";
        else
            header("location:/index.php");
        break;

    case 'delete_product':
        if ($logged)  include __DIR__ . "/pages/admin/product/delete.php";
        else
            header("location:/index.php");
        break;

        //category 
    case 'create_category':
        if ($logged)  include __DIR__ . "/pages/admin/category/create.php";
        else
            header("location:/index.php");
        break;

    case 'index_category':
        if ($logged)  include __DIR__ . "/pages/admin/category/index.php";
        else
            header("location:/index.php");
        break;

    case 'edit_category':
        if ($logged)   include __DIR__ . "/pages/admin/category/edit.php";
        else
            header("location:/index.php");
        break;

    case 'delete_category':
        if ($logged)  include __DIR__ . "/pages/admin/category/delete.php";
        else
            header("location:/index.php");
        break;

        //user 
    case 'create_user':
        if ($logged)   include __DIR__ . "/pages/admin/user/create.php";
        else
            header("location:/index.php");
        break;

    case 'index_user':
        if ($logged)   include __DIR__ . "/pages/admin/user/index.php";
        else
            header("location:/index.php");
        break;

    case 'edit_user':
        if ($logged)   include __DIR__ . "/pages/admin/user/edit.php";
        else
            header("location:/index.php");
        break;

    case 'delete_user':
        if ($logged)   include __DIR__ . "/pages/admin/user/delete.php";
        else
            header("location:/index.php");
        break;

        //Auth
        //login
    case 'login':
        include __DIR__ . "/pages/login.php";
        break;
        //register
    case 'register':
        include __DIR__ . "/layouts/header.php";
        include __DIR__ . "/pages/admin/user/create.php";
        break;
        //logout
    case 'logout':
        include __DIR__ . "/pages/login.php?do=logout";
        break;

        //user

    case 'detail_product':
        include __DIR__ . "/pages/user/detail_product.php";
        break;
    default:
        include __DIR__ . "/pages/dashboard.php";
}
//footer
if (isset($_SESSION['username'])) {
    include __DIR__ . "/layouts/footer.php";
}
