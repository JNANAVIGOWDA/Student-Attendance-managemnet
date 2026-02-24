<html>
    <head>
        <link rel="stylesheet" href="stt.css" >     
</head>
<body>
    <h1 align="center">ATTEDANCE MANAGEMENT</h1>
   <ul>
       <li><a class="active" href="index.php">HOME</a></li>
       <li><a href="admin.php">LOGIN</a></li>
    </ul>
    
    <form action="logindb.php" method="POST">
        <div class="container">
          <h1>LOGIN</h1> 
          <hr>

          <label for="username"><b>username</b></label>
          <input type="text" placeholder="Enter username" name="username" id="username" required>

          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" id="psw" required>


          <input type="submit" class="registerbtn" value="LOGIN" name="login">

        </div>
    </form> 
</body>
  
</html>