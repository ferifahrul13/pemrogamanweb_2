<?php
include __DIR__ . "/../../../function/category.php";
if (isset($_GET["id"])) {
    $obj = new Category();
    $id = $_GET["id"];
    $category = $obj->find($id);
    if ($category) {
        $delete = $obj->destroy($id);
        if ($delete) {
            echo "<script>alert('data Berhasil dihapus'); document.location='/index.php?page=index_category'; </script>";
        } else {
            echo "<script>alert('data Gagal dihapus'); document.location='/index.php?page=index_category'; </script>";
        }
    } else {
        echo "<script>alert('data tidak ada'); document.location='/index.php?page=index_category'; </script>";
    }
} else {
    echo "<script>alert('parameter tidak sesuai'); document.location='/index.php?page=index_category'; </script>";
}
