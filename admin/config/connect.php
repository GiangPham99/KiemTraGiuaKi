<?php
define('SITEURL','http://localhost/KiemTraGiuaKi');
define('HOST','localhost');
define('USER','root');
define('PASS','');
define('DB_NAME','dhtl');

$conn = mysqli_connect(HOST,USER,PASS,DB_NAME);
if(!$conn){
    die("Không thể kết nối: ".mysqli_connect_error());
}
?>