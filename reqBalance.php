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
    function notificationId($type){
        $final_unique_id=$type.time().rand(10,100); 
        return $final_unique_id;
    }
    $notificationId = notificationId('NO');

    $sql = "INSERT INTO `notification` (`noId`,`userId`, `amount`) VALUES ('$notificationId', '$userId', '$bal');";
    $result = mysqli_query($db, $sql);
    echo json_encode(array(
        "statusCode"=>1
    ));
}

?>