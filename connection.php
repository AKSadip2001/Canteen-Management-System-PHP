<?php
$db = mysqli_connect("localhost", "root", "", "cms");

if(!$db){
    die("Database connection failed: ".mysqli_connect_error());
}

?>