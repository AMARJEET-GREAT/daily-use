<?php
$result = [];
$error = "";

if (isset($_POST['convert'])) {
    $value = $_POST['value'];
    $from_unit = $_POST['from_unit'];

    if ($value == "" || !is_numeric($value)) {
        $error = "Please enter a valid permeability value.";
    } else {
        // Step 1: Convert input to base unit = Henry/m (H/m)
        switch ($from_unit) {
            case "H_m": // Henry per meter
                $base = $value;
                break;
            case "mu0": // Vacuum permeability
                $base = $value * 1.2566370614e-6; // μ0 = 4π×10^-7 H/m
                break;
            case "gauss_oersted": // Gauss/Oe to H/m
                $base = $value * 7.958e-4; // Approximate
                break;
            default:
                $error = "Invalid input unit.";
                $base = 0;
        }

        if (!$error) {
            // Step 2: Convert base (H/m) to other units
            $result['H_m'] = $base;
            $result['mu0'] = $base / 1.2566370614e-6;
            $result['gauss_oersted'] = $base / 7.958e-4;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Permeability Converter</title>
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
            width: 70%;
            max-width: 600px;
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

<h2>🧲 Magnetic Permeability Converter (H/m, μ₀, Gauss/Oersted)</h2>

<form method="post">
    <input type="text" name="value" placeholder="Enter value" required>

    <br>

    <select name="from_unit">
        <option value="H_m">Henry/m (H/m)</option>
        <option value="mu0">Relative to μ₀ (vacuum permeability)</option>
        <option value="gauss_oersted">Gauss/Oersted</option>
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
        <tr><td>Henry/m (H/m)</td><td><?php echo round($result['H_m'], 10); ?></td></tr>
        <tr><td>Relative to μ₀</td><td><?php echo round($result['mu0'], 6); ?></td></tr>
        <tr><td>Gauss/Oersted</td><td><?php echo round($result['gauss_oersted'], 6); ?></td></tr>
    </table>
<?php endif; ?>

</body>
</html>
