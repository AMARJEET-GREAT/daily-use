<?php
$result = [];
$error = "";

// Default browser font size for px to em/rem conversion
$baseFontSize = 16; // 16px

if (isset($_POST['convert'])) {
    $value = $_POST['value'];
    $from_unit = $_POST['from_unit'];

    if ($value === "" || !is_numeric($value)) {
        $error = "Please enter a valid numeric value.";
    } else {
        // Step 1: Convert input to base unit = pixels (px)
        switch ($from_unit) {
            case "px":
                $base = $value;
                break;
            case "pt": // points
                $base = $value * 1.333333; // 1pt ≈ 1.3333px
                break;
            case "em":
                $base = $value * $baseFontSize; // em to px
                break;
            case "rem":
                $base = $value * $baseFontSize; // rem to px
                break;
            case "%": // percentage relative to base font size
                $base = ($value / 100) * $baseFontSize;
                break;
            default:
                $error = "Invalid input unit.";
                $base = 0;
        }

        if (!$error) {
            // Step 2: Convert base (px) to other units
            $result['px'] = $base;
            $result['pt'] = $base / 1.333333;
            $result['em'] = $base / $baseFontSize;
            $result['rem'] = $base / $baseFontSize;
            $result['%'] = ($base / $baseFontSize) * 100;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Typography Converter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background: #f0f4f7;
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

<h2>🖋️ Typography Unit Converter (px, pt, em, rem, %)</h2>

<form method="post">
    <input type="text" name="value" placeholder="Enter value" required>

    <br>

    <select name="from_unit">
        <option value="px">Pixels (px)</option>
        <option value="pt">Points (pt)</option>
        <option value="em">em</option>
        <option value="rem">rem</option>
        <option value="%">Percentage (%)</option>
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
        <tr><td>Pixels (px)</td><td><?php echo round($result['px'], 4); ?></td></tr>
        <tr><td>Points (pt)</td><td><?php echo round($result['pt'], 4); ?></td></tr>
        <tr><td>em</td><td><?php echo round($result['em'], 4); ?></td></tr>
        <tr><td>rem</td><td><?php echo round($result['rem'], 4); ?></td></tr>
        <tr><td>Percentage (%)</td><td><?php echo round($result['%'], 2); ?></td></tr>
    </table>
<?php endif; ?>

</body>
</html>
