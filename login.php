<?php
include "db.php";
session_start();
?>

<form method="POST">
    <input type="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button>Login</button>
</form>

<?php
if ($_POST) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM students WHERE email='$email' AND password='$password'");
    $row = $result->fetch_assoc();

    if ($row) {
        $_SESSION['student'] = $row['name'];
        header("Location: dashboard.php");
    } else {
        echo "Invalid login";
    }
}
?>