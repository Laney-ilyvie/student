<?php
include "db.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view exams</title>
     <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
$result = $conn->query("SELECT * FROM exams");

while ($row = $result->fetch_assoc()) {
    echo "<h3>" . $row['title'] . "</h3>";
    echo "<a href='" . $row['file_path'] . "' download>Download Exam</a><br><br>";
}
?>
</body>
</html>