<?php

include __DIR__."/../config/connect.php";

class Transaction
{
    public $user_id;
    public $no_nota;
    public $tanggal;
    public $total_bayar;
    public $keterangan;
    public $penjualan_header_id;
    public $produk_id;
    public $qty;
    public $harga;
    public $created_at;
    public $updated_at;

    public function store($request)
    {
        $data = $this->handleRequest($request);
    }

    public function handleRequest($request)
    {
        
    $this->user_id = $request["user_id"];
    $this->no_nota = $request["no_nota"];
    $this->tanggal = $request["tanggal"];
    $this->total_bayar = $request["total_bayar"];
    $this->keterangan = $request["keterangan"];
    $this->penjualan_header_id = $request["penjualan_header_id"];
    $this->produk_id= $request["produk_id"];
    $this->qty= $request["qty"];
    $this->harga = $request["harga"];
    }
}