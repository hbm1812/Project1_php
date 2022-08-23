<?php
include __DIR__ . './DB.php';

class Auth
{
    static public function getDataAll()
    {
        $sql = "select * from login";
        $users = DB::execute($sql);

        return $users;
    }

    static public function register($dataRegister)
    {
        $sql = "insert into login(email, username, password) values(:email, :username, :password)";
        DB::execute($sql, $dataRegister);
    }


    static public function getData($dataLogin)
    {
        $sql = "select * from login where email=:email";
        $user = DB::execute($sql, $dataLogin);
        return count($user) > 0 ? $user[0] : [];
    }

    static public function attempt($dataLogin)
    {

        $sql = "select * from login where email=:email ";
        $user = DB::execute($sql, $dataLogin);
        return count($user) > 0 ? $user[0] : [];
    }


    static public function login($dataLogin)
    {
        $user = Auth::attempt($dataLogin);

        if (count($user) > 0) {
            $checkPass = password_verify($_POST['password'], $user['password']);
            if ($checkPass == true) {
                $_SESSION['message'] = "Login success";
                $_SESSION['dataUser'] = $user['username'];
                $_SESSION['dataEmail'] = $user['email'];
                header("location:./Index.php");
            }
            echo "sai email hoặc mật khẩu!";
        } else {
            echo "email không tồn tại!";
        }
    }

    static public function logout()
    {
        if (isset($_SESSION['message_Logout'])) {
            unset($_SESSION['message']);
            unset($_SESSION['dataUser']);
            unset($_SESSION['message_logout']);
            // header("location:./Login.php");
        }
    }



    static public function find($email)
    {
        $sql = "select * from login where email=:email";
        $dataFind = ['email' => $email];

        $user = DB::execute($sql, $dataFind);

        return count($user) > 0 ? $user[0] : [];
    }

    static public function update($dataUpdate)
    {
        $sql = "update login set username=:username,password=:password where email=:email";
        DB::execute($sql, $dataUpdate);
        $_SESSION['message_update'] = "update success";
        
    }

    // static public function delete($id){
    //     $sql="delete from users where id=:id";
    //     $dataDelete=['id'=>$id];
    //     DB::execute($sql, $dataDelete);
    // }
}
