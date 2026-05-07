<?php
include "db.php";

$task_id = $_GET['task_id'];

if ($_POST) {

    $class_id = $_POST['class_id'];

    $stmt = $conn->prepare("
        INSERT INTO class_task(class_id, task_id)
        VALUES (?, ?)
    ");

    $stmt->bind_param("ii", $class_id, $task_id);

    $stmt->execute();

    echo "Task assigned successfully";
}
?>

<form method="POST">

    <input type="number" name="class_id" placeholder="Class ID" required><br><br>

    <button>Assign Task</button>

</form>