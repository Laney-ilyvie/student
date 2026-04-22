<?php
include "db.php";
session_start();

// Check if student is logged in
if (!isset($_SESSION['student_id'])) {
    header("Location: login.php");
    exit();
}

$student_id = $_SESSION['student_id'];

");

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {


        echo "<h3>" . $row['title'] . "</h3>";
        echo "<p>" . $row['description'] . "</p>";

        echo "<a href='" . $row['file_path'] . "' download>Download Assignment</a>";

        echo "</div>";
    }

} else {
    echo "<p>No assignments found.</p>";
}
?>