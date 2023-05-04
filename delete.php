<?php
// $data = json_decode(file_get_contents("php://input"), true);
include 'connection.php';

$foodName = $_POST['fName'];
$foodImage = $_POST['fImage'];

if(unlink("Pictures/Food/".$foodImage)){
    $sql = "DELETE FROM `menu` WHERE foodName='$foodName';";
    mysqli_query($db, $sql);
}

header('Refresh: 1; url=adminItemsList.php');

?>