<?php
if(isset($_POST['slot'])){
$con = mysqli_connect("localhost","root","Sarvesh22","hospital");

session_start();
$doc = $_SESSION['doctor'];
$sql2="SELECT DID FROM DOCTOR WHERE DNAME='$doc'";
$res2=mysqli_query($con,$sql2);
$pid= $_SESSION['userid'];
while($row2=mysqli_fetch_assoc($res2))
{
    $did=$row2['DID'];
}
$slot = $_POST['slot'];
$_SESSION['slot'] = $slot;


$ab="SELECT COUNT(APP_NO) FROM APPOINTMENT";
$abc=mysqli_query($con,$ab);
$r=mysqli_fetch_assoc($abc);
if($r > 0)
    {
        $pq="SELECT MAX(APP_NO) FROM APPOINTMENT";
        $pqr=mysqli_query($con,$pq);
        $p=mysqli_fetch_assoc($pqr);
        $a=$p['MAX(APP_NO)'] + 1;
    }
else
    {
        $a=1;
    }


$sql1="INSERT INTO APPOINTMENT (APP_NO,SNO,PID,D_ID) VALUES ('$a','$slot','$pid','$did')";
if($res1 = mysqli_query($con,$sql1))
{
    header('Location: final.php');
}
// else 
// {
//   echo "error";
// }
// while($row1=mysqli_fetch_assoc($res1))
// {

// }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slot Sleection</title>
    <link rel="stylesheet" href="table.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <div class="heading">
        <h1>Please select the slot of your choice.</h1>
    </div>
    <br>
<form method = "post">

<table class="content-table">
  <thead>
    <tr>
      <th scope="col">Slot No.</th>
      <th scope="col">From</th>
      <th scope="col">To</th>
      <th scope="col">Select</th>
    </tr>
  </thead>
  <tbody>
  <?php
        $con = mysqli_connect("localhost","root","Sarvesh22","hospital");
        $sql="SELECT * FROM SLOT WHERE STATUS = 'available'";
        $result=mysqli_query($con,$sql);
        while($row=mysqli_fetch_assoc($result))
        {
            echo "<tr>
          <td> ". $row['slot_no'] ."</td>
          <td> ". $row['from_time'] ."</td>
          <td> ". $row['to_time'] ."</td>
          <td>". "
            <input type='radio' name = 'slot' id = 'slot' value = '".$row['slot_no']."'>
          ".
          "</td>
          </tr>";
        }
    ?>
  </tbody>
</table>
      <br>
      <input type="submit" value = "Select Slot">
</form>
    
</body>
</html>