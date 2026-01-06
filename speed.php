<!DOCTYPE html>
<html>
<head>
    <title>Train Speed Checker</title>

         <a href="index1.php"><button>home</button></a>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; max-width: 600px; }
        form { padding: 20px; border: 1px solid #ddd; border-radius: 6px; background: #f9f9f9; }
        input[type="number"] { padding: 8px; width: 100%; margin: 10px 0; }
        button { padding: 10px 16px; background: #2563eb; color: white; border: none; border-radius: 4px; }
        .result, .error { margin-top: 20px; padding: 10px; border-radius: 5px; }
        .result { background: #ecfdf5; color: #065f46; }
        .error { background: #fee2e2; color: #991b1b; }
    </style>
</head>
<body>
    <h2>Train Speed Checker</h2>
    <form action="speed.php" method="post">
        <label>Distance (in kilometers):</label>
        <input type="number" name="distance" step="0.01" required><br><br>

        <label>Time (in hours):</label>
        <input type="number" name="time" step="0.01" required><br><br>

        <input type="submit" value="Check Speed">
    </form>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $distance = $_POST['distance'];
    $time = $_POST['time'];

    if ($time > 0) {
        $speed = $distance / $time;
        echo "<h2>Result:</h2>";
        echo "Distance: " . $distance . " km<br>";
        echo "Time: " . $time . " hours<br>";
        echo "<strong>Speed: " . round($speed, 2) . " km/h</strong>";
    } else {
        echo "Time must be greater than 0.";
    }
} else {
    echo "Invalid request.";
}
?>