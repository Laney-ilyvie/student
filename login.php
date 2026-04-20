<?php
include "db.php";
session_start();
?>

<form method="POST">
    <input name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button>Login</button>
</form>

<?php
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