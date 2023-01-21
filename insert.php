<?php
    $task= $_POST['task'];
    include 'db_conn.php';
    mysqli_query($conn,"INSERT INTO `todo`(`task`) VALUES ('$task')"); 
    header("location:index.php");
?>