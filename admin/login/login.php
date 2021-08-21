<?php

include("../config/connect.php");

if(isset($_POST['username']) && isset($_POST['password'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = validate($_POST['username']);
    $pass = validate($_POST['password']);

    if(empty($username)){
        header("Location: index-login.php?error=User Name is requied");
        exit();
    }else if(empty($pass)){
        header("Location : index-login.php?error=Password is requied");
        exit();
    }else{
        $sql = "SELECT *FROM tbl_nguoidung WHERE tenNguoiDung = '$username' AND matKhau='$pass'";

        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result)){
            $row = mysqli_fetch_assoc($result);
            if($row['user_name'] === $username && $row['password'] === $pass){
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['fullname'] = $row['fullname'];
                $_SESSION['id'] = $row['id'];
                header("Location: index.php");
                exit();
            }else{
                header("Location: index-login.php?error=Incorect User name or password");
                exit();
            }
        }else{
            header("Location: index-login.php?error=Incorect User name or password");
            exit();
        }
    }
}else{
    header("Location: index-login.php");
    exit();
}
?>