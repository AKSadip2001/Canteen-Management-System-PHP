<?php
include 'connection.php';

$orderId = $_POST['orderId'];

$sql = "UPDATE `orders` SET `status` = '1' WHERE `orders`.`orderId` = '$orderId';";
$result = mysqli_query($db, $sql);
?>