<?php
include 'dbconfig.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phno = $_POST['phno'];
    $dob = $_POST['dob'];
    $cource = $_POST['cource'];
    $address = $_POST['address'];

    $sql = "INSERT INTO student (name, phno, dob, cource, address, status) VALUES ('$name', '$phno', '$dob', '$cource', '$address', 'A')";

    if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Student added successfully')</script>";
            echo "<meta http-equiv='refresh' content='0;addstu.php'>";
    } else 
        {

            echo "<script>alert('Something went wrong')</script>";
            echo "<meta http-equiv='refresh' content='0;addstu.php'>";
    }

    $conn->close();
}
?>
