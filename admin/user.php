<?php
include("./config/connect.php");

// if (!isset($_SESSION['login'])) {
//     header('location:http://localhost:8080/btl/admin/login/login.php');
// }
include("./component/header.php");
?>
<div class="container">
    <main>
        <h2 class="mt-5">Users Management</h2>
        <div>
            <a href="add-user.php" class="btn btn-primary mt-5">Add New User</a>
        </div>
        <div class="row main-content mt-5">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Full Name</th> 
                        <th scope="col">Email</th> 
                        <th scope="col">Address</th>
                        <th scope="col">Activation Date</th>
                        <th scope="col">Date Founded</th>
                        <th scope="col">Change Password</th>
                        <th scope="col">Update</th>
                        <th scope="col">Delete</tsh>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //Lặp lấy dữ liệu và hiển thị ra bảng
                    //Bước 02: Thực hiện Truy vấn
                    $sql = "SELECT * FROM dangnhap";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        $i = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td> <?php echo $row['user_name']; ?> </td>
                                <td> <?php echo $row['fullname']; ?></td>
                                <td> <?php echo $row['email']; ?></td>
                                <td> <?php echo $row['address']; ?></td>
                                <td> <?php echo $row['activation_date']?></td>
                                <td> <?php echo $row['date_f']?></td>
                                <td><a href="./login/changeUser.php?myid<?php echo $row['id']; ?>"><i class="bi bi-pencil-fill"></i></a></td>
                                <td><a href="editUser.php?myid=<?php echo $row['id']; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a href="./login/deleteUser.php?myid=<?php echo $row['id']; ?>"><i class="bi bi-archive-fill"></i></a></td>
                            </tr>
                    <?php
                            $i++;
                        }
                    }
                    ?>


                </tbody>
            </table>

        </div>
    </main>
</div>
