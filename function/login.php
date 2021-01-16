<?php


session_start();
include __DIR__ . "../../config/connect.php";

class LoginAuth
{
    public $username;
    public $password;

    public function login($request)
    {
        $data = $this->handleRequest($request);
        $query = "SELECT * FROM user WHERE username='{$data->username}' AND password='{$data->password}'";
        $sql = mysqli_query($this->connect(),$query);

        if(mysqli_num_rows($sql)>0)
        {
            $user = mysqli_fetch_assoc($sql);
            $_SESSION["username"] = $user["username"];
            $_SESSION["nama_user"] = $user["nama_user"];
            $_SESSION["email"] = $user["email"];
            $_SESSION["level"] = $user["level"];

            return ["status" => "success", "message" => "Berhasil Login"];
        }else{
            
            return ["status" => "failed", "message" => "Username atau Password Salah!"];
        }
    }

    public function connect()
    {
        global $connect;

        return $connect;
    }

    public function handleRequest($request)
    {
        $this->username = $request["username"];
        $this->password = md5($request["password"]);

        return $this;
    }

}

$login = new LoginAuth();
if (isset($_POST['login'])) {
    $result = $login->login($_POST);
    $message = $result["message"];
    if($result["status"] == "success")
    {
        $url = "document.location='/index.php?page=home';";
        // $url = "";
    }else{
        $url = "window.history.back();";
    }
    echo "<script>alert('$message'); $url </script>";
}