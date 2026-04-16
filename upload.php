<?php include "db.php"; ?>

<form method="POST" enctype="multipart/form-data">
    <input name="title" placeholder="Exam Title"><br>
    <input name="course" placeholder="Course"><br>
    <input type="file" name="file"><br>
    <button type="submit">Upload</button>
</form>

<?php
if ($_POST) {
    $title = $_POST['title'];
    $course = $_POST['course'];

    $file = "uploads/" . $_FILES['file']['name'];
    move_uploaded_file($_FILES['file']['tmp_name'], $file);

    $conn->query("INSERT INTO exams(title,course,file_path)
    VALUES('$title','$course','$file')");

    echo "Exam uploaded!";
}
?>