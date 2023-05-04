<?php
include 'connection.php';

$userId = $_POST['userId'];
$balance = $_POST['balance'];

$sql = "UPDATE `notification` SET `status` = '1' WHERE `notification`.`userId` = '$userId';";
$result = mysqli_query($db, $sql);


$sql = "SELECT userBalance as balance FROM `customer` WHERE userId='$userId';";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result);
$userBalance = $row['balance'];

$updatedBalance = (int)$userBalance + (int)$balance; 
$sql = "UPDATE `customer` SET `userBalance` = '$updatedBalance' WHERE `customer`.`userId` = '$userId';";
$result = mysqli_query($db, $sql);
?>