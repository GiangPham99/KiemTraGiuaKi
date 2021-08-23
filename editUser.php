<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh bạ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
     
</head>
<body>

<?php
    //Nhận dữ liệu từ users-management.php gửi sang theo phương thức GET
    include("db_connection.php");

    //PHP: mặc định, khi sử dụng theo phương thức GET, mọi giá trị lưu trong 1 biến SIÊU TOÀN CỤC ($_GET) > mảng
    //Giá trị truyền sang nằm sau dấu ? có dạng key=value
    $id_can_sua = $_GET['id'];
    
    //Bước 02: Thực hiện câu truy vấn
    $sql = "SELECT can_bo.id_can_bo, can_bo.ten, can_bo.chuc_vu, can_bo.sdt_co_quan, can_bo.sdt_di_dong,
    can_bo.email, phong_ban.ten_phong_ban,
    don_vi.ten as ten_don_vi
    FROM can_bo, phong_ban, don_vi
    WHERE can_bo.id_phong_ban = phong_ban.id_phong_ban AND don_vi.id_don_vi = phong_ban.id_don_vi AND id_can_bo=$id_can_sua";
    $result = mysqli_query($conn,$sql);  
?>

<div class="container">
        <form action="" method="POST" onchange="handleForm(event)">
            <table class="form-insert table">
                <thead>
                    <tr>
                        <th>Họ và tên</th>
                        <th>Chức vụ</th>
                        <th>SĐT cơ quan</th>
                        <th>SĐT di động</th>
                        <th>Email</th>
                        <th>Tên đơn vị</th>
                        <th>Tên phòng ban</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                while ($row = mysqli_fetch_array($result)) {
            ?>
                    <td>
                        <input name="full_name" type="text" class="form-control" value="<?php echo $row['ten'];?>">
                    </td>

                    <td>
                        <input name="chuc_vu" type="text" class="form-control"  value="<?php echo $row['chuc_vu'];?>">
                    </td>

                    <td>
                        <input name="sdt_co_quan" type="text" class="form-control"  value="<?php echo $row['sdt_co_quan'];?>">
                    </td>

                    <td>
                        <input name="sdt_di_dong" type="text" class="form-control"  value="<?php echo $row['sdt_di_dong'];?>">
                    </td>

                    <td>
                        <input name="email" type="text" class="form-control"  value="<?php echo $row['email'];?>">
                    </td>

                    <td>
                        <input name="ten_don_vi" type="text" class="form-control"  value="<?php echo $row['ten_don_vi'];?>">
                    </td>

                    <td>
                        <input name="ten_phong_ban" type="text" class="form-control"  value="<?php echo $row['ten_phong_ban'];?>">
                    </td>

                    <td><a href="xlupdate.php?id=<?php echo $row['id_can_bo']; ?>"><i name = "btnUpdate" class="bi bi-archive-fill"></i></a></td>
               
                <?php
                }               
            ?>
</div>

</body>
</html>