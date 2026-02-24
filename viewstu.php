<?php
include 'dbconfig.php';

// Handle delete request
if (isset($_POST['delete'])) {
    $phno = $_POST['phno'];

    $delete_sql = "DELETE FROM student WHERE phno = '$phno'";
    if ($conn->query($delete_sql) === TRUE) {
        echo "<script>alert('Student deleted successfully')</script>";
    } else {
        echo "<script>alert('Error deleting student')</script>";
    }
}

// Fetch students from the database
$sql = "SELECT name, phno, dob, cource, address, status FROM student";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="stt.css">
    <title>View Students</title>
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
    
        <h1>STUDENT DETAILS</h1>
        <hr>
        <table id="customers">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone Number</th>
                    <th>Date of Birth</th>
                    <th>Course</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["phno"] . "</td>";
                        echo "<td>" . $row["dob"] . "</td>";
                        echo "<td>" . $row["cource"] . "</td>";
                        echo "<td>" . $row["address"] . "</td>";
                        echo "<td>
                                <form method='POST' action=''>
                                    <input type='hidden' name='phno' value='" . $row["phno"] . "'>
                                    <input type='submit' name='delete' value='Delete'>
                                </form>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No students found</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </body>
</html>
