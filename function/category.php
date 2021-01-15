<?php

include __DIR__ . "../../config/connect.php";

class Category
{
    
    public $nama_kategori;
    public $created_at;
    public $updated_at;

    public function connect()
    {
        global $connect;

        return $connect;
    }

    public function handleRequest($data)
    {
        $this->nama_kategori = $data['nama_kategori'];
        return $this;
    }

    public function find($id)
    {
        $query = "SELECT * FROM kategori WHERE id='$id'";
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
        INSERT INTO kategori 
        (
            nama_kategori,
            created_at
            )
        VALUES
        (
        '{$data->nama_kategori}',        
        '{$data->created_at}'
        )
        ";

        if (mysqli_query($this->connect(), $query)) {
            echo "<script>
            alert('Data {$data->nama_kategori} berhasil disimpan');
            document.location='/index.php?page=index_category';
            </script>";
        } else {
            die(mysqli_error($this->connect()));
        }
    }

    public function destroy($id)
    {
        $query = "DELETE FROM kategori WHERE id='$id'";
        $sql = mysqli_query($this->connect(), $query);
        if ($sql) {
            return true;
        } else {
            return mysqli_errno($sql);
        }
    }

    public function update($request)
    {
        $data = $this->handleRequest($request);
        $data->updated_at  = (new DateTime('now'))->format('Y-m-d H:i:s');
        $id = $request["id"];
        $query = "SELECT id FROM kategori WHERE id='$id'";
        $sql = mysqli_query($this->connect(), $query);
        if (mysqli_num_rows($sql) > 0) {
            $query_update = "UPDATE 
            kategori
            SET
            nama_kategori='{$data->nama_kategori}',
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

$category = new Category();
// var_dump($_POST);
if (isset($_POST['simpan'])) {
    $category->store($_POST);
} else if (isset($_POST['update'])) {
    $result = $category->update($_POST);
    // var_dump($result);
    if ($result["status"] == "success") {
        $message = $result["message"];
        echo "<script>alert('$message'); document.location='/index.php?page=index_category'; </script>";
    } else {
        $message = $result["message"];
        echo "<script>alert('$message'); window.history.back(); </script>";
    }
}
