<?php include "db.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
   <div class="class">
<form method="POST">
    <input type="name" placeholder="Name" required><br>
    <input type="email" placeholder="Email" required><br>
    <input type="course" placeholder="Course" required><br><br>
    <button type="submit">Register</button><br><br>
    <a href="login.php">Login</a><br><br>
</form>

<?php
if ($_POST) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $conn->query("INSERT INTO students(id,name,email,course)
    VALUES(Null,'$name','$email','$course')");
}
?>
</body>
</html>