<?php
require_once('../dbcon.php');
$result = mysqli_query($con, "SELECT * FROM `students` ");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print All Stundets</title>
    <style type="text/css">
        body {
            margin: 0;
        }
        .print-area {
            width: 755px;
            height: 1050px;
            margin: auto;
            box-sizing: border-box;
            page-break-after: always;
        }
        .header {
            text-align: center;
        }
        .header h3 {
            margin: 0;
        }
        .data-info table {
            width: 100%;
            border-collapse: collapse;
        }
        .data-info table td{
            border: 1px solid #555;
            padding: 4px;
            line-height: 1em;
        }
    </style>
</head>
<body onload="window.print()">
        <?php 
            $s1 = 1;
            $total = mysqli_num_rows($result);
            echo page_header();
            while ($row = mysqli_fetch_assoc($result)){
                
                ?>
                 <tr>
                    <td><?= $row['firstname'] .' '. $row['lastname'] ?></td>
                    <td><?= $row['roll'] ?></td>
                    <td><?= $row['phone'] ?></td>
                    <td><?= $row['email'] ?></td>
                </tr>
            <?php
            }
        ?>
                
        <?php echo page_footer(); ?>
</body>
</html>

<?php

function page_header(){
    $data = '
    <div class="print-area">
    <div class="header">
        <h3>Web Developer</h3>
    </div>
    <div class="data-info">
        <table>
            <tr>
                <th>Name</th>
                <th>Roll</th>
                <th>Phone</th>
                <th>Email</th>
            </tr>
    ';
    return $data;
}

function page_footer(){
    $data = '
        
        </table>
    </div>
    <h4>Page-1</h4>
    </div>
    ';
    return $data;
}

?>