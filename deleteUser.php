<?php
    //Nhận dữ liệu từ users-management.php gửi sang theo phương thức GET
    include("db_connection.php");

    //PHP: mặc định, khi sử dụng theo phương thức GET, mọi giá trị lưu trong 1 biến SIÊU TOÀN CỤC ($_GET) > mảng
    //Giá trị truyền sang nằm sau dấu ? có dạng key=value
    $id_can_xoa = $_GET['id'];
    
    //Bước 02: Thực hiện câu truy vấn
    $sql = "DELETE FROM can_bo WHERE id_can_bo=$id_can_xoa";
    $result = mysqli_query($conn,$sql);

    //Bước 03: Xử lý kết quả nếu mysqli_query xóa thành công > trả về true
    if($result == true){
        header('location:'.'http://localhost/KiemTraGiuaKi'.'/admin.php');
    }

?>