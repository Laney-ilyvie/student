<?php include "db.php"; ?>

<form method="POST">
    <input name="name" placeholder="Name" required><br>
    <input name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Register</button>
</form>

<?php
if ($_POST) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $conn->query("INSERT INTO students(name,email,password)
    VALUES('$name','$email','$pass')");
}
?>