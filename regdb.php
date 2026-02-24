<?php

if(isset($_POST['reg']))
{
    $id=$_POST['id'];
  $name=$_POST['name'];
  $phno=$_POST['phno'];
  
  $email=$_POST['email'];
 $gender=$_POST['gender'];
  if($password==$repass)
  {
  include 'dbconfig.php';
  $sql="insert into employee(name,phno,email,role,address,password)value('$name','$phno','$email','$role','$address','$password');";
  if($conn->query($sql))
  {
      echo"<script>alert('Registration successful')</script>";
    echo"<meta http-equiv='refresh'content='0:register.php'>";
    
  }

else{
    echo"<script>alert('please check phone number')</script>";
    echo"<meta http-equiv='refresh'content='0:register.php'>";
    
        
}
  }
  
else{
    echo"<script>alert('Enter valid password')</script>";
    echo"<meta http-equiv='refresh'content='0:register.php'>";
    
}
}


else{
    header("location:register.php");
}
?>