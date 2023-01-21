<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Update To-do list</title>
        <link rel="stylesheet" href="design.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    <body>
        <div class="header">
            <h1>Update PMDS To-Do List</h1>
        </div>
        <br>
        <?php 
            $id = $_GET['id'];
            include "db_conn.php";
            $rawdata=mysqli_query($conn,"SELECT * FROM todo where id = $id");
            $data=mysqli_fetch_array($rawdata)
        ?>
        <div class="task">
            <form action="dataupdate.php" method="POST">
                <input type="text" name="task" required autocomplete="off" value="<?php echo $data['task']?>">
                <input type="submit" class="update" value="Update"> 
                <input type="hidden" name="id" required autocomplete="off" value=" <?php echo $data['id']?>">
            </form>
        </div>
    </body>
</html>