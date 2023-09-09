<?php
$con = mysqli_connect("localhost","root","Sarvesh22","hospital");

session_start();
$_SESSION['dept'] = $_POST['select'];
// $sql="SELECT * FROM DOCTOR,DEPARTMENT WHERE DEPT_NUM = DEPT_NO AND DEPT_NAME = '$dept' ;";
// $result = mysqli_query($con,$sql);
// while($row=mysqli_fetch_assoc($result))
// {
//     echo $row['DNAME'];
//     // $a = $a+1;
//     // $_SESSION['$a']=$row['DNAME'];
// }


$sql = "UPDATE SLOT SET status = 'available' WHERE status = 'full' ";
if(mysqli_query($con,$sql))
{
    
}


header('Location: doc_select.php');
?>
