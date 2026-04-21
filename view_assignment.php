<?php
include "db.php";
session_start();



$student_id = $_SESSION['student_id'];
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

        echo "<h3>" . $row['title'] . "</h3>";
        echo "<p>" . $row['description'] . "</p>";

        echo "<a href='" . $row['file_path'] . "' download>Download Assignment</a>";

        echo "</div>";
    }

} else {
    echo "<p>No assignments found.</p>";
}
?>