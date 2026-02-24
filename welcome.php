<?php
include 'dbconfig.php';

// Fetch students from the database
$sql = "SELECT phno, name FROM student";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="stt.css">
    <title>Add Attendance</title>
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
    
    <div class="container">
        <h1>ADD ATTENDANCE</h1>
        <hr>
        <form action="addattendance.php" method="POST">
            <label for="date"><b>Select Date:</b></label>
            <input type="date" name="date" id="date" value="<?php echo date('Y-m-d'); ?>" required>
            <table id="attendance">
                <thead>
                    <tr>
                        <th>Sl. No</th>
                        <th>Student Name</th>
                        <th>Present</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sl_no = 1;
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $sl_no++ . "</td>";
                            echo "<td>" . $row["name"] . "</td>";
                            echo "<td><input type='checkbox' name='attendance[" . $row["phno"] . "]' value='Present'></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3'>No students found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
            <input type="submit" class="registerbtn" value="SUBMIT ATTENDANCE" name="submit_attendance">
        </form>
    </div>
</body>
</html>
 