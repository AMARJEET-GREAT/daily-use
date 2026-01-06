
<!DOCTYPE html>
<html>
<head>
    <title>Simple PHP Calculator</title>
</head>
<body>
    <h2>PHP Calculator</h2>
    <form method="post">
        <input type="number" name="num1" placeholder="Enter first number" required>
        <input type="number" name="num2" placeholder="Enter second number" required>
        <select name="operation">
            <option value="add">Add (+)</option>
            <option value="sub">Subtract (-)</option>
            <option value="mul">Multiply (×)</option>
            <option value="div">Divide (÷)</option>
        </select>
        <input type="submit" name="submit" value="Calculate">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $operation = $_POST['operation'];

        switch ($operation) {
            case "add":
                $result = $num1 + $num2;
                echo "<h3>Result: $num1 + $num2 = $result</h3>";
                break;
            case "sub":
                $result = $num1 - $num2;
                echo "<h3>Result: $num1 - $num2 = $result</h3>";
                break;
            case "mul":
                $result = $num1 * $num2;
                echo "<h3>Result: $num1 × $num2 = $result</h3>";
                break;
            case "div":
                if ($num2 == 0) {
                    echo "<h3>Error: Division by zero</h3>";
                } else {
                    $result = $num1 / $num2;
                    echo "<h3>Result: $num1 ÷ $num2 = $result</h3>";
                }
                break;
            default:
                echo "<h3>Invalid Operation</h3>";
        }
    }
    ?>
</body>
</html>


</body>
</html>