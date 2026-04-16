<?php
include "db.php";

$result = $conn->query("SELECT * FROM assignments");

while ($row = $result->fetch_assoc()) {
    echo "<h3>{$row['title']}</h3>";
    echo "<p>{$row['description']}</p>";
    echo "<a href='{$row['file_path']}'>Download</a><hr>";
}
?>