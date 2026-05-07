<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Add Assignment</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
include "db.php";

$task_id = $_GET['task_id'];

if ($_POST) {

    foreach ($_FILES['files']['name'] as $key => $name) {

        $tmp_name = $_FILES['files']['tmp_name'][$key];

        $new_name = time() . "_" . $name;

        $path = "uploads/" . $new_name;

        move_uploaded_file($tmp_name, $path);

        $stmt = $conn->prepare("
            INSERT INTO assignments(task_id, title, file_path)
            VALUES (?, ?, ?)
        ");

        $stmt->bind_param("iss", $task_id, $name, $path);

        $stmt->execute();
    }

    echo "Assignments uploaded successfully";

    echo "<br><br>";

    echo "<a href='teacher_assign_class.php?task_id=$task_id'>Assign To Class</a>";
}
?>

<form method="POST" enctype="multipart/form-data">

    <input type="file" name="files[]" multiple required><br><br>

    <button>Upload Assignments</button>

</form>
</body>
</html>