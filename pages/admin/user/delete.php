<?php
include __DIR__ . "/../../../function/user.php";
if (isset($_GET["id"])) {
    $obj = new User();
    $id = $_GET["id"];
    $user = $obj->find($id);
    if ($user) {
        $delete = $obj->destroy($id);
        if ($delete) {
            echo "<script>alert('data Berhasil dihapus'); document.location='/index.php?page=index_user'; </script>";
        } else {
            echo "<script>alert('data Gagal dihapus'); document.location='/index.php?page=index_user'; </script>";
        }
    } else {
        echo "<script>alert('data tidak ada'); document.location='/index.php?page=index_user'; </script>";
    }
} else {
    echo "<script>alert('parameter tidak sesuai'); document.location='/index.php?page=index_user'; </script>";
}
