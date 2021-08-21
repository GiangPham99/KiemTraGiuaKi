<?php
    include("../config/connect.php");
    $id_can_xoa = $_GET['id'];
    $sql = "DELETE FROM dangnhap WHERE id=$id_can_xoa";
    $result = mysqli_query($conn,$sql);
    if($result == true){
        header('location:http://localhost:8080/kiemtragiuaki/admin/login/user.php');
    }
?>