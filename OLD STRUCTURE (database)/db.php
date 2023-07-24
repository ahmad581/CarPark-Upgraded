<?php

$parkingPrice = 3.33333333;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$connection = mysqli_connect('localhost', 'root', '', 'carpark');

if(!$connection){
    header("Location: ErrorPage.php");
    exit();
}

?>