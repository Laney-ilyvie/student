<?php
include "db.php";
session_start(); ?>


<html>
<head>
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
</body>
</html>
    <div class="container">
        <h2> Your Assignments </h2>
<?php        
        $result = $conn->query ("SELECT * FROM assignments ");


 if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<h3>" . $row['title'] . "</h3>";
        echo "<a href='" . $row['file_path'] . "' download>Download Assignment</a><br><br>";

    }
 }
?>
</div>
</body>
</html>


