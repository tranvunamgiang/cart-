<?php
// Tính toán ngày giao hàng dự kiến
$today = new DateTime();
$shipping_start = clone $today;
$shipping_end = clone $today;
$shipping_start->modify('+2 days');
$shipping_end->modify('+4 days');
?>
