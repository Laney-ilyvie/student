<?php
include "db.php";
session_start();

if (!isset($_SESSION['student'])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>   
<div class="container">
    <div class="card">

<h2>Welcome <?php echo $_SESSION['student']; ?></h2>

<a href="view_assignment.php">View Assignment</a><br>
<a href="view_exam.php">View Exams</a><br>
<a href="upload_exam.php">Upload Exam</a><br>
<a href="logout.php">Logout</a>

</body>
</html>
