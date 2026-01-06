<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Scientific Calculator</title>

     <a href="index1.php"><button>home</button></a>
    <style>
        body {
            font-family: Arial;
            text-align: center;
            margin-top: 50px;
        }
        input, select {
            padding: 10px;
            margin: 10px;
            font-size: 16px;
        }
    </style>
</head>

<style>
        body { font-family: Arial, sans-serif; margin: 40px; max-width: 600px; }
        form { padding: 20px; border: 1px solid #ddd; border-radius: 6px; background: #f9f9f9; }
        input[type="number"] { padding: 8px; width: 100%; margin: 10px 0; }
        button { padding: 10px 16px; background: #2563eb; color: white; border: none; border-radius: 4px; }
        .result, .error { margin-top: 20px; padding: 10px; border-radius: 5px; }
        .result { background: #ecfdf5; color: #065f46; }
        .error { background: #fee2e2; color: #991b1b; }
    </style>
<body>
    <h1>PHP Scientific Calculator</h1>
    <form action="calculate.php" method="post">
        <input type="number" name="num1" step="any" placeholder="Enter first number" required>

        <select name="operation">
            <option value="add">+</option>
            <option value="subtract">−</option>
            <option value="multiply">×</option>
            <option value="divide">÷</option>
            <option value="sin">sin</option>
            <option value="cos">cos</option>
            <option value="tan">tan</option>
            <option value="sqrt">√ (Square Root)</option>
        </select>

        <input type="number" name="num2" step="any" placeholder="Second number (if needed)">

        <br>
        <input type="submit" value="Calculate">
    </form>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num1 = floatval($_POST['num1']);
    $num2 = isset($_POST['num2']) ? floatval($_POST['num2']) : 0;
    $operation = $_POST['operation'];
    $result = "";

    switch ($operation) {
        case "add":
            $result = $num1 + $num2;
            break;
        case "subtract":
            $result = $num1 - $num2;
            break;
        case "multiply":
            $result = $num1 * $num2;
            break;
        case "divide":
            if ($num2 == 0) {
                $result = "Error: Division by zero";
            } else {
                $result = $num1 / $num2;
            }
            break;
        case "sin":
            $result = sin(deg2rad($num1));
            break;
        case "cos":
            $result = cos(deg2rad($num1));
            break;
        case "tan":
            $result = tan(deg2rad($num1));
            break;
        case "sqrt":
            if ($num1 < 0) {
                $result = "Error: Negative square root";
            } else {
                $result = sqrt($num1);
            }
            break;
        default:
            $result = "Invalid operation";
    }

    echo "<h1>Result: $result</h1>";
    echo "<a href='index.html'>Go back</a>";
} else {
    echo "Invalid request.";
}
?>

