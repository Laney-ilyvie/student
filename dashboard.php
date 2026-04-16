<?php
include "student.php";
session_start();

if (!isset($_SESSION['student'])) {
    header("Location: login.php");
}
?>

<h2>Welcome <?php echo $_SESSION['student']; ?></h2>

<h3>Available Exams</h3>

<?php
$result = $conn->query("SELECT * FROM exams");

while ($row = $result->fetch_assoc()) {
    echo "<p>
        <b>{$row['title']}</b> - {$row['course']}
        <a href='{$row['file_path']}'>Download</a>
    </p>";
}
?>