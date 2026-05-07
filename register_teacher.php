<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<?php
include "db.php";

if ($_POST) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("
        INSERT INTO teachers(id,name, email, password)
        VALUES (NULL, ?, ?, ?)
    ");

    $stmt->bind_param("sss", $name, $email, $password);

    $stmt->execute();

    echo "Teacher registered successfully";
}
?>

<h2>Teacher Registration</h2>

<form method="POST">

    <input type="text" name="name" placeholder="Full Name" required><br><br>

    <input type="email" name="email" placeholder="Email" required><br><br>

    <input type="password" name="password" placeholder="Password" required><br><br>

    <button type="submit">Register</button>

</form>
</body>
</html>