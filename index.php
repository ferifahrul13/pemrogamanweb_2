<?php

error_reporting(E_ALL);

include __DIR__ . "/config/connect.php";

//header
include __DIR__ . "/layouts/header.php";
//sidebar
include __DIR__ . "/layouts/sidebar.php";

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

    default:
        include __DIR__ . "/pages/admin/dashboard.php";
}
//footer
include __DIR__ . "/layouts/footer.php";
