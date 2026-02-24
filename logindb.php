<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
      <?php
if(isset($_POST['login']))
{
  $username=$_POST['username'];
  $password=$_POST['password'];
  //echo"$username $password";
  include 'dbconfig.php';
  $sql="SELECT * FROM `admin` WHERE `username`='$username' AND `password`='$password'";
  $result=$conn->query($sql);
  if($result->num_rows>0)
  {
      while($row=$result->fetch_assoc())
      {
          session_start();
          $_SESSION['ausername']=$username;
          $_SESSION['apassword']=$password;
          echo"<meta http-equiv='refresh' content='0;welcome.php'>";
      }
  }
  else{
      echo"<script>alert('Invalid username or password')</script>";
      echo"<meta http-equiv='refresh' content='0;index.php'>";
      
  }
  //echo $sql;
  
  
}
else{
    header("location:index.php");
}
?>
    </body>
</html>
