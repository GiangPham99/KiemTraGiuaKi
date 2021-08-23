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
        include('./db_connection.php');
        $sql = "SELECT can_bo.id_can_bo, can_bo.ten, can_bo.chuc_vu, can_bo.sdt_co_quan, can_bo.sdt_di_dong,
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

    <div class="row bg-light justify-content-around mb-4 p-3">
        <h1>Hệ thống quản lý Danh bạ</h1>
        <h2>Admin</h2>
        <button class="btn btn-secondary" onclick="logout()">Đăng xuất</button>
    </div>

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
                    <td>
                        <input name="full_name" type="text" class="form-control">
                    </td>

                    <td>
                        <input name="chuc_vu" type="text" class="form-control">
                    </td>

                    <td>
                        <input name="sdt_co_quan" type="text" class="form-control">
                    </td>

                    <td>
                        <input name="sdt_di_dong" type="text" class="form-control">
                    </td>

                    <td>
                        <input name="email" type="text" class="form-control">
                    </td>

                    <td>
                        <select name="don_vi" class="custom-select" id="select-don-vi" onchange="selectDonVi(event)">
                            <option selected disabled>...</option>
                            <?php
                                include('./db_connection.php');
                                $sql_don_vi = "SELECT * FROM don_vi";
                                $result_don_vi = mysqli_query($conn, $sql_don_vi);

                                while ($don_vi = mysqli_fetch_array($result_don_vi)) {
                                    echo '<option value='.$don_vi['id_don_vi'].'>'.$don_vi['ten'].'</option>';
                                }
                            ?>
                        </select>
                    </td>

                    <td>
                        <select name="phong_ban" id="select-phong-ban" class="custom-select">
                            <option selected disabled>...</option>
                            <?php
                               include('./db_connection.php');
                               $sql_phong_ban = "SELECT * FROM phong_ban";
                               $result_phong_ban = mysqli_query($conn, $sql_phong_ban);

                               while ($phong_ban = mysqli_fetch_array($result_phong_ban)) {
                                   echo '<option value='.$don_vi['id_phong_ban'].'>'.$phong_ban['ten_phong_ban'].'</option>';
                                }
                            ?>
                        </select>
                    </td>
                </tbody>
            </table>

            <button type="submit" class="btn-save btn btn-success">Lưu</button>
        </form>

        <?php
            function gen_uuid() {
                return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
                    mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
                    mt_rand( 0, 0xffff ),
                    mt_rand( 0, 0x0fff ) | 0x4000,
                    mt_rand( 0, 0x3fff ) | 0x8000,
                    mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
                );
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                include('./db_connection.php');
                $ho_va_ten = mysqli_real_escape_string($conn, $_POST['full_name']);
                $chuc_vu = mysqli_real_escape_string($conn, $_POST['chuc_vu']);
                $sdt_co_quan = mysqli_real_escape_string($conn, $_POST['sdt_co_quan']);
                $sdt_di_dong = mysqli_real_escape_string($conn, $_POST['sdt_di_dong']);
                $email = mysqli_real_escape_string($conn, $_POST['email']);
                $phong_ban = mysqli_real_escape_string($conn, $_POST['phong_ban']);
                $id = gen_uuid();

                $sql_insert = "INSERT INTO can_bo (id_can_bo, ten, chuc_vu, id_phong_ban, sdt_co_quan, sdt_di_dong, email)
                VALUES ('$id', '$ho_va_ten', '$chuc_vu', '$phong_ban', '$sdt_co_quan', '$sdt_di_dong', '$email')";

                $run_insert = mysqli_query($conn,$sql_insert);
                if ($run_insert) {
                    echo "<meta http-equiv='refresh' content='0'>";
                }
            }
        ?>
    </div>

    <div class="container">
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
                    <th>Chức năng</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($row = mysqli_fetch_array($result)) {
                ?>
                        <tr>   
                            <td><?php echo $row['ten'];?></td>
                            <td><?php echo $row['chuc_vu'];?></td>
                            <td><?php echo $row['sdt_co_quan'];?></td>
                            <td><?php echo $row['sdt_di_dong'];?></td>
                            <td><?php echo $row['email'];?></td>
                            <td><?php echo $row['ten_don_vi'];?></td>
                            <td><?php echo $row['ten_phong_ban'];?></td> 
                            <td><a href="editUser.php?id=<?php echo $row['id_can_bo']; ?>"><i class="bi bi-pencil-square"></i></a></td>
                            <td><a href="deleteUser.php?id=<?php echo $row['id_can_bo']; ?>"><i class="bi bi-archive-fill"></i></a></td>
                        </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        var btnSaveEl = document.querySelector(".btn-save")

        function logout () {
            window.location.replace("http://localhost/KiemTraGiuaKi/")
        }

        function selectDonVi (event) {
            var str = event.target.value;
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function(s) {
                document.querySelector('#select-phong-ban').innerHTML = s.currentTarget.response;
            };
            xmlhttp.open("GET", "ajax.php?donvi=" + str, true);
            xmlhttp.send();
        }

        function handleDelete () {
            console.log(id)
        }
    </script>
</body>
</html>
