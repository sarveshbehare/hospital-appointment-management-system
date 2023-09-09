<?php

if(isset($_POST['email'])){ 
$con = mysqli_connect("localhost","root","Sarvesh22","hospital");
// start_session();
if(!$con)
{
    echo "connection error";
}
// echo "Connection to the database successful !";
$email=$_POST['email'];
$password=$_POST['password'];
$sql = "SELECT * FROM LOGIN WHERE EMAIL='$email' AND PASSWORD='$password'; ";
// echo $sql;
$result=mysqli_query($con,$sql);

if($row=mysqli_fetch_assoc($result))
{
    session_start();
    $_SESSION['userid'] = $row['PAT_ID'];
    // echo "welcome : ";
    // echo $row['LOGIN_NAME'];
    header('Location: dept_select.html');
}
else {
    echo "<p>incorrect password</p>";
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <img src="login_bg.webp" alt="login background" style="width: 100%;position: absolute;z-index: -1;">
     <div class="center">
        <h1>Login</h1>
        <form method="post" action="login.php">
            <div class="txt_field">
                <input type="text" name = "email" id = "email" required>
                <span></span>
                <label>Email</label>
            </div>
            <div class="txt_field">
                <input type="password" name = "password" id = "password" required>
                <span></span>
                <label>Password</label>
            </div>
            <input type="submit" value="Login">
            <div class="signup_link">
                Not a member? <a href="signup_page.html">Sign Up</a>
            </div>
        </form>
     </div>
</body>
</html>