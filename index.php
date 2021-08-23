<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh bạ</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <?php
        include('./db_connection.php');

        $sql = "SELECT can_bo.ten, can_bo.chuc_vu, can_bo.sdt_co_quan, can_bo.sdt_di_dong,
        can_bo.email, phong_ban.ten_phong_ban,
        don_vi.ten as ten_don_vi
        FROM can_bo, phong_ban, don_vi
        WHERE can_bo.id_phong_ban = phong_ban.id_phong_ban AND don_vi.id_don_vi = phong_ban.id_don_vi order by can_bo.ten";

        $result = mysqli_query($conn,$sql);

        if (!$result) {
            die("Không thể thực hiện câu lệnh SQL: " . mysqli_error($conn));
            exit();
        }
    ?>

    <div class="row bg-light mb-4 p-3">
        <h1 class="col-6">Hệ thống quản lý Danh bạ</h1>
        <div class="col-6 d-flex align-items-center">
            <button type="button" class="btn btn-primary" onclick="handleClick()">Đăng nhập</button>
        </div>
    </div>
   
    <div class="container">
        <!-- test -->
<div class="mt-5"> 
                <form action="" method="GET" style = "margin-bottom: 10px;">
                    Search <input type="text" name="search">
                    <input type="submit" name="ok" value="search"  class="btn btn-primary"> 
                </form>
                <?php
                if (isset($_REQUEST['ok'])) {
                    $search = addslashes($_GET['search']);
                    if (empty($search)) {
                        echo "Yeu cau nhap du lieu vao o trong";
                    } else {            
                        $sql1 = "SELECT can_bo.ten, can_bo.chuc_vu, can_bo.sdt_co_quan, can_bo.sdt_di_dong,can_bo.email, phong_ban.ten_phong_ban,don_vi.ten as ten_don_vi
                                    FROM can_bo, phong_ban, don_vi 
                                    WHERE can_bo.id_phong_ban = phong_ban.id_phong_ban AND don_vi.id_don_vi = phong_ban.id_don_vi AND can_bo.ten like '%$search%'";
                        $query = mysqli_query($conn, $sql1);
                        $num = mysqli_num_rows($query);
                        if ($num > 0 && $search != "") {
                ?>
                            <table class="table mt-5 table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Họ và tên</th>
                                        <th scope="col">Chức vụ</th>
                                        <th scope="col">SĐT cơ quan</>
                                        <th scope="col">SĐT di dộng</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Tên đơn vị</th>
                                        <th scope="col">Tên phòng ban</th>
                                    </tr>
                                </thead>
                                <?php
                                while ($row = mysqli_fetch_assoc($query)) {
                                ?>
                                    <tr>
                                        <td><?php echo $row['ten']; ?></td>
                                        <td><?php echo $row['chuc_vu']; ?></td>
                                        <td><?php echo $row['sdt_co_quan']; ?></td>
                                        <td><?php echo $row['sdt_di_dong']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['ten_don_vi']; ?></td>
                                        <td><?php echo $row['ten_phong_ban']; ?></td>
                                    </tr>
                    <?php
                                }
                            } else {
                                echo "Khong tim thay ket qua!";
                            }
                        }
                    }
                    ?>
            </div>

<!-- ket thuc test -->
        <table class="table">
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
                        echo '<tr>
                            <td>'.$row['ten'].'</td>
                            <td>'.$row['chuc_vu'].'</td>
                            <td>'.$row['sdt_co_quan'].'</td>
                            <td>'.$row['sdt_di_dong'].'</td>
                            <td>'.$row['email'].'</td>
                            <td>'.$row['ten_don_vi'].'</td>
                            <td>'.$row['ten_phong_ban'].'</td>
                        </tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        function handleClick() {
            window.location.replace("http://localhost/KiemTraGiuaKi/login.php");
        }
    </script>
</body>
</html>
