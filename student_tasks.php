<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Tasks</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<?php
include "db.php";
session_start();

$student_id = $_SESSION['student_id'];

$result = $conn->query("
    SELECT t.*
    FROM task t
    JOIN class_task ct ON t.id = ct.task_id
    JOIN student_class sc ON sc.class_id = ct.class_id
    WHERE sc.student_id = $student_id
");

while ($row = $result->fetch_assoc()) {

    echo "<h3>" . $row['title'] . "</h3>";

    echo "<p>" . $row['description'] . "</p>";

    echo "<a href='view_task.php?task_id={$row['id']}'>Open Task</a>";

    echo "<hr>";
}
?>
</body>
</html>