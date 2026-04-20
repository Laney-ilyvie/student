<?php
include "db.php";
session_start();

if (!isset($_SESSION['student'])) {
    header("Location: login.php");
}
?>

<h2>Welcome <?php echo $_SESSION['student']; ?></h2>

<a href="view_assignment.php">View Assignment</a><br>
<a href="upload_exam.php">View Exams</a><br>
<a href="logout.php">Logout</a>