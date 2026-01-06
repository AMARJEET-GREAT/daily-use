<?php
$number = '';
$result = '';
$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["number"])) {
        $number = trim($_POST["number"]);

        if (!is_numeric($number)) {
            $error = "Please enter a valid number.";
        } else {
            $number = (int)$number;

            if ($number % 2 == 0) {
                $result = "$number is an <strong>Even</strong> number.";
            } else {
                $result = "$number is an <strong>Odd</strong> number.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Odd or Even Checker</title>
     <a href="link.php"><button>home</button></a>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; max-width: 90%; }
        form { padding: 20px; border: 1px solid #ddd; border-radius: 6px; background: #f9f9f9; }
        input[type="number"] { padding: 8px; width: 60%; margin: 10px 0; }
        button { padding: 10px 16px; background: #2563eb; color: white; border: none; border-radius: 4px; }
        .result, .error { margin-top: 20px; padding: 10px; border-radius: 5px; }
        .result { background: #ecfdf5; color: #065f46; }
        .error { background: #fee2e2; color: #991b1b; }
         .grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 25px; animation: fadeIn 1s ease; }
                @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
                 .card { background: #ffffff; border-radius: 16px; box-shadow: 0 6px 12px rgba(0,0,0,0.1); padding: 30px 20px; text-align: center; cursor: pointer; text-decoration: none; color: #333; transition: all 0.3s ease; } 
                 .card:hover { transform: translateY(-8px); background: linear-gradient(135deg, #5b73e8, #7b3fe4); color: white; box-shadow: 0 10px 18px rgba(91, 115, 232, 0.4); }
                 .card h3 { font-size: 18px; margin-bottom: 10px; }
                  .card p { font-size: 14px; color: #555; } 
                  .card:hover p { color: #f5f5f5; } @media (max-width: 768px) { 
                    .sidebar { width: 220px; left: -220px; } 
                    .sidebar.hide { left: 0; }
                     .main { margin-left: 0; } 
                     .main.full { margin-left: 0; } }
    </style>
</head>
<body>

<h2>Odd or Even Checker</h2>
<form method="post" action="">
    <label for="number">Enter a number:</label>
    <input type="number" name="number" id="number" value="<?= htmlspecialchars($number) ?>" required>

    <button type="submit">Check</button>
</form>

<?php if ($result): ?>
    <div class="result"><?= $result ?></div>
<?php elseif ($error): ?>
    <div class="error"><?= $error ?></div>
<?php endif; ?>

</body>
</html>

<div id="preview"></div>
                                   <div class="main" id="main"> 
                                    <div class="grid"> 
                                            <a href="index.html" class="card">
                                             <h3>Age Calculator</h3>
                                              <p>Find your exact age in years, months, and days.</p> 
                                            </a>
                                             <a href="pdf.html" class="card">
                                                 <h3>pdf donlwoder</h3> 
                                                 <p>pdf image and document.</p> 
                                                </a>
                                                 <a href="meter.php" class="card">
                                                     <h3>meter</h3> 
                                                     <p>meter to legnth.</p>
                                                     </a> <a href="" class="card">
                                                         <h3>Time Calculator</h3>
                                                          <p>Add or subtract time easily.</p> 
                                                        </a> <a href="odd.php" class="card"> 
                                                            <h3>odd even </h3>
                                                             <p>Calculate days between two dates.</p>
                                                             </a> <a href="speed.php" class="card">
                                                                 <h3>speed checker</h3>
                                                                  <p>Count words and characters instantly.</p>
                                                                 </a> <a href="area.php" class="card">
                                                                     <h3>area of cricle</h3>
                                                                      <p>Easily find and replace text.</p>
                                                                     </a> <a href="length.html" class="card">
                                                                         <h3>Length Converter</h3>
                                                                          <p>Convert lengths between different units.</p>
                                                                         </a> <a href="percentage.html" class="card">
                                                                             <h3>Percentage Calculator</h3>
                                                                              <p>Calculate percentages quickly.</p>
                                                                             </a> <a href="simpleinterest.html" class="card">
                                                                                 <h3>Simple Interest</h3>
                                                                                  <p>Compute simple interest on investments.</p>
                                                                                 </a> 
                                                                                 </div> 
                                                                                 </div> 
                                                                  

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <script>
    const { jsPDF } = window.jspdf;

    const imageInput = document.getElementById('imageInput');
    const preview = document.getElementById('preview');
    let imageFiles = [];

    imageInput.addEventListener('change', (e) => {
      imageFiles = Array.from(e.target.files);
      preview.innerHTML = '';

      // Show preview (optional)
      imageFiles.forEach(file => {
        const reader = new FileReader();
        reader.onload = function(e) {
          const img = document.createElement('img');
          img.src = e.target.result;
          preview.appendChild(img);
        };
        reader.readAsDataURL(file);
      });
    });

    async function convertToPDF() {
      if (imageFiles.length === 0) {
        alert("Please select some images first.");
        return;
      }

      const pdf = new jsPDF();

      for (let i = 0; i < imageFiles.length; i++) {
        const file = imageFiles[i];
        const imgData = await readFileAsDataURL(file);
        
        const img = new Image();
        img.src = imgData;

        await new Promise((resolve) => {
          img.onload = function () {
            const pageWidth = pdf.internal.pageSize.getWidth();
            const pageHeight = pdf.internal.pageSize.getHeight();

            const ratio = Math.min(pageWidth / img.width, pageHeight / img.height);
            const imgWidth = img.width * ratio;
            const imgHeight = img.height * ratio;

            const x = (pageWidth - imgWidth) / 2;
            const y = (pageHeight - imgHeight) / 2;

            if (i > 0) pdf.addPage();
            pdf.addImage(img, 'JPEG', x, y, imgWidth, imgHeight);
            resolve();
          };
        });
      }

      pdf.save("images_to_pdf.pdf");
    }

    function readFileAsDataURL(file) {
      return new Promise((resolve) => {
        const reader = new FileReader();
        reader.onload = () => resolve(reader.result);
        reader.readAsDataURL(file);
      });
    }
  </script>
</body>
</html>
