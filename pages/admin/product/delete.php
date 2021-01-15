<?php
include __DIR__ . "/../../../function/product.php";
if (isset($_GET["id"])) {
    $obj = new Product();
    $id = $_GET["id"];
    $product = $obj->find($id);
    if ($product) {
        $delete = $obj->destroy($id);
        if ($delete) {
            echo "<script>alert('data Berhasil dihapus'); document.location='/index.php?page=index_product'; </script>";
        } else {
            echo "<script>alert('data Gagal dihapus'); document.location='/index.php?page=index_product'; </script>";
        }
    } else {
        echo "<script>alert('data tidak ada'); document.location='/index.php?page=index_product'; </script>";
    }
} else {
    echo "<script>alert('parameter tidak sesuai'); document.location='/index.php?page=index_product'; </script>";
}
