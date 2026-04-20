<?php include "db.php"; ?>

<form method="POST">
    <input name="name" placeholder="Name" required><br>
    <input name="email" placeholder="Email" required><br>
    <input type="text" name="course" placeholder="Course" required><br>
    <button type="submit">Register</button>
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