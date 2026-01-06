<?php
$result = [];
$error = "";

if (isset($_POST['convert'])) {
    $value = $_POST['value'];
    $from_unit = $_POST['from_unit'];

    if ($value == "" || !is_numeric($value)) {
        $error = "Please enter a valid surface tension value.";
    } else {
        // Step 1: Convert input to base unit = N/m
        switch ($from_unit) {
            case "N_m":
                $base = $value;
                break;
            case "dyn_cm": // dyne/cm
                $base = $value * 0.001; // 1 dyn/cm = 0.001 N/m
                break;
            case "mN_m": // milliNewton/m
                $base = $value * 0.001; // 1 mN/m = 0.001 N/m
                break;
            case "mJ_m2": // milliJoule/m²
                $base = $value * 0.001; // 1 mJ/m² = 0.001 N/m
                break;
            default:
                $error = "Invalid input unit.";
                $base = 0;
        }

        if (!$error) {
            // Step 2: Convert base (N/m) to all other units
            $result['N_m'] = $base;
            $result['dyn_cm'] = $base / 0.001;
            $result['mN_m'] = $base / 0.001;
            $result['mJ_m2'] = $base / 0.001;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Surface Tension Converter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background: #eef2f3;
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
        table {
            margin: 20px auto;
            border-collapse: collapse;
            width: 60%;
            max-width: 500px;
        }
        th, td {
            border: 1px solid #aaa;
            padding: 8px 12px;
            text-align: center;
        }
        th {
            background: #ddd;
        }
        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<h2>🌊 Surface Tension Converter (N/m, dyn/cm, mN/m, mJ/m²)</h2>

<form method="post">
    <input type="text" name="value" placeholder="Enter value" required>

    <br>

    <select name="from_unit">
        <option value="N_m">Newton/m (N/m)</option>
        <option value="dyn_cm">Dyne/cm (dyn/cm)</option>
        <option value="mN_m">MilliNewton/m (mN/m)</option>
        <option value="mJ_m2">MilliJoule/m² (mJ/m²)</option>
    </select>

    <br>
    <button type="submit" name="convert">Convert</button>
</form>

<?php if ($error): ?>
    <div class="error"><?php echo $error; ?></div>
<?php elseif (!empty($result)): ?>
    <table>
        <tr>
            <th>Unit</th>
            <th>Value</th>
        </tr>
        <tr><td>Newton/m (N/m)</td><td><?php echo round($result['N_m'], 6); ?></td></tr>
        <tr><td>Dyne/cm (dyn/cm)</td><td><?php echo round($result['dyn_cm'], 6); ?></td></tr>
        <tr><td>MilliNewton/m (mN/m)</td><td><?php echo round($result['mN_m'], 6); ?></td></tr>
        <tr><td>MilliJoule/m² (mJ/m²)</td><td><?php echo round($result['mJ_m2'], 6); ?></td></tr>
    </table>
<?php endif; ?>

</body>
</html>
