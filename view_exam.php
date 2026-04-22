<?php
include "db.php";

$result = $conn->query("SELECT * FROM exams");

while ($row = $result->fetch_assoc()) {
    echo "<h3>" . $row['title'] . "</h3>";
    echo "<a href='" . $row['file_path'] . "' download>Download Exam</a><br><br>";
}
?>