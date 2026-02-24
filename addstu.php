<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="stt.css">
    <title>Add Student</title>
</head>
<body>
    <h1 align="center">ATTENDANCE MANAGEMENT</h1>
    <ul>
        <li><a href="welcome.php">HOME</a></li>
        <li><a href="viewatt.php">View Attendance</a></li>
        <li><a href="addstu.php">Add Students</a></li>
        <li><a href="viewstu.php">View Students</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
    
    <form action="addstudentdb.php" method="POST">
        <div class="container">
            <h1>ADD STUDENT</h1>
            <hr>
            
            <label for="name"><b>Name</b></label>
            <input type="text" placeholder="Enter Name" name="name" id="name" required>

            <label for="phno"><b>Phone Number</b></label>
            <input type="text" placeholder="Enter Phone Number" name="phno" id="phno" required>

            <label for="dob"><b>Date of Birth</b></label>
            <input type="date" name="dob" id="dob" required>

            <label for="cource"><b>Course</b></label>
            <input type="text" placeholder="Enter Course" name="cource" id="cource" required>

            <label for="address"><b>Address</b></label>
            <input type="text" placeholder="Enter Address" name="address" id="address" required>

            <input type="submit" class="registerbtn" value="ADD STUDENT" name="add_student">
        </div>
    </form>
</body>
</html>
