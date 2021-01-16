<?php

error_reporting(E_ALL);
session_start();
include __DIR__ . "/config/connect.php";

if (isset($_SESSION['username'])) {
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
        include __DIR__ . "/pages/admin/product/create.php";
        break;

    case 'index_product':
        include __DIR__ . "/pages/admin/product/index.php";
        break;

    case 'edit_product':
        include __DIR__ . "/pages/admin/product/edit.php";
        break;

    case 'delete_product':
        include __DIR__ . "/pages/admin/product/delete.php";
        break;

        //category 
    case 'create_category':
        include __DIR__ . "/pages/admin/category/create.php";
        break;

    case 'index_category':
        include __DIR__ . "/pages/admin/category/index.php";
        break;

    case 'edit_category':
        include __DIR__ . "/pages/admin/category/edit.php";
        break;

    case 'delete_category':
        include __DIR__ . "/pages/admin/category/delete.php";
        break;

        //user 
    case 'create_user':
        include __DIR__ . "/pages/admin/user/create.php";
        break;

    case 'index_user':
        include __DIR__ . "/pages/admin/user/index.php";
        break;

    case 'edit_user':
        include __DIR__ . "/pages/admin/user/edit.php";
        break;

    case 'delete_user':
        include __DIR__ . "/pages/admin/user/delete.php";
        break;

        //Auth
        //login
    case 'login':
        include __DIR__ . "/pages/login.php";
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
