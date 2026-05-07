<?php
include "db.php";

if ($_POST) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("
        INSERT INTO teachers(name, email, password)
        VALUES (?, ?, ?)
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