<?php
include 'connection.php';

session_start();
$userId = $_SESSION['userId'];
$_SESSION['userId'] = $userId;

$bal = $_POST['bal'];

$sql = "SELECT count(*) as Result FROM `notification` WHERE `userId`='$userId' AND `status`='0'";
$result = mysqli_query($db, $sql);
$row = $result->fetch_assoc();
$data = $row['Result'];

if($data[0]=='1'){
    echo json_encode(array(
        "statusCode"=>0
    ));
}
else{
    $sql = "INSERT INTO `notification` (`userId`, `amount`) VALUES ('$userId', '$bal');";
    $result = mysqli_query($db, $sql);
    echo json_encode(array(
        "statusCode"=>1
    ));
}

?>