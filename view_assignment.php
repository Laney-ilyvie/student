<?php
include "db.php";
session_start();

// Check if student is logged in
if (!isset($_SESSION['student_id'])) {
    header("Location: login.php");
    exit();
}

$student_id = $_SESSION['student_id'];

// Use prepared statement for security
$stmt = $conn->prepare("
    SELECT a.title, a.description, a.file_path
    FROM assignments a
    JOIN student_assignments sa ON a.id = sa.assignment_id
    WHERE sa.student_id = ?
");

$stmt->bind_param("i", $student_id);
$stmt->execute();
$result = $stmt->get_result();

// Check if results exist
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<h3>" . htmlspecialchars($row['title']) . "</h3>";
        echo "<p>" . htmlspecialchars($row['description']) . "</p>";
        echo "<a href='" . htmlspecialchars($row['file_path']) . "'>Download</a><hr>";
    }
} else {
    echo "No assignments found.";
}

$stmt->close();
$conn->close();
?>