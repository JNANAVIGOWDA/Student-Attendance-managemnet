<?php
if(isset($_POST['reg']))
{
    $name=$_POST['name'];
    $password=$_POST['password'];
    $phno=$_POST['phno'];
    $email=$_POST['email'];
    
    
    
   // echo "Phno: $phno<br>Name: $name<br>Email: $email<br>Password: $password<Br>Repass: $repass";
   
   include 'ghconfig.php';
   $sql="insert into attendstatus(name,password,phno,email)values('$name','$password','$phno','$email');";
   if($conn->query($sql))
   {
   echo "<script>alert ('Registrstion successful')</script>";
   echo "<meta http-equiv='refresh' content='0;index.php'>";    
   }
   else{
       echo "<script>alert('please check phone number')</script>";
       echo"<meta http-equiv='refresh'content='0;reg.php'>";
   }
}

      

else{
    header("location:reg.php");
    
}
?>