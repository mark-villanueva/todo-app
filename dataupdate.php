<?php
    $task= $_POST['task'];
    $id= $_POST['id'];
    include 'db_conn.php';
    mysqli_query($conn,"UPDATE `todo` SET `task`='$task' where id=$id");
    header("location:index.php");


?>