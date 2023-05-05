<?php
include 'connection.php';

session_start();
$userId = $_SESSION['userId'];
$_SESSION['userId'] = $userId;

$itemNames = $_POST['itemNames'];
$totalBill = $_POST['totalBill'];
$totalItems = $_POST['totalItems'];

function orderId($type)
{
   $final_unique_id=$type.time().rand(10,100); 
   return $final_unique_id;
}
$orderId = orderId('OD');

$sql = "SELECT userBalance FROM `customer` WHERE userId='$userId'";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result);
$userBalance = $row['userBalance'];

$updatedBalance = $userBalance - $totalBill;

if($updatedBalance>=0){
    $sql = "UPDATE `customer` SET `userBalance` = '$updatedBalance' WHERE `customer`.`userId` = '$userId';";
    $result = mysqli_query($db, $sql);


    $sql = "INSERT INTO `orders` (`orderId`, `userId`, `itemNames`, `totalItems`, `totalBill`, `orderTime`) VALUES ('$orderId', '$userId', '$itemNames', '$totalItems', '$totalBill', current_timestamp());";
    $result = mysqli_query($db, $sql);

    echo json_encode(array(
        "statusCode"=>1
    ));
}
else{
    echo json_encode(array(
        "statusCode"=>0
    ));
}


?>