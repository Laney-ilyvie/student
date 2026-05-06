<?php
include "db.php";
session_start();

$assignment_id = $_GET['id'];
$student_id = $_SESSION['student_id'];

if ($_POST) {
    $file = $_FILES['file'];
    $name = time() . "_" . $file['name'];
    $path = "uploads/" . $name;

    move_uploaded_file($file['tmp_name'], $path);

    $stmt = $conn->prepare("INSERT INTO submissions (student_id, assignment_id, file_path) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $student_id, $assignment_id, $path);
    $stmt->execute();

    echo "Submitted!";
}
?>

<form method="POST" enctype="multipart/form-data">
<input type="file" name="file"><br>
<button>Submit</button>
</form>