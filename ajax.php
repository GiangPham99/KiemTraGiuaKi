<?php
    if(isset($_GET['donvi'])) {
        $id_don_vi = $_GET['donvi'];
        include('./db_connection.php');
        $sql_don_vi = "SELECT * FROM phong_ban, don_vi WHERE don_vi.id_don_vi = '$id_don_vi' AND don_vi.id_don_vi = phong_ban.id_don_vi";
        $result_don_vi = mysqli_query($conn, $sql_don_vi);

        while ($don_vi = mysqli_fetch_array($result_don_vi)) {
            echo '<option value='.$don_vi['id_phong_ban'].'>'.$don_vi['ten_phong_ban'].'</option>';
        }
    }
?>