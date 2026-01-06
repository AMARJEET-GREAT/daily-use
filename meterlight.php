<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mile ⇄ Meter Converter</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f8f9fa;
      margin: 40px;
    }
    .box {
      background: #fff;
      padding: 25px;
      border-radius: 10px;
      max-width: 600px;
      margin: auto;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      color: #007bff;
    }
    input, select, button {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      font-size: 1rem;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    button {
      cursor: pointer;
      border: none;
      border-radius: 5px;
    }
    .convert-btn {
      background-color: #007bff;
      color: white;
    }
    .convert-btn:hover {
      background-color: #0056b3;
    }
    .clear-btn {
      background-color: #dc3545;
      color: white;
    }
    .clear-btn:hover {
      background-color: #b02a37;
    }
    .result {
      background: #e9ecef;
      padding: 12px;
      border-radius: 5px;
      text-align: center;
      font-weight: bold;
      margin-top: 10px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: center;
    }
    th {
      background-color: #007bff;
      color: white;
    }
  </style>
</head>
<body>

<div class="box">
  <h2>Mile ⇄ Meter Converter</h2>

  <?php
  // Set default empty values
  $inputValue = "";
  $selectedDirection = "mi-to-m";
  $resultText = "";

  if (isset($_POST['convert'])) {
      $inputValue = floatval($_POST['value']);
      $selectedDirection = $_POST['direction'];

      // Conversion constants
      $MILE_TO_METER = 1609.344;
      $METER_TO_MILE = 1 / 1609.344;

      if ($selectedDirection == "mi-to-m") {
          $result = $inputValue * $MILE_TO_METER;
          $resultText = "$inputValue miles = " . number_format($result, 6) . " meters";
      } else {
          $result = $inputValue * $METER_TO_MILE;
          $resultText = "$inputValue meters = " . number_format($result, 6) . " miles";
      }
  }

  // Clear button pressed
  if (isset($_POST['clear'])) {
      $inputValue = "";
      $resultText = "";
      $selectedDirection = "mi-to-m";
  }
  ?>

  <form method="post">
    <label>Enter Value:</label>
    <input type="number" step="any" name="value" placeholder="Enter value" value="<?= htmlspecialchars($inputValue) ?>" required>

    <select name="direction">
      <option value="mi-to-m" <?= $selectedDirection == "mi-to-m" ? "selected" : "" ?>>Mile ➜ Meter</option>
      <option value="m-to-mi" <?= $selectedDirection == "m-to-mi" ? "selected" : "" ?>>Meter ➜ Mile</option>
    </select>

    <button type="submit" name="convert" class="convert-btn">Convert</button>
    <button type="submit" name="clear" class="clear-btn">Clear</button>
  </form>

  <?php if ($resultText): ?>
    <div class="result"><?= $resultText ?></div>
  <?php endif; ?>

  <h3>Conversion Formula</h3>
  <p>1 mile = 1609.344 meters<br>
     1 meter = 0.000621371 miles</p>

  <h3>Mile to Meter Conversion Table</h3>
  <table>
    <tr><th>Mile [mi]</th><th>Meter [m]</th></tr>
    <tr><td>0.01</td><td>16.09344</td></tr>
    <tr><td>0.1</td><td>160.9344</td></tr>
    <tr><td>1</td><td>1609.344</td></tr>
    <tr><td>2</td><td>3218.688</td></tr>
    <tr><td>3</td><td>4828.032</td></tr>
    <tr><td>5</td><td>8046.72</td></tr>
    <tr><td>10</td><td>16093.44</td></tr>
    <tr><td>20</td><td>32186.88</td></tr>
    <tr><td>50</td><td>80467.2</td></tr>
    <tr><td>100</td><td>160934.4</td></tr>
    <tr><td>1000</td><td>1609344</td></tr>
  </table>
</div>

</body>
</html>
