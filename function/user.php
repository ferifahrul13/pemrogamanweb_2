<?php

include __DIR__ . "../../config/connect.php";

class User
{

    public $nama_user;
    public $username;
    public $email;
    public $password;
    public $level;
    public $created_at;
    public $updated_at;

    public function connect()
    {
        global $connect;

        return $connect;
    }

    public function handleRequest($data)
    {
        if (isset($data['level'])) {
            $this->level = $data['level'];
        } else {
            $this->level = 'user';
        }
        $this->nama_user = $data['nama_user'];
        $this->username = $data['username'];
        $this->email = $data['email'];
        $this->password = (isset($data["password"]) && $data["password"] != "") ? md5($data["password"]) : null;
        return $this;
    }

    public function find($id)
    {
        $query = "SELECT * FROM user WHERE id='$id'";
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
        INSERT INTO user 
        (
            nama_user,
            username,
            email,
            password,
            level,
            created_at
            )
        VALUES
        (
        '{$data->nama_user}',  
        '{$data->username}',  
        '{$data->email}',  
        '{$data->password}',  
        '{$data->level}',        
        '{$data->created_at}'
        )
        ";

        if (mysqli_query($this->connect(), $query)) {
            echo "<script>
            alert('Data {$data->nama_user} berhasil disimpan');
            document.location='/index.php?page=index_user';
            </script>";
        } else {
            die(mysqli_error($this->connect()));
        }
    }

    public function destroy($id)
    {
        $query = "DELETE FROM user WHERE id='$id'";
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
        $query = "SELECT id,password FROM user WHERE id='$id'";
        $sql = mysqli_query($this->connect(), $query);

        if (mysqli_num_rows($sql) > 0) {
            $user = mysqli_fetch_assoc($sql);
            //jika tidak update password
            if ($data->password == null) {
                $data->password = $user["password"];
            }
            $query_update = "UPDATE 
            user
            SET
            nama_user='{$data->nama_user}',
            username='{$data->username}',
            email='{$data->email}',
            password='{$data->password}',
            level='{$data->level}',
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

    // public function mapperUser()
    // {
    //     $query = "SELECT * from user";
    //     $users = [];
    //     $sql  = mysqli_query($this->connect(), $query);
    //     if (mysqli_num_rows($sql) > 0) {
    //         while ($data = mysqli_fetch_assoc($sql)) {
    //             $users[] = [
    //                 "id" => $data["id"],
    //                 "nama_user" =>  $data["nama_user"]
    //             ];
    //         }
    //     }
    //     return $users;
    // }
}

$user = new User();
// var_dump($_POST);
if (isset($_POST['simpan'])) {
    $user->store($_POST);
} else if (isset($_POST['update'])) {
    $result = $user->update($_POST);
    // var_dump($result);
    if ($result["status"] == "success") {
        $message = $result["message"];
        echo "<script>alert('$message'); document.location='/index.php?page=index_user'; </script>";
        // echo "<script>alert('$message');  </script>";
    } else {
        $message = $result["message"];
        echo "<script>alert('$message'); </script>";
    }
}
