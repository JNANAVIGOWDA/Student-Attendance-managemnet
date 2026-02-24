
<html>
    
<head>
    <link rel="stylesheet" href="stt.css">
</head>
<form action="/action_page.php">
  <div class="container">
    <h1>Attedance</h1> 
<p>please fill in this form to create an account.</p>
<hr>

<label for="name"><b>name</b></label>
<input type="text" placeholder="Enter name" name="name" id="name" required>

<label for="psw"><b>Password</b></label>
<input type="password" placeholder="Enter Password" name="psw" id="psw" required>

<label for="phno"><b>Phone number</b></label>
<input type="phno" placeholder="Enter Phone number" name="phno" id="phno" required>

<label for="emai"><b>Password</b></label>
<input type="email" placeholder="Enter email" name="email" id="email" required>



    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>

    <button type="submit" class="registerbtn"><a href="admin.php">Register</a></button>
    <button type="password"class="loginbtn"><a href="log.php">Login</a></button>
    </form>
</div>
        
  <div class="container signin">
    <p>Already have an account? <a href="#">Sign in</a>.</p>
  </div>
    </html>