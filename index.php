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


    default:
        include __DIR__ . "/pages/admin/dashboard.php";
}
//footer
include __DIR__ . "/layouts/footer.php";
