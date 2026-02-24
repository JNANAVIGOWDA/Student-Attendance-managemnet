<?php
if(isset($_POST['login']))
{
        $username=$_POST['username'];
        $password=$_POST['password'];
        //echo "$username $password";
        include 'ghconfig.php';
        $sql="select * from attendstatus WHERE phno='$username' and password='$password';";
        $result=$conn->query($sql);
        if($result->num_rows>0)
        {
            while($row=$result->fetch_assoc())
            {
                session_start();
               $_SESSION['username']=$username;
               $_SESSION['password']=$password;
               echo "<meta http-equiv='refresh' content='0;abc.php'>";
            }
        }
        else {
            echo "<script>alert('invalid Username or Password')</script>";
            echo "<meta http-equiv='refresh' content='0;index.php'>";
        
        }
        //echo $sql;
}
else{
    header("location:index.php");
 

}
?>

