<?php

// Lấy timestamp hiện tại
$timestamp = time();

// Định dạng timestamp thành chuỗi ngày giờ theo định dạng Y-m-d H:i:s
$formattedDate = date('Y-m-d H:i:s', $timestamp);

// Hiển thị ngày giờ lên màn hình
echo "Ngày giờ hiện tại: " . $formattedDate;

?>
