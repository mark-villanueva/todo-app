<?php

function fetch(){
    include "db_conn.php";
    $output=' ';
    $data=mysqli_query($conn,"SELECT * FROM todo OrDER BY id ASC");
    while($row=mysqli_fetch_array($data)){
        $output .= '
                <tr>
                <td>'.' '.$row['task'].'</td>
                </tr>
                ';
    }
    return $output;
}
if(isset($_POST['pdfgen'])){
        require_once('library/tcpdf.php');
        $obj_pdf=new TCPDF('P',PDF_UNIT, PDF_PAGE_FORMAT,true,'UTF-8', false);
        $obj_pdf->SetCreator(PDF_CREATOR);
        $obj_pdf->SetTitle("PLDS To-Do List");
        $obj_pdf->setHeaderData('','',PDF_HEADER_TITLE,PDF_HEADER_STRING);
        $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN,'',PDF_FONT_SIZE_MAIN));
        $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA,'',PDF_FONT_SIZE_DATA));
        $obj_pdf->setDefaultMonospacedFont('helvetica');
        $obj_pdf->setFooterMargin(PDF_MARGIN_FOOTER);
        $obj_pdf->setMargins(PDF_MARGIN_LEFT,'10',PDF_MARGIN_RIGHT);
        $obj_pdf->setPrintHeader(false);
        $obj_pdf->setPrintFooter(false);
        $obj_pdf->setAutoPageBreak(true,10);
        $obj_pdf->setFont('helvetica','12');
        $obj_pdf->AddPage();
        $content='';
        $content .='
            <h4 align="center">PLDS To-Do List</h4><br>
            <table border="1" cellspacing=0>
            <col style="width:50%">
            <col style="width:7%">
            
            <tr>
                <th align="center">Description</th>
                <th align="center">Remarks</th>
            </tr>';
        $content .= fetch();
        $content .= '</table>';
        $obj_pdf -> writeHTML($content);
        $obj_pdf -> Output('ToDoList.pdf','I');
    }
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Report</title>
        <link rel="stylesheet" href="design.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    
    <body>
        <div class="header">
            <h1>PMDS To-Do List (Report)</h1>
        </div>
        <br>
        <div class="report">
            <form  method="POST">
                <input type="submit" name="pdfgen" value="Generate PDF">
            </form>
        </div>
        <br>
        <?php   
            include "db_conn.php";
            $rawdata=mysqli_query($conn,"SELECT * FROM todo");
        ?>
        <div>
            <table class = "report-table" id="mytasks">
    
                
                <tr>
                    <th>Task No.</th>
                    <th>Description</th>   
                </tr>
                <?php 
                    while($row=mysqli_fetch_array($rawdata)){
                ?>
                <tr>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['task']?></td>
                </tr>
                <?php }?>
            </table>
    </body>
</html>