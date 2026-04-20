<?php
include "db.php";
session_start();
$student_id = $_SESSION['student_id']; // logged-in student

$result = $conn->query("
    SELECT a.title, a.description, a.file_path
    FROM assignments a
    JOIN student_assignments sa ON a.id = sa.assignment_id
    WHERE sa.student_id = $student_id
");

while ($row = $result->fetch_assoc()) {
    echo "<h3>{$row['title']}</h3>";
    echo "<p>{$row['description']}</p>";
    echo "<a href='{$row['file_path']}'>Download</a><hr>";
}
?>