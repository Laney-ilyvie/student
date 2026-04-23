<?php
include "db.php";
session_start();

// Get student id from session
if (!isset($_SESSION["student_id"])) {
    die("You must be logged in.");
}

$student_id = $_SESSION["student_id"];

// Get assignment id from URL
$assignment_id = $_GET['assignment_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Submission</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form_box">
<h2>Submit Assignment</h2>

<form method="POST" enctype="multipart/form-data">
    <input type="file" name="file" required><br><br>
    <button type="submit">Submit</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $file = $_FILES['file'];

    if ($file['error'] === 0) {

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
        } else {
            echo "File upload failed!";
        }
    } else {
        echo "Error uploading file!";
    }
}
?>

</div>
</body>
</html>