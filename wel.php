<?php
if(isset($_POST['reg']))
{
     $name=$_POST['name'];
    $phno=$_POST['phno'];
    
    $email=$_POST['email'];
    $course=$_POST['course'];
    $password=$_POST['password'];
    
   // echo "Phno: $phno<br>Name: $name<br>Email: $email<br>Password: $password<Br>Repass: $repass";
   
   include 'ghconfig.php';
   $sql="insert into user(name,phno,email,course,password)values('$name','$phno','$email','$course','$password');";
   if($conn->query($sql))
   {
   echo "<script>alert ('Registrstion successful')</script>";
        echo "<meta http-equiv='refresh' content='0;index.php'>";    
   }
   else{
       echo "<script>alert('please check phone number')</script>";
        echo "<meta http-equiv='refresh' content='0;reg.php'>";
   }
   
}
else {
    header("location:reg.php");
}
?>

