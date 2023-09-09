<?php

$con = mysqli_connect("localhost","root","Sarvesh22","hospital");
// $sql = "SELECT APP_NO , PID , PNAME , D_ID , DNAME , from_time , to_time , DEPT_NAME 
//         FROM APPOINTMENT , PATIENT , DOCTOR , DEPARTMENT , SLOT 
//         WHERE PID=PATIENT_ID AND D_ID=DID AND SNO=slot_no AND DEPT_NUM=DEPT_NO ;";
// $result=mysqli_query($con,$sql);
// while($row=mysqli_fetch_assoc($result))
// {
//     echo $row['APP_NO'];
//     echo "       ";
//     echo $row['PID'];
//     echo "    ";
//     echo $row['PNAME'];
//     echo "    ";
//     echo $row['D_ID'];
//     echo "    ";
//     echo $row['DNAME'];
//     echo "       ";
//     echo $row['from_time'];
//     echo "       ";
//     echo $row['to_time'];
//     echo "    ";
//     echo $row['DEPT_NAME'];
//     echo "<br>";
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="table.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap" rel="stylesheet">
    <title>Appointment Data</title>
</head>
<body>
<table class="content-table">
    <thead>
        <tr>
            <th>Appointment No.</th>
            <th>Patient ID</th>
            <th>Patient Name</th>
            <th>Doctor ID</th>
            <th>Doctor Name</th>
            <th>Department</th>
            <th>From</th>
            <th>To</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT APP_NO , PID , PNAME , D_ID , DNAME , from_time , to_time , DEPT_NAME 
        FROM APPOINTMENT , PATIENT , DOCTOR , DEPARTMENT , SLOT 
        WHERE PID=PATIENT_ID AND D_ID=DID AND SNO=slot_no AND DEPT_NUM=DEPT_NO 
        ORDER BY APP_NO;";
            $result=mysqli_query($con,$sql);
            while($row=mysqli_fetch_assoc($result))
            {
                echo "
                <tr>
                    <td>".$row['APP_NO']."</td>
                    <td>".$row['PID']."</td>
                    <td>".$row['PNAME']."</td>
                    <td>".$row['D_ID']."</td>
                    <td>".$row['DNAME']."</td>
                    <td>".$row['DEPT_NAME']."</td>
                    <td>".$row['from_time']."</td>
                    <td>".$row['to_time']."</td>
                </tr>
                ";
            }
        ?>       
    </tbody>
</table>
</body>
</html>