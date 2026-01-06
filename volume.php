<?php
$result = "";
$error = "";

if (isset($_POST['convert'])) {
    $volume = $_POST['volume'];
    $from_unit = $_POST['from_unit'];
    $to_unit = $_POST['to_unit'];

    if ($volume == "" || !is_numeric($volume)) {
        $error = "Please enter a valid volume value.";
    } else {
        // Step 1: Convert input volume to Liters
        switch ($from_unit) {
            case "liter":
                $liters = $volume;
                break;
            case "milliliter":
                $liters = $volume / 1000;
                break;
            case "cubic_meter":
                $liters = $volume * 1000;
                break;
            case "gallon":
                $liters = $volume * 3.78541;
                break;
            case "cubic_foot":
                $liters = $volume * 28.3168;
                break;
            default:
                $error = "Invalid input unit.";
                $liters = 0;
        }

        // Step 2: Convert liters to target unit
        switch ($to_unit) {
            case "liter":
                $result = $liters;
                break;
            case "milliliter":
                $result = $liters * 1000;
                break;
            case "cubic_meter":
                $result = $liters / 1000;
                break;
            case "gallon":
                $result = $liters / 3.78541;
                break;
            case "cubic_foot":
                $result = $liters / 28.3168;
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
    <title>Volume Converter</title>
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

<h2>⚗️ Volume Converter (PHP + HTML)</h2>

<form method="post">
    <input type="text" name="volume" placeholder="Enter volume" required>

    <br>

    <select name="from_unit">
        <option value="liter">Liter (L)</option>
        <option value="milliliter">Milliliter (mL)</option>
        <option value="cubic_meter">Cubic Meter (m³)</option>
        <option value="gallon">Gallon (US)</option>
        <option value="cubic_foot">Cubic Foot (ft³)</option>
    </select>

    <select name="to_unit">
        <option value="liter">Liter (L)</option>
        <option value="milliliter">Milliliter (mL)</option>
        <option value="cubic_meter">Cubic Meter (m³)</option>
        <option value="gallon">Gallon (US)</option>
        <option value="cubic_foot">Cubic Foot (ft³)</option>
    </select>

    <br>
    <button type="submit" name="convert">Convert</button>
</form>

<?php if ($result !== "" && !$error): ?>
    <div class="result">
        ✅ Result: <strong><?php echo round($result, 4); ?></strong> <?php echo htmlspecialchars($to_unit); ?>
    </div>
<?php elseif ($error): ?>
    <div class="error"><?php echo $error; ?></div>
<?php endif; ?>

</body>
</html>
