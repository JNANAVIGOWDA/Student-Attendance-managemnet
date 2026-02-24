<?php
include 'dbconfig.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST['date'];
    $attendance = isset($_POST['attendance']) ? $_POST['attendance'] : [];

    foreach ($attendance as $phno => $status) {
        $sql = "INSERT INTO attendance (stid, status, date) VALUES ('$phno', 'Present', '$date')";
        if ($conn->query($sql) !== TRUE) {
            echo "<script>alert('Error adding attendance for student with phone number: $phno')</script>";
        }
    }

    echo "<script>alert('Attendance added successfully')</script>";
    echo "<meta http-equiv='refresh' content='0;welcome.php'>";
}

$conn->close();
?>
