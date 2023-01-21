<?php
    $id = $_GET['id']; 
    include 'db_conn.php'; 
    mysqli_query($conn,"DELETE FROM `todo` WHERE id = $id");
    header("location:index.php");
?>