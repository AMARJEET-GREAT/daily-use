<!DOCTYPE html>
<html>
<head>
    <title>Land Area to Square Meter Converter</title>
     <a href="link.php"><button>home</button></a>
     <a href="link.php"><button>home</button></a>
</head>


<style>
        body { font-family: Arial, sans-serif; margin: 40px; max-width: 600px; }
        form { padding: 20px; border: 1px solid #ddd; border-radius: 6px; background: #f9f9f9; }
        input[type="number"] { padding: 8px; width: 100%; margin: 20px 0; }
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
<body>
  <header> 
                            <a style="text-decoration:none" class="navbar-brand fw-bold" href="index1.php"><h1>⚙️ tools Hub</h1></a>
                            <button class="toggle-btn" onclick="toggleSidebar()">☰ Menu</button> 
                        </header> 
    <h2>Land Area Converter (to Square Meters)</h2>

    <form method="post">
        <input type="number" name="area" step="0.01" placeholder="Enter area" required>
        <select name="unit">
            <option value="bigha">Bigha</option>
            <option value="acre">Acre</option>
            <option value="sqft">Square Feet</option>
            <option value="hectare">Hectare</option>
            <option value="sqm">Square Meters</option>
        </select>
        <input type="submit" name="convert" value="Convert to Square Meters">
    </form>

    <?php
    if (isset($_POST['convert'])) {
        $area = $_POST['area'];
        $unit = $_POST['unit'];
        $sqm = 0;

        switch ($unit) {
            case 'bigha':
                // Bigha value varies regionally, here using UP/India approx value: 1 bigha ≈ 2529 m²
                $sqm = $area * 2529;
                break;
            case 'acre':
                $sqm = $area * 4046.86; // 1 acre = 4046.86 m²
                break;
            case 'sqft':
                $sqm = $area * 0.092903; // 1 sq ft = 0.092903 m²
                break;
            case 'hectare':
                $sqm = $area * 10000; // 1 hectare = 10,000 m²
                break;
                case 'sqm':
            default:
                echo "<h3>Invalid unit selected</h3>";
                exit;
        }

        echo "<h3>$area $unit = $sqm square meters</h3>";
    }
    ?>
</body>
</html>
                                 <div class="main" id="main"> 
                                    <div class="grid"> 
                                            <a href="index.php" class="card">
                                             <h3>Age Calculator</h3>
                                              <p>Find your exact age in years, months, and days.</p> 
                                            </a>
                                             <a href="pdf.php" class="card">
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
                                                                                 <script>
                                                                                  function toggleSidebar() {
                                                                                   const sidebar = document.getElementById('sidebar');
                                                                                   const main = document.getElementById('main');
                                                                                    sidebar.classList.toggle('hide');
                                                                                     main.classList.toggle('full');
                                                                                       }

                                                                                       (function(){
                                                                                         const sidebar = document.getElementById('sidebar');
                                                                                         const main = document.getElementById('main');
                                                                                         const toggleBtn = document.querySelector('.toggle-btn');

                                                                                         // Close sidebar on small screens when touching/clicking outside
                                                                                         function closeIfMobileAndOpen(e){
                                                                                           if (window.innerWidth <= 768) {
                                                                                             const isOpen = sidebar.classList.contains('hide'); // on mobile .hide = visible
                                                                                             if (!isOpen) return;
                                                                                             if (e.target.closest('#sidebar') || e.target.closest('.toggle-btn')) return;
                                                                                             sidebar.classList.remove('hide');
                                                                                             main.classList.remove('full');
                                                                                           }
                                                                                         }

                                                                                         document.addEventListener('click', closeIfMobileAndOpen);
                                                                                         document.addEventListener('touchstart', closeIfMobileAndOpen, { passive: true });

                                                                                         // Close when a sidebar link is clicked (mobile)
                                                                                         sidebar.querySelectorAll('a').forEach(a=>{
                                                                                           a.addEventListener('click', function(){
                                                                                             if (window.innerWidth <= 768 && sidebar.classList.contains('hide')) {
                                                                                               sidebar.classList.remove('hide');
                                                                                               main.classList.remove('full');
                                                                                             }
                                                                                           });
                                                                                         });

                                                                                         // Keep state consistent on resize
                                                                                         window.addEventListener('resize', function(){
                                                                                           if (window.innerWidth > 768) {
                                                                                             sidebar.classList.remove('hide');
                                                                                             main.classList.remove('full');
                                                                                           }
                                                                                         });

                                                                                       })();
                                                                                 </script> 
                                                                                        </body> 
                                                                                        </html>
