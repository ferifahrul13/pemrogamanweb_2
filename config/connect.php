<?php

$config = [
    'host'     => 'localhost',
    'user'     => 'ferifahrul',
    'password' => 'password',
    'database' => 'db_toko',

];

$connect = mysqli_connect($config['host'],$config['user'],$config['password'],$config['database']);

if(mysqli_connect_errno())
{
    die('Koneksi gagal. Silahkan cek file connect.php');
}