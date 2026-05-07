<?php
session_start();

if (isset($_SESSION['teacher_id']) || isset($_SESSION['student_id'])) {
    header("Location: dashboard.php");
    exit;
}

header("Location: login.php");
exit;
?>