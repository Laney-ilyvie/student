<?php
include "db.php";
session_start();
if (!isset($_SESSION['student'])) {
    header("location: Login.php");
    exit();
}
<form method="POST" enctype="multipart/form-data">
    <input type="text" name="exam_title" placeholder="Exam title" required><br>
    <input type="text" name="exam_description" placeholder="Exam description" required><br>
     <input type="file" name="exam_file" required><br>
    <button type="submit">Upload Exam</button>
    </form>
?>