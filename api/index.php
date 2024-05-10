<?php

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:log.php');
};
?>

<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>
<form action="" method="post">
<input type="text" name="search"> 
<input type="submit" name="submit" value="Search">
</form>
<a href="dangxuat.php">Đăng Xuất</a>
<?php
$servername='localhost';
$username='lguicxtd_trandu'; // User mặc định là root
$password='Gold@0836547247';
$dbname = "lguicxtd_vongquay"; // Cơ sở dữ liệu
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
die('Không thể kết nối Database:' .mysql_error());
}

    if(ISSET($_POST['submit'])){
        $keyword = $_POST['search'];
?>

<h1>Bảng Giải Thưởng</h1>

<table id="customers">
  <tr>
    <th>STT</th>
    <th>Tên Khách Hàng</th>
    <th>Năm Sinh</th>
    <th>Phone</th>
    <th>Zalo</th>
    <th>Trúng Giải</th>
    <th>Thời gian trúng</th>
    <th>Khách Hàng Mới</th>
  </tr>
  <?php
   $i = 1;
        if($keyword){
        $query = mysqli_query($conn, "SELECT khachhang.phone, khachhang.hoten, khachhang.namsinh, trung.giaithuong, trung.thoigianquay, khachhang.khachmoi FROM trung INNER JOIN khachhang ON trung.phone=khachhang.phone WHERE trung.phone = $keyword") or die(mysqli_error());
        }else{
          $query = mysqli_query($conn, "SELECT khachhang.phone, khachhang.hoten, khachhang.namsinh, trung.giaithuong, trung.thoigianquay, khachhang.khachmoi FROM trung INNER JOIN khachhang ON trung.phone=khachhang.phone WHERE trung.phone = khachhang.phone ORDER BY trung.thoigianquay DESC;") or die(mysqli_error());
        }
        while($fetch = mysqli_fetch_array($query)){ 
    ?>
  <tr>
    <td># <?php echo $i++; ?> </td>
    <td><?php echo $fetch['hoten']?></td>
    <td><?php echo $fetch['namsinh']?></td>
    <td><?php echo $fetch['phone']?></td>
    <td><a href="https://zalo.me/<?php echo $fetch['phone']?>" target="_blank">Kết Bạn</a></td>
    <td><?php echo $fetch['giaithuong']?></td>
    <td><?php echo $fetch['thoigianquay']?></td>
    <td><?php echo $fetch['khachmoi']?></td>
  </tr>
  <?php
        }
    }
?>
</table>

</body>
</html>

