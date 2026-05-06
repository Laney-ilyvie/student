<?php
include "db.php";

$task_id = $_GET['id'];

$res = $conn->query("SELECT * FROM assignments WHERE task_id=$task_id");

while ($row = $res->fetch_assoc()) {
    echo "<p>{$row['title']}</p>";
    echo "<a href='{$row['file_path']}' download>Download</a>";
    echo "<a href='submit.php?id={$row['id']}'>Submit</a><br>";
}
?>