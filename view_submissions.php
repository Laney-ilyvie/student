<?php
include "db.php";

// fetch data
$result = $conn->query("
    SELECT sub.*, a.deadline, s.name, a.title
    FROM submissions sub
    JOIN assignments a ON sub.assignment_id = a.id
    JOIN students s ON sub.student_id = s.id
");
$submissions = [];

while ($row = $result->fetch_assoc()) {      
    $submissions[] = $row; 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view submissions</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>All Submissions</h2>

<?php
foreach ($submissions as $row) {

    $status = (strtotime($row['submitted_at']) > strtotime($row['deadline'])) 
              ? "Late" : "On Time";

    echo "<h3>{$row['name']} - {$row['title']}</h3>";
    echo "<p>Status: $status</p>";
    echo "<p>Submitted: {$row['submitted_at']}</p>";
    echo "<hr>";
}
?>
</body>
</html>