<?php
$result = "";
$error = "";

if (isset($_POST['convert'])) {
    $mass = $_POST['mass'];
    $from_unit = $_POST['from_unit'];
    $to_unit = $_POST['to_unit'];

    if ($mass == "" || !is_numeric($mass)) {
        $error = "Please enter a valid mass or weight value.";
    } else {
        // Step 1: Convert input to grams
        switch ($from_unit) {
            case "gram":
                $grams = $mass;
                break;
            case "kilogram":
                $grams = $mass * 1000;
                break;
            case "milligram":
                $grams = $mass / 1000;
                break;
            case "pound":
                $grams = $mass * 453.59237;
                break;
            case "ounce":
                $grams = $mass * 28.3495;
                break;
            default:
                $error = "Invalid input unit.";
                $grams = 0;
        }

        // Step 2: Convert grams to target unit
        switch ($to_unit) {
            case "gram":
                $result = $grams;
                break;
            case "kilogram":
                $result = $grams / 1000;
                break;
            case "milligram":
                $result = $grams * 1000;
                break;
            case "pound":
                $result = $grams / 453.59237;
                break;
            case "ounce":
                $result = $grams / 28.3495;
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
    <title>Weight and Mass Converter</title>
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

<h2>⚖️ Weight & Mass Converter (PHP + HTML)</h2>

<form method="post">
    <input type="text" name="mass" placeholder="Enter mass or weight" required>

    <br>

    <select name="from_unit">
        <option value="gram">Gram (g)</option>
<?php
$result = "";
$error = "";

if (isset($_POST['convert'])) {
    $mass = $_POST['mass'];
    $from_unit = $_POST['from_unit'];
    $to_unit = $_POST['to_unit'];

    if ($mass == "" || !is_numeric($mass)) {
        $error = "Please enter a valid mass or weight value.";
    } else {
        // Step 1: Convert input to grams
        switch ($from_unit) {
            case "gram":
                $grams = $mass;
                break;
            case "kilogram":
                $grams = $mass * 1000;
                break;
            case "milligram":
                $grams = $mass / 1000;
                break;
            case "pound":
                $grams = $mass * 453.59237;
                break;
            case "ounce":
                $grams = $mass * 28.3495;
                break;
            default:
                $error = "Invalid input unit.";
                $grams = 0;
        }

        // Step 2: Convert grams to target unit
        switch ($to_unit) {
            case "gram":
                $result = $grams;
                break;
            case "kilogram":
                $result = $grams / 1000;
                break;
            case "milligram":
                $result = $grams * 1000;
                break;
            case "pound":
                $result = $grams / 453.59237;
                break;
            case "ounce":
                $result = $grams / 28.3495;
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
    <title>Weight and Mass Converter</title>
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

<h2>⚖️ Weight & Mass Converter (PHP + HTML)</h2>

<form method="post">
    <input type="text" name="mass" placeholder="Enter mass or weight" required>

    <br>

    <select name="from_unit">
        <option value="gram">Gram (g)</option>
        <option value="kilogram">Kilogram (kg)</option>
        <option value="milligram">Milligram (mg)</option>
        <option value="pound">Pound (lb)</option>
        <option value="ounce">Ounce (oz)</option>
    </select>

    <select name="to_unit">
        <option value="gram">Gram (g)</option>
        <option value="kilogram">Kilogram (kg)</option>
        <option value="milligram">Milligram (mg)</option>
        <option value="pound">Pound (lb)</option>
        <option value="ounce">Ounce (oz)</option>
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
