<?php
$result = "";
$error = "";

if (isset($_POST['convert'])) {
    $value = $_POST['value'];
    $from_unit = $_POST['from_unit'];
    $to_unit = $_POST['to_unit'];

    if ($value == "" || !is_numeric($value)) {
        $error = "Please enter a valid thermal resistance value.";
    } else {
        // Step 1: Convert input to base unit = K/W
        switch ($from_unit) {
            case "k_per_w":
                $kw = $value;
                break;
            case "c_per_w":
                $kw = $value; // Celsius per Watt ≈ Kelvin per Watt (same difference)
                break;
            case "fhr_per_btu":
                // 1 (°F·hr/BTU) = 0.1761 (K/W)
                $kw = $value * 0.1761;
                break;
            default:
                $error = "Invalid input unit.";
                $kw = 0;
        }

        // Step 2: Convert K/W to target unit
        switch ($to_unit) {
            case "k_per_w":
                $result = $kw;
                break;
            case "c_per_w":
                $result = $kw; // same scale
                break;
            case "fhr_per_btu":
                $result = $kw / 0.1761;
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
    <title>Thermal Resistance Converter</title>
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

<h2>🌡️ Thermal Resistance Converter (PHP + HTML)</h2>

<form method="post">
    <input type="text" name="value" placeholder="Enter value" required>

    <br>

    <select name="from_unit">
        <option value="k_per_w">Kelvin per Watt (K/W)</option>
        <option value="c_per_w">Celsius per Watt (°C/W)</option>
        <option value="fhr_per_btu">Fahrenheit·hr/BTU (°F·hr/BTU)</option>
    </select>

    <select name="to_unit">
        <option value="k_per_w">Kelvin per Watt (K/W)</option>
        <option value="c_per_w">Celsius per Watt (°C/W)</option>
        <option value="fhr_per_btu">Fahrenheit·hr/BTU (°F·hr/BTU)</option>
    </select>

    <br>
    <button type="submit" name="convert">Convert</button>
</form>

<?php if ($result !== "" && !$error): ?>
    <div class="result">
        ✅ Result: <strong><?php echo round($result, 6); ?></strong> <?php echo htmlspecialchars($to_unit); ?>
    </div>
<?php elseif ($error): ?>
    <div class="error"><?php echo $error; ?></div>
<?php endif; ?>

</body>
</html>
