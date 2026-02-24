<?php
include 'dbconfig.php';

// Handle the search form submission
$search_month = isset($_POST['search_month']) ? $_POST['search_month'] : date('Y-m');

// Fetch students and their attendance from the database
$sql = "SELECT s.phno, s.name, a.status, a.date 
        FROM student s
        LEFT JOIN attendance a ON s.phno = a.stid
        WHERE DATE_FORMAT(a.date, '%Y-%m') = '$search_month' OR a.date IS NULL
        ORDER BY s.name, a.date";
$result = $conn->query($sql);

// Prepare the data for the ledger
$students = [];
while ($row = $result->fetch_assoc()) {
    $students[$row['phno']]['name'] = $row['name'];
    $students[$row['phno']]['attendance'][] = [
        'date' => $row['date'],
        'status' => $row['status']
    ];
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="stt.css">
    <title>View Attendance</title>
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
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}

h1 {
    color: #333;
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

ul li {
    float: left;
}

ul li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

ul li a:hover {
    background-color: #111;
}

.container {
    padding: 20px;
    background-color: white;
    width: 90%;
    margin: 0 auto;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
  overflow: scroll;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 12px;
    text-align: center;
}

th {
    background-color: #f2f2f2;
}

tr:nth-child(even) {
    background-color: #f9f9f9;
}

tr:hover {
    background-color: #f1f1f1;
}

input[type="submit"], input[type="month"] {
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

input[type="month"] {
    width: 150px;
}

    </style>
    <div class="container">
        <h1>STUDENT ATTENDANCE LEDGER</h1>
        <hr>
        <form method="POST" action="viewatt.php">
            <label for="search_month"><b>Select Month:</b></label>
            <input type="month" name="search_month" id="search_month" value="<?php echo $search_month; ?>" required>
            <input type="submit" class="searchbtn" value="SEARCH">
        </form>
        
        <table id="attendance_ledger">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <?php
                    // Generate table headers for each day of the month
                    $days_in_month = date('t', strtotime($search_month . '-01'));
                    for ($day = 1; $day <= $days_in_month; $day++) {
                        echo "<th>$day</th>";
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($students as $student) {
                    echo "<tr>";
                    echo "<td>" . $student['name'] . "</td>";
                    for ($day = 1; $day <= $days_in_month; $day++) {
                        $current_date = $search_month . '-' . str_pad($day, 2, '0', STR_PAD_LEFT);
                        $attendance_status = '-';
                        if (isset($student['attendance'])) {
                            foreach ($student['attendance'] as $attendance) {
                                if ($attendance['date'] == $current_date) {
                                    $attendance_status = $attendance['status'];
                                    if($attendance_status=='Present'){
                                        $attendance_status='P';
                                    }
                                    else{
                                        $attendance_status='A';
                                    }
                                        
                                    break;
                                }
                            }
                        }
                        echo "<td>$attendance_status</td>";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
