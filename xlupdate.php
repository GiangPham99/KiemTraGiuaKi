<?php
    //Nhận dữ liệu từ users-management.php gửi sang theo phương thức GET
    include("db_connection.php");

    //PHP: mặc định, khi sử dụng theo phương thức GET, mọi giá trị lưu trong 1 biến SIÊU TOÀN CỤC ($_GET) > mảng
    //Giá trị truyền sang nằm sau dấu ? có dạng key=value
    $id_can_sua = $_GET['id'];
    $hoten = $_POST['full_name'];

    //Bước 02: Thực hiện câu truy vấn
    $sql = "UPDATE  can_bo SET ten = '$hoten' WHERE id_can_bo=$id_can_sua";
    $result = mysqli_query($conn,$sql);

    //Bước 03: Xử lý kết quả nếu mysqli_query xóa thành công > trả về true


?>