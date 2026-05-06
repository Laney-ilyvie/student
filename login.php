<?php
include "db.php";
session_start();

if ($_POST) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    // Student
    $res = $conn->query("SELECT * FROM students WHERE email='$email' AND password='$pass'");
    if ($res->num_rows) {
        $_SESSION['student_id'] = $res->fetch_assoc()['id'];
        header("Location: dashboard.php");
    }

    // Teacher
    $res = $conn->query("SELECT * FROM teachers WHERE email='$email' AND password='$pass'");
    if ($res->num_rows) {
        $_SESSION['teacher_id'] = $res->fetch_assoc()['id'];
        header("Location: dashboard.php");
    }
}
?>

<form method="POST">
<input name="email" placeholder="Email"><br>
<input type="password" name="password"><br>
<button>Login</button>
</form>