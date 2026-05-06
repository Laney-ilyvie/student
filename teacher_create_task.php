<?php
include "db.php";
session_start();

if ($_POST) {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $deadline = $_POST['deadline'];
    $teacher_id = $_SESSION['teacher_id'];

    $stmt = $conn->prepare("INSERT INTO task (title, description, deadline, teacher_id) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $title, $desc, $deadline, $teacher_id);
    $stmt->execute();

    $task_id = $stmt->insert_id;

    header("Location: teacher_add_assignment.php?task_id=$task_id");
}
?>

<form method="POST">
<input name="title" placeholder="Task Title"><br>
<textarea name="description"></textarea><br>
<input type="datetime-local" name="deadline"><br>
<button>Create Task</button>
</form>