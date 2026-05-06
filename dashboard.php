<?php
session_start();

if (isset($_SESSION['teacher_id'])) {
    echo "<h2>Teacher</h2>";
    echo "<a href='teacher_create_task.php'>Create Task</a><br>";
}

if (isset($_SESSION['student_id'])) {
    echo "<h2>Student</h2>";
    echo "<a href='student_tasks.php'>My Tasks</a>";
}
?>