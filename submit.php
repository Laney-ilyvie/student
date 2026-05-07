<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<?php
include "db.php";
session_start();

$student_id = $_SESSION['student_id'];

$assignment_id = $_GET['assignment_id'];

if ($_POST) {

    $file = $_FILES['file'];

    $new_name = time() . "_" . $file['name'];

    $path = "uploads/" . $new_name;

    move_uploaded_file($file['tmp_name'], $path);

    $stmt = $conn->prepare("
        INSERT INTO submissions(student_id, assignment_id, file_path)
        VALUES (?, ?, ?)
    ");

    $stmt->bind_param("iis", $student_id, $assignment_id, $path);

    $stmt->execute();

    echo "Submission successful";
}
?>

<form method="POST" enctype="multipart/form-data">

    <input type="file" name="file" required><br><br>

    <button>Submit</button>

</form>
</body>
</html>