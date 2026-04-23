<?php
include "db.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<div class="form-box">

    <h2>Student Login</h2>
<form method="POST">
    <input type="text" name="name" placeholder="Name" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button>Login</button>
</form>

<?php
if ($_POST) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $result = $conn->query("SELECT * FROM students WHERE name='$name'");
    $row = $result->fetch_assoc();

    if ($row) {
        $_SESSION['student'] = $row['name'];
        header("Location: dashboard.php");
    } else {
        echo "Invalid login";
    }
}
?>
</div>
</body>
</html>