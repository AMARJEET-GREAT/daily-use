<?php
$result = "";
$error = "";

if (isset($_POST['convert'])) {
    $temp = $_POST['temperature'];
    $from_unit = $_POST['from_unit'];
    $to_unit = $_POST['to_unit'];

    if ($temp == "" || !is_numeric($temp)) {
        $error = "Please enter a valid temperature value.";
    } else {
        // Step 1: Convert input to Celsius
        switch ($from_unit) {
            case "Celsius":
                $celsius = $temp;
                break;
            case "Fahrenheit":
                $celsius = ($temp - 32) * 5 / 9;
                break;
            case "Kelvin":
                $celsius = $temp - 273.15;
                break;
            default:
                $error = "Invalid input unit.";
                $celsius = 0;
        }

        // Step 2: Convert Celsius to target unit
        switch ($to_unit) {
            case "Celsius":
                $result = $celsius;
                break;
            case "Fahrenheit":
                $result = ($celsius * 9 / 5) + 32;
                break;
            case "Kelvin":
                $result = $celsius + 273.15;
                break;
            default:
                $error = "Invalid target unit.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Temperature Converter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #eef2f3;
            text-align: center;
            padding: 40px;
        }
        form {
            background: white;
            display: inline-block;
            padding: 25px 35px;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
        }
        input, select, button {
            margin: 10px;
            padding: 10px;
            font-size: 16px;
        }
        .result {
            color: green;
            margin-top: 20px;
            font-size: 20px;
        }
        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<h2>🌡️ Temperature Converter (PHP + HTML)</h2>

<form method="post">
    <input type="text" name="temperature" placeholder="Enter temperature" required>

    <br>

    <select name="from_unit">
        <option value="Celsius">Celsius (°C)</option>
        <option value="Fahrenheit">Fahrenheit (°F)</option>
        <option value="Kelvin">Kelvin (K)</option>
    </select>

    <select name="to_unit">
        <option value="Celsius">Celsius (°C)</option>
        <option value="Fahrenheit">Fahrenheit (°F)</option>
        <option value="Kelvin">Kelvin (K)</option>
    </select>

    <br>
    <button type="submit" name="convert">Convert</button>
</form>

<?php if ($result !== "" && !$error): ?>
    <div class="result">
        ✅ Result: <strong><?php echo round($result, 2); ?></strong> <?php echo htmlspecialchars($to_unit); ?>
    </div>
<?php elseif ($error): ?>
    <div class="error"><?php echo $error; ?></div>
<?php endif; ?>

</body>
</html>
