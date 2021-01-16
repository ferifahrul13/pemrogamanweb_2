<?php
include __DIR__ . "/../config/connect.php";
include __DIR__ . "/product.php";
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

    public function connect()
    {
        global $connect;

        return $connect;
    }
    public function store($request)
    {
        $data = $this->handleRequest($request);
        $data->created_at  = (new DateTime('now'))->format('Y-m-d H:i:s');
        $data->updated_at  = NULL;

        // var_dump($data) and die();
        $query = "
        INSERT INTO penjualan_header 
        (
            user_id,
            no_nota,
            tanggal,
            total_bayar,
            keterangan,
            
            created_at
            )
        VALUES
        (
        '{$data->user_id}',
        '{$data->no_nota}',
        '{$data->tanggal}',
        '{$data->total_bayar}',
        '{$data->keterangan}',
        
        '{$data->created_at}'
        )
        ";

        if ($sql_header = mysqli_query($this->connect(), $query)) {
            $obj = new Product();
            $header_id =  mysqli_insert_id($this->connect());
            $product = $obj->find($data->produk_id);
            $product_harga = $product["harga"];
            $query_detail = "
        INSERT INTO penjualan_detail 
        (
            penjualan_header_id,
            produk_id,
            qty,
            harga,
            
            created_at
            )
        VALUES
        (
        '{$header_id}',
        '{$data->produk_id}',
        '{$data->qty}',
        '{$product_harga}',
        
        '{$data->created_at}'
        )
        ";
            if ($sql_detail = mysqli_query($this->connect(), $query_detail)) {

                $update_produk = $obj->update([
                    'id' => $product["id"],
                    'kode_produk' => $product["kode_produk"],
                    'nama_produk' => $product["nama_produk"],
                    'satuan' => $product["satuan"],
                    'qty' => $product["qty"] - $data->qty,
                    'deskripsi' => $product["deskripsi"],
                    'status' => $product["status"],
                    'harga' => $product["harga"],
                    'kategori_id' => $product["kategori_id"],
                ]);
                if ($update_produk["status"] == "success") {

                    echo "<script>
                    alert('Produk dibeli, dalam proses pembayaran');
                    document.location='/index.php?page=home';
                    </script>";
                }
            } else {
                die(mysqli_error($this->connect()));
            }
        } else {
            die(mysqli_error($this->connect()));
        }
    }

    public function handleRequest($request)
    {
        $this->user_id = $request["user_id"];
        $this->no_nota = rand(10000000, 90000000);
        $this->tanggal = (new DateTime('now'))->format('Y-m-d');
        $this->total_bayar = 0;
        $this->keterangan = $request["keterangan"];
        $this->produk_id = $request["id"];
        $this->qty = $request["qty"];

        return $this;
    }
}

$transaction = new Transaction();
if (isset($_POST["buy"])) {
    // var_dump($_POST) and die();
    $transaction->store($_POST);
}
