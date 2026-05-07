<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
session_start();

echo "<h1>Dashboard</h1>";

if (isset($_SESSION['teacher_id'])) {

    echo "<h2>Teacher Panel</h2>";

    echo "<a href='teacher_create_task.php'>Create Task</a><br><br>";
}

if (isset($_SESSION['student_id'])) {

    echo "<h2>Student Panel</h2>";

    echo "<a href='student_tasks.php'>View My Tasks</a><br><br>";
}

echo "<a href='logout.php'>Logout</a>";
?>
</body>
</html>