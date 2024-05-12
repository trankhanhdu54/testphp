<?php
$servername='localhost';
$username='lguicxtd_trandu'; // User mặc định là root
$password='Gold@0836547247';
$dbname = "lguicxtd_vongquay"; // Cơ sở dữ liệu
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
die('Không thể kết nối Database:' .mysql_error());
}
?>
