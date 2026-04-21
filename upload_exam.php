<?php
include "db.php";
session_start();

// Check if user is logged in
if (!isset($_SESSION['student'])) {
    header("Location: login.php");
    exit();
}

$message = "";

if (isset($_POST['upload'])) {

    $title = $_POST['title'];
    $uploaded_by = $_SESSION['student'];

    // File upload settings
    $file_name = $_FILES['exam_file']['name'];
    $tmp_name = $_FILES['exam_file']['tmp_name'];

    $upload_dir = "uploads/";

    // Create folder if not exists
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir);
    }

    $file_path = $upload_dir . time() . "_" . $file_name;

    if (move_uploaded_file($tmp_name, $file_path)) {

        $sql = "INSERT INTO exams (title, file_path, uploaded_by)
                VALUES ('$title', '$file_path', '$uploaded_by')";

        if ($conn->query($sql)) {
            $message = "Exam uploaded successfully!";
        } else {
            $message = "Database error!";
        }

    } else {
        $message = "File upload failed!";
    }
}
?>

<h2>Upload Exam</h2>
<?php if ($message) { echo "<p> $message</p>"; } ?>

<form method="POST" enctype="multipart/form-data">

    <input type="text" name="title" placeholder="Exam Title" required><br><br>

    <input type="file" name="exam_file" required><br><br>

    <button type="submit" name="upload">Upload Exam</button>

</form>