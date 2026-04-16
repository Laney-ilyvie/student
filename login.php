<?php include "student.php"; ?>

<form>
    <input name="email" placeholder="Email"><br><br>
    <input type="password" name="password" placeholder="Password"><br><br>
    <button type="submit">Login</button><br>
</form>

<?php
session_start();

if ($_POST) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $result = $conn->query("SELECT * FROM students WHERE email='$email'");
    $row = $result->fetch_assoc();

    if ($row && password_verify($pass, $row['password'])) {
        $_SESSION['student'] = $row['name'];
        header("Location: dashboard.php");
    } else {
        echo "Invalid login";
    }
}
?>