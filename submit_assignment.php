<?php
include "db.php";
session_start();

$student_id = $_SESSION['student_id'];
$assignment_id = $_GET['id'];
?>

<h2>Submit Assignment</h2>

<form method="POST" enctype="multipart/form-data">
    <input type="file" name="file" required><br><br>
    <button type="submit">Upload</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $file = $_FILES['file'];
    $name = $file['name'];
    $tmp = $file['tmp_name'];

    $new_name = uniqid() . "_" . $name;
    $path = "uploads/" . $new_name;

    if (move_uploaded_file($tmp, $path)) {

        $stmt = $conn->prepare("
            INSERT INTO submissions (student_id, assignment_id, file_path)
            VALUES (?, ?, ?)
        ");

        $stmt->bind_param("iis", $student_id, $assignment_id, $path);
        $stmt->execute();

        echo "Submitted successfully!";
    }
}
?>