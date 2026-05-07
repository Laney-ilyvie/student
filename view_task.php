<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Task</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<?php
include "db.php";

$task_id = $_GET['task_id'];

$result = $conn->query("
    SELECT * FROM assignments
    WHERE task_id = $task_id
");

while ($row = $result->fetch_assoc()) {

    echo "<h3>" . $row['title'] . "</h3>";

    echo "<a href='{$row['file_path']}' download>
            Download Assignment
          </a>";

    echo "<br>";

    echo "<a href='submit.php?assignment_id={$row['id']}'>
            Submit Work
          </a>";

    echo "<hr>";
}
?>
</body>
</html>