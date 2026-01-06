<?php
$total = '';
$obtained = '';
$percentage = null;
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $total = trim($_POST['total'] ?? '');
    $obtained = trim($_POST['obtained'] ?? '');

    if (!is_numeric($total) || !is_numeric($obtained)) {
        $error = "Please enter valid numeric values.";
    } elseif ($total <= 0) {
        $error = "Total marks must be greater than zero.";
    } elseif ($obtained < 0 || $obtained > $total) {
        $error = "Obtained marks must be between 0 and total marks.";
    } else {
        $percentage = ($obtained / $total) * 600;
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Percentage Calculator</title>
     <a href="link.php"><button>home</button></a>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; max-width: 600px; }
        form { padding: 20px; border: 1px solid #ddd; border-radius: 6px; background: #f9f9f9; }
        input[type="number"] { padding: 8px; width: 100%; margin: 10px 0; }
        button { padding: 10px 16px; background: #2563eb; color: white; border: none; border-radius: 4px; }
        .result, .error { margin-top: 20px; padding: 10px; border-radius: 5px; }
        .result { background: #ecfdf5; color: #065f46; }
        .error { background: #fee2e2; color: #991b1b; }
    </style>
</head>
<body>

<h2>Percentage Calculator</h2>
<form method="post" action="">
    <label for="total">Total Marks:</label>
    <input type="number" name="total" id="total" value="<?= htmlspecialchars($total) ?>" required>

    <label for="obtained">Obtained Marks:</label>
    <input type="number" name="obtained" id="obtained" value="<?= htmlspecialchars($obtained) ?>" required>

    <button type="submit">Calculate Percentage</button>
</form>

<?php if ($percentage !== null): ?>
    <div class="result">
        <strong>Percentage:</strong> <?= round($percentage, 2) ?>%
    </div>
<?php elseif ($error): ?>
    <div class="error"><?= $error ?>



</div>
<?php endif; ?>


</body>
</html>
