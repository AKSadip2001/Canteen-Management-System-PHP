<?php
include 'connection.php';
include 'verification.php';

$sql = "SELECT userBalance FROM `customer` WHERE userId='2022700'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result)
?>