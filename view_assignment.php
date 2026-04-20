<?php
include "db.php";
session_start();

// check login
if (!isset($_SESSION['student'])) {
    header("Location: login.php");
    exit();
}

$student = $_SESSION['student'];

// get student id using email/username stored in session
$getStudent = $conn->query("SELECT id FROM students WHERE email='$student'");
$studentData = $getStudent->fetch_assoc();
$student_id = $studentData['id'];

// fetch assignments for that student
$result = $conn->query("
    SELECT a.title, a.description, a.file_path
    FROM assignments a
    JOIN student_assignments sa ON a.id = sa.assignment_id
    WHERE sa.student_id = $student_id
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Assignments</title>
</head>
<body>

<h2>Welcome <?php echo $_SESSION['student']; ?></h2>
<h3>Your Assignments</h3>

<?php
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div style='border:1px solid black; padding:10px; margin:10px;'>";
        echo "<h4>{$row['title']}</h4>";
        echo "<p>{$row['description']}</p>";

        if (!empty($row['file_path'])) {
            echo "<a href='{$row['file_path']}' download>Download</a>";
        }

        echo "</div>";
    }
} else {
    echo "<p>No assignments available</p>";
}
?>

<a href="dashboard.php">Back to Dashboard</a>

</body>
</html>