<?php
include "db.php";
session_start();

// Check if student is logged in
if (!isset($_SESSION['student_id'])) {
    header("Location: login.php");
    exit();
}

$student_id = $_SESSION['student_id'];

// Fetch assignments for this student
$result = $conn->query("
    SELECT a.title, a.description, a.file_path
    FROM assignments a
    JOIN student_assignments sa ON a.id = sa.assignment_id
    WHERE sa.student_id = $student_id
");
?>

<h2>My Assignments</h2>

<?php
if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        echo "<div style='border:1px solid #000; padding:10px; margin:10px;'>";

        echo "<h3>" . $row['title'] . "</h3>";
        echo "<p>" . $row['description'] . "</p>";

        echo "<a href='" . $row['file_path'] . "' download>Download Assignment</a>";

        echo "</div>";
    }

} else {
    echo "<p>No assignments found.</p>";
}
?>