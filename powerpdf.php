<?php
// ---------- PHP PART ----------
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['excel'])) {

    $uploadDir = "uploads/";
    $outputDir = "outputs/";

    if (!is_dir($uploadDir)) mkdir($uploadDir);
    if (!is_dir($outputDir)) mkdir($outputDir);

    $allowed = ['xls', 'xlsx'];
    $ext = strtolower(pathinfo($_FILES['excel']['name'], PATHINFO_EXTENSION));

    if (!in_array($ext, $allowed)) {
        $message = "<p style='color:red'>❌ Only XLS or XLSX allowed</p>";
    } else {

        $fileName = time() . "_" . basename($_FILES['excel']['name']);
        $uploadPath = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES['excel']['tmp_name'], $uploadPath)) {

            $command = "libreoffice --headless --convert-to pdf --outdir "
                     . escapeshellarg($outputDir) . " "
                     . escapeshellarg($uploadPath);

            exec($command, $out, $status);

            $pdfName = pathinfo($fileName, PATHINFO_FILENAME) . ".pdf";
            $pdfPath = $outputDir . $pdfName;

            if ($status === 0 && file_exists($pdfPath)) {
                $message = "<p style='color:green'>✅ Excel converted to PDF</p>
                            <a href='$pdfPath' download>⬇ Download PDF</a>";
            } else {
                $message = "<p style='color:red'>❌ Conversion failed</p>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Excel to PDF Converter</title>
    <style>
        body {
            font-family: Arial;
            background: #f2f2f2;
        }
        .box {
            width: 420px;
            margin: 100px auto;
            background: white;
            padding: 20px;
            text-align: center;
            border-radius: 8px;
        }
        input[type=file] {
            width: 100%;
            margin: 15px 0;
        }
        button {
            background: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background: #1e7e34;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>Excel to PDF Converter</h2>

    <form method="post" enctype="multipart/form-data">
        <input type="file" name="excel" accept=".xls,.xlsx" required>
        <button type="submit">Convert to PDF</button>
    </form>

    <br>
    <?php echo $message; ?>
</div>

</body>
</html>
