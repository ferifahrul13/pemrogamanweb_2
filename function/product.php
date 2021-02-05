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
    public $harga_jual;
    public $harga_beli;
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
        $this->harga_beli  = $data['harga_beli'];
        $this->harga_jual  = $data['harga_jual'];
        $this->kategori_id = $data['kategori_id'];
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
            harga_beli,
            harga_jual,
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
        '{$data->harga_beli}',
        '{$data->harga_jual}',
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
            harga_beli='{$data->harga_beli}',
            harga_jual='{$data->harga_jual}',
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

    public function mapperProduct()
    {
        $query = "
        SELECT p.id as id_produk,p.kode_produk,p.nama_produk,p.satuan,p.harga_beli,p.harga_jual,p.qty,p.deskripsi,p.status, kategori.nama_kategori
                                            FROM produk as p 
                                            INNER JOIN kategori
                                            ON p.kategori_id = kategori.id
                                            WHERE status='1' AND qty>0;
                                           
        ";
        $products = [];
        $sql  = mysqli_query($this->connect(), $query);
        if (mysqli_num_rows($sql) > 0) {
            while ($data = mysqli_fetch_assoc($sql)) {
                $products[] = [
                    "id" => $data["id_produk"],
                    "nama_produk" =>  $data["nama_produk"],
                    "kode_produk" =>  $data["kode_produk"],
                    "satuan" =>  $data["satuan"],
                    "qty" =>  $data["qty"],
                    "harga_beli" =>  $data["harga_beli"],
                    "harga_jual" =>  $data["harga_jual"],
                    "deskripsi" =>  $data["deskripsi"],
                    "nama_kategori" =>  $data["nama_kategori"],
                ];
            }
        }
        return $products;
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
