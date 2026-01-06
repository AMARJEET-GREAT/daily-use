<?php
$result = [];
$error = "";

// Reference sound pressure in air
$P0 = 20e-6; // 20 µPa

if (isset($_POST['convert'])) {
    $value = $_POST['value'];
    $from_unit = $_POST['from_unit'];

    if ($value === "" || !is_numeric($value)) {
        $error = "Please enter a valid numeric value.";
    } else {
        switch ($from_unit) {
            case "Pa": // Sound pressure in pascal
                $Pa = $value;
                $dB = 20 * log10($Pa / $P0);
                break;
            case "dB": // Sound level in decibels
                $dB = $value;
                $Pa = $P0 * pow(10, $dB / 20);
                break;
            default:
                $error = "Invalid input unit.";
                $Pa = 0;
                $dB = 0;
        }

        if (!$error) {
            $result['Pa'] = $Pa;
            $result['dB'] = $dB;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sound Converter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background: #f5f7fa;
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
            width: 50%;
            max-width: 400px;
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

<h2>🔊 Sound Level Converter (Pa ↔ dB SPL)</h2>

<form method="post">
    <input type="text" name="value" placeholder="Enter value" required>

    <br>

    <select name="from_unit">
        <option value="Pa">Pascal (Pa)</option>
        <option value="dB">Decibel (dB SPL)</option>
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
        <tr><td>Pascal (Pa)</td><td><?php echo round($result['Pa'], 6); ?></td></tr>
        <tr><td>Decibel (dB SPL)</td><td><?php echo round($result['dB'], 2); ?></td></tr>
    </table>
<?php endif; ?>

</body>
</html>
