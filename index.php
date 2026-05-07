<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="style.css">
</head> 
<body>
    
</body>
</html>
<?php
session_start();

if (isset($_SESSION['teacher_id']) || isset($_SESSION['student_id'])) {
    header("Location: dashboard.php");
    exit;
}

header("Location: login.php");
exit;
?>