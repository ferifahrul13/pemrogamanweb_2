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

    public function find($id)
    {
        $query = "SELECT * FROM produk WHERE id='$id'";
        $sql = mysqli_query($this->connect(), $query);
        if (mysqli_num_rows($sql) > 0) {
            return mysqli_fetch_array($sql);
        } else {
            return false;
        }
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

    public function destroy($id)
    {
        $query = "DELETE FROM produk WHERE id='$id'";
        $sql = mysqli_query($this->connect(), $query);
        if ($sql) {
            return true;
        } else {
            return mysqli_error($sql);
        }
    }

    public function update($request)
    {
        $data = $this->handleRequest($request);
        $data->updated_at  = (new DateTime('now'))->format('Y-m-d H:i:s');
        $id = $request["id"];
        $query = "SELECT id FROM produk WHERE id='$id'";
        $sql = mysqli_query($this->connect(), $query);
        if (mysqli_num_rows($sql) > 0) {
            $query_update = "UPDATE 
            produk
            SET
            kode_produk='{$data->kode_produk}',
            nama_produk='{$data->nama_produk}',
            satuan='{$data->satuan}',
            qty='{$data->qty}',
            deskripsi='{$data->deskripsi}',
            status='{$data->status}',
            harga='{$data->harga}',
            kategori_id='{$data->kategori_id}',
            updated_at='{$data->updated_at}'
            WHERE id='$id';
             ";
            $sql_update = mysqli_query($this->connect(), $query_update);
            if ($sql_update) {
                return ['status' => 'success', 'message' => 'berhasil update'];
            }
            return ['status' => 'failed', 'message' => mysqli_error($sql_update)];
        }
    }
}

$product = new Product();
if (isset($_POST['simpan'])) {
    $product->store($_POST);
} else if (isset($_POST['update'])) {
    $result = $product->update($_POST);
    if ($result["status"] == "success") {
        $message = $result["message"];
        echo "<script>alert('$message'); document.location='/index.php?page=index_product'; </script>";
    } else {
        $message = $result["message"];
        echo "<script>alert('$message'); window.history.back(); </script>";
    }
}
