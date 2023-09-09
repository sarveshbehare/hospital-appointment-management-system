<!-- <?php
// $con = mysqli_connect("localhost","root","mahsih3482","hospital");
// session_start();
// $dept = $_SESSION['dept'];
?> -->

<?php
$con = mysqli_connect("localhost","root","Sarvesh22","hospital");
session_start();
$dept = $_SESSION['dept'];
$sql= "SELECT DNAME FROM DOCTOR,DEPARTMENT WHERE DEPT_NUM = DEPT_NO AND DEPT_NAME = '$dept' ; ";
// echo $sql;
$result = mysqli_query($con,$sql);
$a=0;
while($row=mysqli_fetch_assoc($result))
{
    $_SESSION['doc'.$a] = $row['DNAME'];
    $a++;
}
// echo $_SESSION['doc'.'1'];
// echo "<br>";
// echo "<br>";
// $c=0;
// while($c<$d)
// {
//     echo $_SESSION['doc'.$c];
//     echo "<br>";
//     $c++;
// }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="table.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap" rel="stylesheet">
</head>
<body>
  <div class="depe">
    <?php
      echo "<h2>" . $dept . " department </h2>";
    ?>
  </div>

<div class="container">
  <div class="heading">
    <h1>Please Choose Your Doctor</h1>
    <p>After you have chosen your doctor, you will be able to choose your slot.
    </p>
  </div>
  <br>
  
  <form action="gole.php" method = "post">

  <table class="content-table">
    <thead>
      <tr>
        <th scope="col">Name</th>
        <th scope="col">Selection</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $sql="SELECT * FROM DOCTOR,DEPARTMENT WHERE DEPT_NUM = DEPT_NO AND DEPT_NAME = '$dept';";
        // session_start();
        $result = mysqli_query($con,$sql);
        $e=0;
        while($row=mysqli_fetch_assoc($result))
        {
          // echo "<tr>
          // <td> Dr. ". $row['DNAME'] ."</td>
          // <td>". "
          //   <input type='radio' name = 'doc' id = 'doc' value = '$row[DNAME]'>
          // ".
          // "</td>
          // </tr>";
          
          // $k = $_SESSION['doc'.$e];
          echo "  ";
          echo "<tr>
          <td> Dr. ". $_SESSION['doc'.$e] ."</td>"
          ?>
          <td>
            <input type='radio' name = 'doc' id = 'doc' value='<?php echo $_SESSION['doc'.$e]; ?>' >
          </td>
          </tr>
          <?php
          $e++;

            // echo  $row['DID'] . $row['DNAME'];
            // echo "<br>";
            // $a = $a+1;
            // $_SESSION['$a']=$row['DNAME'];
        }
        ?>
    </tbody>
  </table>
        <br>
        <input type="submit" value = "Select >">
  </form>
</div>
</body>
</html>
<!-- $k = $_SESSION['doc'.$e];
          echo "  ";
          echo "<tr>
          <td> Dr. ". $_SESSION['doc'.$e] ."</td>
          <td>". "
            <input type='radio' name = 'doc' id = 'doc' value = >
          ".
          "</td>
          </tr>"; -->