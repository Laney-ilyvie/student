<?php
include "db.php";
session_start();

// Check if student is logged in
if (!isset($_SESSION['student_id'])) {
    header("Location: login.php");
    exit();
}

$student_id = $_SESSION['student_id'];

$result = $conn->query ("SELECT * FROM assignments ");

if ($result) {
    while ($row = $result->fetch assoc) {
        echo "<h3>" . $row['title'] . "</h3>";
        echo "<a href='" . $row['file_path'] . "' download>Download Assignment</a><br><br>";

    }
}



?>