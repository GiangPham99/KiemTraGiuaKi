<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
    <h1 class="p-3 bg-light">Hệ thống quản lý Danh bạ</h1>
    <form action="" method="post" style="width: 400px; margin: auto; margin-top: 200px">
        <input name="username" type="text" class="form-control mb-2" placeholder="Username">
        <input name="password" type="password" class="form-control mb-2" placeholder="Password">
        <button type="submit" class="btn btn-primary mb-2">Đăng nhập</button>
        <p class="text-center text-primary" role="button" onclick="handleClickHome()">Quay lại trang chủ</p>
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            include('./db_connection.php');
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $password = mysqli_real_escape_string($conn, $_POST['password']);

            $sql = "SELECT * FROM account WHERE user_name = '$username' AND password = '$password'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_array($result);

            $count = mysqli_num_rows($result);

            if($count == 1) {
                echo '<p class="text-center text-success">Đăng nhập thành công</p>';
                header('Location: http://localhost/KiemTraGiuaKi/admin.php');

            } else {
                echo '<p class="text-center text-danger">Tài khoản hoặc mật khẩu không đúng. Xin thử lại!</p>';
            }
        }
    ?>

    <script>
        function handleClickHome() {
            window.location.replace("http://localhost/ktgiuaky/");
        }
    </script>
</body>
</html>
