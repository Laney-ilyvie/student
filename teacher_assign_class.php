<?php
include "db.php";

if ($_POST) {
    $class_id = $_POST['class_id'];
    $task_id = $_POST['task_id'];

    $stmt = $conn->prepare("INSERT INTO class_task (class_id, task_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $class_id, $task_id);
    $stmt->execute();

    echo "Assigned!";
}
?>

<form method="POST">
<input name="class_id" placeholder="Class ID"><br>
<input name="task_id" placeholder="Task ID"><br>
<button>Assign</button>
</form>