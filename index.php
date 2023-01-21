<? //main page ?>
<!DOCTYPE html>
<html lang="en">
    <head> 
         <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <title>Todo</title>
        <link rel="stylesheet" href="design.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    <body onload="startTime()";>>  

    <!--<script type="text/javascript">
            alert("Good day! Take note your tasks by our To-Do List Web Application!")
        </script>-->  
        
        <div class="header"> 
        <span id="txt">
                <script type="text/javascript">
                   //  alert("Good day! Take note your tasks by our To-Do List Web Application!")
                    function startTime() {
                        const today = new Date();
                        let day = today.toDateString();
                        let h = today.getHours();
                        let m = today.getMinutes();
                        let s = today.getSeconds();
                        m = checkTime(m);
                        s = checkTime(s);
                        document.getElementById('txt').innerHTML =  day + " " + h + ":" + m + ":" + s;
                        setTimeout(startTime, 1000);
                    }
                        
                    function checkTime(i) {
                        if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
                        return i;
                    }
                </script>
            </span>
            <h1>PMDS To-Do List</h1>
        </div>
        <br>
        <div class="task">
            <form action="insert.php" method="POST">
                <input type="text" required name="task" autocomplete="off" placeholder="What is your task for today?">
                <input type="submit" name="Submit" value="Add">
            </form>
            <a href="report.php" target="_blank" rel="noopener"><button class="update">Export PDF</button></a>
        </div>
        <br>
        <!--Implement database connection for querry -->
        <?php   
             include "db_conn.php"; 
             $last_index = mysqli_query($conn,"SELECT MAX(id) FROM todo");
             $rawdata=mysqli_query($conn,"SELECT * FROM todo");
        ?>
        <div >
            <table id="mytasks">
                <col class="col1" >
                <col class="col2" >
                <col class="col3">
                
                <tr>
                    <th>Task No.</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
                <!-- showing of data (table) -->
                <?php 
                    while($row=mysqli_fetch_array($rawdata)){
                ?>
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['task']?></td>
                    <td><a href="update.php? id=<?php echo $row['id']?>"><button class="edit">Edit</button></a>&nbsp;
                        <a href="delete.php? id=<?php echo $row['id']?>"><button class="delete">Delete</button></a></td>
                </tr>
                <?php }?>
            </table> 
            </span>
        </div>
    </body>
</html>