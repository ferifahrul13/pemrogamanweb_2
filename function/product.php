<?php

include __DIR__ . "../../config/connect.php";

class Product
{
    public $kode_produk;
    public $nama_produk;
    public $satuan;
    public $qty;
    public $deskripsi;
    public $status;
    public $harga;
    public $foto_produk;
    public $kategori_id;
    public $created_at;
    public $updated_at;

    public function connect()
    {
        global $connect;

        return $connect;
    }

    public function handleRequest($data)
    {
        $this->kode_produk = $data['kode_produk'];
        $this->nama_produk = $data['nama_produk'];
        $this->satuan      = $data['satuan'];
        $this->qty         = $data['qty'];
        $this->deskripsi   = $data['deskripsi'];
        $this->status      = $data['status'];
        $this->harga       = $data['harga'];
        $this->kategori_id = $data['kategori_id'];

        // $name = $data['foto_produk']['name'];
        // // $target_dir = __DIR__ .'/'.'upload/';
        // $target_file = basename($name);
        // // Select file type
        // $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // $fotoBase64 = base64_encode(file_get_contents($data['foto_produk']['tmp_name']));
        // $this->foto_produk = 'data:image/'.$imageFileType.';base64,'.$fotoBase64;

        // Upload file
        // move_uploaded_file($data['foto_produk']['tmp_name'],$target_dir.$name);



        return $this;
    }

    public function store($request)
    {
        $data = $this->handleRequest($request);
        $data->created_at  = (new DateTime('now'))->format('Y-m-d H:i:s');
        // $data->updated_at  = NULL;

        $query = "
        INSERT INTO produk 
        (
            kode_produk,
            nama_produk,
            satuan,
            qty,
            deskripsi,
            status,
            harga,
            kategori_id,
            
            created_at
            )
        VALUES
        (
        '{$data->kode_produk}',
        '{$data->nama_produk}',
        '{$data->satuan}',
        '{$data->qty}',
        '{$data->deskripsi}',
        '{$data->status}',
        '{$data->harga}',
        '{$data->kategori_id}',
        
        '{$data->created_at}'
        )
        ";

        if (mysqli_query($this->connect(), $query)) {
            echo "<script>
            alert('Data {$data->nama_produk} berhasil disimpan');
            document.location='/index.php?page=index_product';
            </script>";
        } else {
            die(mysqli_error($this->connect()));
        }
    }

    public function destroy($request, $id)
    { }

    public function update($request, $id)
    { }
}

$product = new Product();
// var_dump($_POST);
if (isset($_POST['simpan'])) {
    $product->store($_POST);
} else if (isset($_POST['update'])) {
    $product->update($_POST, $_GET['id']);
} else if (isset($_POST['delete'])) {
    $product->destroy($_POST, $_GET['id']);
} else {
    echo 'tidak ada request';
}
