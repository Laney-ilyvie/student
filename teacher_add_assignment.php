<?php
include "db.php";

$task_id = $_GET['task_id'];

if ($_POST) {
    foreach ($_FILES['files']['name'] as $key => $name) {

        $tmp = $_FILES['files']['tmp_name'][$key];
        $file_name = time() . "_" . $name;
        $path = "uploads/" . $file_name;

        move_uploaded_file($tmp, $path);

        $stmt = $conn->prepare("INSERT INTO assignments (task_id, title, file_path) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $task_id, $name, $path);
        $stmt->execute();
    }

    echo "Assignments added!";
}
?>

<form method="POST" enctype="multipart/form-data">
<input type="file" name="files[]" multiple><br>
<button>Upload Assignments</button>
</form>