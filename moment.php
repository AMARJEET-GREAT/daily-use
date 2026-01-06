<?php
$result = "";
$error = "";

if (isset($_POST['convert'])) {
    $moment = $_POST['moment'];
    $from_unit = $_POST['from_unit'];
    $to_unit = $_POST['to_unit'];

    if ($moment == "" || !is_numeric($moment)) {
        $error = "Please enter a valid moment of force value.";
    } else {
        // Step 1: Convert input to Newton-meter (N·m)
        switch ($from_unit) {
            case "newton_meter":
                $nm = $moment;
                break;
            case "kilonewton_meter":
                $nm = $moment * 1000;
                break;
            case "pound_foot":
                $nm = $moment * 1.35582;
                break;
            case "pound_inch":
                $nm = $moment * 0.112985;
                break;
            default:
                $error = "Invalid input unit.";
                $nm = 0;
        }

        // Step 2: Convert N·m to target unit
        switch ($to_unit) {
            case "newton_meter":
                $result = $nm;
                break;
            case "kilonewton_meter":
                $result = $nm / 1000;
                break;
            case "pound_foot":
                $result = $nm / 1.35582;
                break;
            case "pound_inch":
                $result = $nm / 0.112985;
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
    <title>Moment of Force (Torque) Converter</title>
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

<h2>⚙️ Moment of Force (Torque) Converter (PHP + HTML)</h2>

<form method="post">
    <input type="text" name="moment" placeholder="Enter value" required>

    <br>

    <select name="from_unit">
        <option value="newton_meter">Newton-meter (N·m)</option>
        <option value="kilonewton_meter">Kilonewton-meter (kN·m)</option>
        <option value="pound_foot">Pound-foot (lb·ft)</option>
        <option value="pound_inch">Pound-inch (lb·in)</option>
    </select>

    <select name="to_unit">
        <option value="newton_meter">Newton-meter (N·m)</option>
        <option value="kilonewton_meter">Kilonewton-meter (kN·m)</option>
        <option value="pound_foot">Pound-foot (lb·ft)</option>
        <option value="pound_inch">Pound-inch (lb·in)</option>
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
