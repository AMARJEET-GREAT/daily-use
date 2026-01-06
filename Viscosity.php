<?php
$result = [];
$error = "";

if (isset($_POST['convert'])) {
    $value = $_POST['value'];
    $from_unit = $_POST['from_unit'];

    if ($value == "" || !is_numeric($value)) {
        $error = "Please enter a valid dynamic viscosity value.";
    } else {
        // Step 1: Convert input to base unit = Pascal second (Pa·s)
        switch ($from_unit) {
            case "pa_s":
                $base = $value;
                break;
            case "cp": // centipoise
                $base = $value * 0.001; // 1 cP = 0.001 Pa·s
                break;
            case "poise":
                $base = $value * 0.1; // 1 P = 0.1 Pa·s
                break;
            case "lb_ft_s":
                $base = $value * 47.8803; // 1 lb/(ft·s) = 47.8803 Pa·s
                break;
            case "lb_in_s":
                $base = $value * 5547.9; // 1 lb/(in·s) = 5547.9 Pa·s
                break;
            default:
                $error = "Invalid input unit.";
                $base = 0;
        }

        if (!$error) {
            // Step 2: Convert base (Pa·s) to all other units
            $result['pa_s'] = $base;
            $result['cp'] = $base / 0.001;
            $result['poise'] = $base / 0.1;
            $result['lb_ft_s'] = $base / 47.8803;
            $result['lb_in_s'] = $base / 5547.9;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dynamic Viscosity Converter</title>
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
            width: 80%;
            max-width: 700px;
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

<h2>🧪 Dynamic Viscosity Converter (Pa·s, cP, Poise, lb/(ft·s))</h2>

<form method="post">
    <input type="text" name="value" placeholder="Enter value" required>

    <br>

    <select name="from_unit">
        <option value="pa_s">Pascal second (Pa·s)</option>
        <option value="cp">Centipoise (cP)</option>
        <option value="poise">Poise (P)</option>
        <option value="lb_ft_s">Pound/(ft·s)</option>
        <option value="lb_in_s">Pound/(in·s)</option>
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
        <tr><td>Pascal second (Pa·s)</td><td><?php echo round($result['pa_s'], 6); ?></td></tr>
        <tr><td>Centipoise (cP)</td><td><?php echo round($result['cp'], 6); ?></td></tr>
        <tr><td>Poise (P)</td><td><?php echo round($result['poise'], 6); ?></td></tr>
        <tr><td>Pound/(ft·s)</td><td><?php echo round($result['lb_ft_s'], 6); ?></td></tr>
        <tr><td>Pound/(in·s)</td><td><?php echo round($result['lb_in_s'], 6); ?></td></tr>
    </table>
<?php endif; ?>

</body>
</html>
