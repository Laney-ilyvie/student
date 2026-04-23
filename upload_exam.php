<?php
include "db.php";
session_start();

// Optional: restrict access
if (!isset($_SESSION['student'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Upload Exam</h2>

<form method="POST" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Exam Title" required><br><br>
    <input type="file" name="exam_file" required><br><br>
    <button type="submit">Upload</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST['title'];

    // File info
    $file_name = $_FILES['exam_file']['name'];
    $tmp_name = $_FILES['exam_file']['tmp_name'];
    $file_size = $_FILES['exam_file']['size'];
    $file_error = $_FILES['exam_file']['error'];

    // Allowed file types
    $allowed = ['pdf', 'doc', 'docx'];

    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

    if (in_array($file_ext, $allowed)) {

        if ($file_error === 0) {

            if ($file_size < 5000000) { // 5MB limit

                // Unique file name
                $new_name = uniqid("exam_", true) . "." . $file_ext;

                $upload_path = "uploads/" . $new_name;

                if (move_uploaded_file($tmp_name, $upload_path)) {

                    // Save to database
                    $stmt = $conn->prepare("INSERT INTO exams (title, file_path) VALUES (?, ?)");
                    $stmt->bind_param("ss", $title, $upload_path);
                    $stmt->execute();

                    echo "<p>Exam uploaded successfully!</p>";

                } else {
                    echo "<p>Failed to upload file.</p>";
                }

            } else {
                echo "<p>File too large.</p>";
            }

        } else {
            echo "<p>Error uploading file.</p>";
        }

    } else {
        echo "<p>Invalid file type.</p>";
    }
}
?>
</body>
</html>