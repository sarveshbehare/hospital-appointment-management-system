<?php
    if (isset($_POST['name'])) {
    $server = "localhost";
    $username = "root";
    $password = "Sarvesh22";

    $con = mysqli_connect($server, $username, $password, "hospital");
    // $con = mysqli_connect("localhost","root", "mahsih3482");

    if (!$con) {
        die("Connection to this database failed due to".mysqli_connect_error());
    }
    //echo "success";
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $password = $_POST['password'];

    $ab="SELECT COUNT(PATIENT_ID) FROM PATIENT";
    $abc=mysqli_query($con,$ab);
    $r=mysqli_fetch_assoc($abc);
    if($r > 0)
    {
        $pq="SELECT MAX(PATIENT_ID) FROM PATIENT";
        $pqr=mysqli_query($con,$pq);
        $p=mysqli_fetch_assoc($pqr);
        $a=$p['MAX(PATIENT_ID)'] + 1;
    }
    else
    {
        $a=1;
    }
    $sql = "INSERT INTO PATIENT(`PATIENT_ID`,`PNAME`,`AGE`,`SEX`,`ADDRESS`,`PHONE`) VALUES ('$a','$name','$age','$gender','$address','$phone')";
    // $sql1 = "INSERT INTO `login` (`email`,`pat_id`,`login_name`,`password`) VALUES ('$email','10003','$name','$password');";
    if (mysqli_query($con,$sql)) 
    {
        // echo "success1";
    }
    else {
        echo "error";
    }
    $pid = "SELECT * FROM PATIENT WHERE PHONE = '$phone';";
    $result = mysqli_query($con,$pid);
    while ($row = mysqli_fetch_assoc($result)) {
        $var =  $row['PATIENT_ID'];
        session_start();
        $_SESSION['userid'] = $row['PATIENT_ID'];
    }
    $sql1 = "INSERT INTO `login` (`email`,`pat_id`,`login_name`,`password`) VALUES ('$email','$var','$name','$password')";
    if ($con->query($sql1) == true)
    {
        header('Location: dept_select.html');
    }
    else {
        echo "error";
    }
    $con->close();
    }
?>
