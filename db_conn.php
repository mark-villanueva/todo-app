<?php 
    $sername="localhost";
    $username="root";
    $pass="";
    $dbname="app_practice_1";

   $conn = new mysqli($sername, $username, $pass,$dbname);

    if ($conn->connect_error) {
        die("Connection failed: "
        . $conn->connect_error);
    }
    
?>