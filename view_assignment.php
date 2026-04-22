<?php
include "db.php";
session_start();

$result = $conn->query ("SELECT * FROM assignments ");


 if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<h3>" . $row['title'] . "</h3>";
        echo "<a href='" . $row['file_path'] . "' download>Download Assignment</a><br><br>";

    }
 }
?>

