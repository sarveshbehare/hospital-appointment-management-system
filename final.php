<?php

$con = mysqli_connect("localhost","root","Sarvesh22","hospital");
session_start();
$doc = $_SESSION['doctor'];
$slot = $_SESSION['slot'];
$user = $_SESSION['userid'];
$sql1="SELECT PNAME FROM PATIENT WHERE PATIENT_ID = '$user'";
$sql2="SELECT FROM_TIME,TO_TIME FROM SLOT WHERE SLOT_NO= '$slot'";
$res1=mysqli_query($con,$sql1);
$res2=mysqli_query($con,$sql2);
while($row1=mysqli_fetch_assoc($res1))
{
    $patient = $row1['PNAME'];
}
while($row2=mysqli_fetch_assoc($res2))
{
    $time1 = $row2['FROM_TIME'];
    $time2 = $row2['TO_TIME'];
}

// $doc,$patient,$time1,$time2
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="final.css">
    <title>Appointment</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <div class="heading">
        <h1>Your Appointment has been booked.</h1>
        <p>Thanks for choosing our hospital.</p>
    </div>
    <br>

    <div class="details">
        <h2>Details</h2> 
            <p>Name: <?php echo $patient ?></p>
            <p>Doctor: <?php echo $doc ?></p>
            <p>Time: <?php echo $time1."-".$time2?></p>
    </div>

    <footer>
        <br>
            <a href="index.html" style="padding:15px;"><button>Home</button></a>
        
        
    </footer>
</body>
</html>