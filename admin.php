<?php
if(isset($_POST['password'])){
$a = $_POST['password'];
if($a == 'adminhsv')
{
   header('Location: appt_data.php');
}
}
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title>Login Form</title>
      <link rel="stylesheet" href="adminstyle.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap" rel="stylesheet">
   </head>
   <body>
      <div class="center">
         <div class="header">
            Admin Login
         </div>
         <form method="post">
            <!-- <input name="username" id="username" type="text" placeholder="Username" value="admin">
            <i class="far fa-envelope"></i> -->
            <input name = "password" id="password" type="password" placeholder="Password">
            <i class="fas fa-lock" onclick="show()"></i>
            <input type="submit" value="Sign in">
         </form>
      </div>
      <script>
         function show(){
          var pswrd = document.getElementById('pswrd');
          var icon = document.querySelector('.fas');
          if (pswrd.type === "password") {
           pswrd.type = "text";
           pswrd.style.marginTop = "20px";
           icon.style.color = "#7f2092";
          }else{
           pswrd.type = "password";
           icon.style.color = "grey";
          }
         }
      </script>
   </body>
</html>