<?php
<?php
// Initialize variables
$database = $maths = $others = $average = $status = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the input values from the form
    $database = $_POST['database'];
    $maths = $_POST['maths'];
    $others = $_POST['others'];

    // Calculate the average score
    $average = ($database + $maths + $others) / 3;

    // Determine competency status
    if ($average >= 70) {
        $status = "Competent";
    } else {
        $status = "Non-Competent";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Competency Evaluation</title>
</head>
<body>
    <h2>Competency Evaluation Form</h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="database">Database Marks:</label>
        <input type="number" id="database" name="database" required><br><br>

        <label for="maths">Maths Marks:</label>
        <input type="number" id="maths" name="maths" required><br><br>

        <label for="others">Other Subjects Marks:</label>
        <input type="number" id="others" name="others" required><br><br>

        <input type="submit" value="Submit">
    </form>

    <?php
    // Display the result after submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<h3>Result:</h3>";
        echo "Database Marks: $database<br>";
        echo "Maths Marks: $maths<br>";
        echo "Other Subjects Marks: $others<br>";
        echo "Average Marks: $average<br>";
        echo "Status: <strong>$status</strong>";
    }
    ?>
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
</html>
