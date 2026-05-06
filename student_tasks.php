<?php
include "db.php";
session_start();

$student_id = $_SESSION['student_id'];

$result = $conn->query("
SELECT t.* FROM task t
JOIN class_task ct ON t.id = ct.task_id
JOIN student_class sc ON sc.class_id = ct.class_id
WHERE sc.student_id = $student_id
");

while ($row = $result->fetch_assoc()) {
    echo "<h3>{$row['title']}</h3>";
    echo "<a href='view_task.php?id={$row['id']}'>Open</a><hr>";
}
?>