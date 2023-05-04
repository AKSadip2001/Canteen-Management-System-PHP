<?php

include 'connection.php';

$sNo = $_POST['sNo'];
$eName = $_POST['eName'];
$ePrice = $_POST['ePrice'];


$sql = "UPDATE menu SET foodName = '$eName', foodPrice = '$ePrice' WHERE menu.sno = '$sNo'";
mysqli_query($db, $sql);

?>