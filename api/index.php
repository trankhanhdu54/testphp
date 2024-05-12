<?php
$servername='sql11.freemysqlhosting.net:3306';
$username='sql11705935'; // User mặc định là root
$password='BVl9mLMdWI';
$dbname = "lguicxtd_vongquay"; // Cơ sở dữ liệu
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
die('Không thể kết nối Database:' .mysql_error());
}

?>
