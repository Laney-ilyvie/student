<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
include "db.php";
session_start();

if ($_POST) {

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Student login
    $result = $conn->query("
        SELECT * FROM students
        WHERE email='$email' AND password='$password'
    ");

    if ($result->num_rows > 0) {

        $student = $result->fetch_assoc();

        $_SESSION['student_id'] = $student['id'];

        header("Location: dashboard.php");
        exit;
    }

    // Teacher login
    $result = $conn->query("
        SELECT * FROM teachers
        WHERE email='$email' AND password='$password'
    ");

    if ($result->num_rows > 0) {

        $teacher = $result->fetch_assoc();

        $_SESSION['teacher_id'] = $teacher['id'];

        header("Location: dashboard.php");
        exit;
    }

    echo "Invalid login";
}
?>

<h2>Login</h2>

<form method="POST">

    <input type="email" name="email" placeholder="Email" required><br><br>

    <input type="password" name="password" placeholder="Password" required><br><br>

    <button type="submit">Login</button>

</form>

<br>

<a href="register_student.php">
    Register as Student
</a>

<br><br>

<a href="register_teacher.php">
    Register as Teacher
</a>
</body>
</html>