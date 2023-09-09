<?php
$con = mysqli_connect("localhost","root","Sarvesh22","hospital");
session_start();
$_SESSION['doctor'] = $_POST['doc'];
$m = $_POST['doc'];



$sqla = "SELECT DID FROM DOCTOR WHERE DNAME = '$m' ";
$resulta = mysqli_query($con,$sqla);
while($rowa = mysqli_fetch_assoc($resulta))
{
  $did = $rowa['DID'];
}
$sqlb = "SELECT SNO 
        FROM APPOINTMENT
        WHERE D_ID = '$did'
        GROUP BY SNO
        HAVING COUNT(PID) >= 10";
$resultb = mysqli_query($con,$sqlb);
while($row=mysqli_fetch_assoc($resultb))
{
    $ab = $row['SNO'];
}
$sqlc = "UPDATE slot 
        SET status = 'full'
        WHERE slot_no = '$ab'";
if(mysqli_query($con,$sqlc))
{
    header('Location: slot.php');

}






// = "UPDATE slot 
//         SET status = 'full'
//         WHERE slot_no in (SELECT SNO 
//                           FROM APPOINTMENT
//                           WHERE D_ID = $did
//                           GROUP BY SNO
//                           HAVING COUNT(PID) >= 10);";
// $res=mysqli_query($con,$sqlb);
// if($row = mysqli_fetch_assoc($res))
// {
   
// }




?>