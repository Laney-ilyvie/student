<?php include "db.php"; ?>

<form method="POST" enctype="multipart/form-data">
    <input name="title"><br>
    <textarea name="description"></textarea><br>
    <input type="file" name="file"><br>
    <button>Upload</button>
</form>

<?php
if ($_POST) {
    $file = "uploads/" . $_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'], $file);

    $conn->query("INSERT INTO assignments(title,description,file_path,teacher_id)
    VALUES('$_POST[title]','$_POST[description]','$file',1)");
}
?>
