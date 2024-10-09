<?php 
// cap nhat trang thai da tra tien paid=>1
require_once("./functions/db.php");
$order_id = $_GET("order_id"); // lay lai id don hang vua tao 
$sql = "update orders set paid=1 where id=$order_id"; // update lai muc paid de bao rang da thanh toan
insert($sql);

// chuyen ve trang thank you
header("Location: /thankyou.php?order_id=$order_id");
?>
