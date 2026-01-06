<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Calculators</title>
  <style>
    /* ====== Basic Page Setup ====== */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background: #f5f7fa;
      color: #333;
      scroll-behavior: smooth;
    }

    /* ====== Header ====== */
    header {
      background-color: #007bff;
      color: white;
      padding: 12px 20px;
      text-align: center;
      font-size: 20px;
      font-weight: bold;
      position: sticky;
      top: 0;
      z-index: 100;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    }

    /* ====== Scrollbar Style ====== */
    ::-webkit-scrollbar {
      width: 10px;
    }
    ::-webkit-scrollbar-track {
      background: #e1e1e1;
    }
    ::-webkit-scrollbar-thumb {
      background: #007bff;
      border-radius: 6px;
    }
    ::-webkit-scrollbar-thumb:hover {
      background: #0056b3;
    }

    /* ====== Title ====== */
    h1 {
      text-align: center;
      margin-top: 20px;
      color: #0056b3;
    }

    /* ====== Search Bar ====== */
    .search-container {
      text-align: center;
      margin: 20px auto;
    }

    #searchInput {
      width: 80%;
      max-width: 500px;
      padding: 10px 15px;
      border: 2px solid #007bff;
      border-radius: 6px;
      font-size: 16px;
      outline: none;
    }

    /* ====== Main Container ====== */
    .container {
      width: 90%;
      max-width: 1200px;
      margin: auto;
    }

    /* ====== Card Grid ====== */
    .calculator-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 15px;
      margin: 20px 0;
    }

    /* ====== Card Design ====== */
    .card {
      background: white;
      border-radius: 10px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      padding: 20px;
      cursor: pointer;
      transition: transform 0.2s, box-shadow 0.2s;
    }

    .card:hover {
      transform: translateY(-4px);
      box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    }

    .card h2 {
      color: #007bff;
      margin-bottom: 10px;
      font-size: 20px;
    }

    .card p {
      color: #555;
      font-size: 14px;
    }

    hr {
      margin: 30px 0;
      border: none;
      border-top: 2px solid #eee;
    }
  </style>
</head>
<body>

  <!-- ===== Header ===== -->
  <header>
    All Calculators
  </header>

  <div class="container">
    <h1>All Calculators</h1>

    <!-- ===== Search Bar ===== -->
    <div class="search-container">
      <input type="text" id="searchInput" placeholder="Search calculator...">
    </div>

    <!-- ===== Calculator Grid ===== -->
    <div class="calculator-grid" id="calculatorGrid">
      <div class="card" onclick="location.href='polygon-perimeter-calculator.html'">
        <h2>Prime Calculator</h2>
        <p>Check prime numbers and get advanced features like factorization and range.</p>
      </div>
      <div class="card" onclick="location.href='multiplication.html'">
        <h2>Multiplication Calculator</h2>
        <p>Multiply two numbers quickly and easily with result display.</p>
      </div>
      <div class="card" onclick="location.href='bmi.html'">
        <h2>BMI Calculator</h2>
        <p>Calculate your Body Mass Index (BMI) using weight and height.</p>
      </div>
      <div class="card" onclick="location.href='EMI.html'">
        <h2>EMI Calculator</h2>
        <p>Calculate monthly EMI for loans with principal, rate, and tenure.</p>
      </div>
      <div class="card" onclick="location.href='SIP-Calculator.html'">
        <h2>SIP Calculator</h2>
        <p>Estimate your mutual fund returns using SIP investment details.</p>
      </div>
      <div class="card" onclick="location.href='Age.html'">
        <h2>Age Calculator</h2>
        <p>Find your age in years, months, and days based on your date of birth.</p>
      </div>
      <div class="card" onclick="location.href='prcentage.html'">
        <h2>Percentage Calculator</h2>
        <p>Calculate percentage, percentage increase/decrease, and related values.</p>
      </div>
      <div class="card" onclick="location.href='time-calculator.html'">
        <h2>Time Calculator</h2>
        <p>Calculate duration, add/subtract hours and minutes, and find total time easily.</p>
      </div>
      <div class="card" onclick="location.href='calorie-calculator.html'">
        <h2>Calorie Calculator</h2>
        <p>Calculate daily calorie needs based on weight, height, age, gender, and activity level.</p>
      </div>
      <div class="card" onclick="location.href='date-calculator.html'">
        <h2>Date Calculator</h2>
        <p>Calculate difference between dates or find a future/past date quickly.</p>
      </div>
      <div class="card" onclick="location.href='dynamic-gpa-calculator.html'">
        <h2>Dynamic GPA Calculator</h2>
        <p>Calculate GPA dynamically for multiple subjects with different credits and grades.</p>
      </div>
      <div class="card" onclick="location.href='fuel-consumption-calculator.html'">
        <h2>Fuel Consumption Calculator</h2>
        <p>Calculate fuel consumption, mileage, and fuel costs for your vehicle efficiently.</p>
      </div>
      <div class="card" onclick="location.href='rational-calculator.html'">
        <h2>Rational Calculator</h2>
        <p>Perform addition, subtraction, multiplication, and division of fractions.</p>
      </div>
      <div class="card" onclick="location.href='fraction-addition-calculator.html'">
        <h2>Fraction Addition Calculator</h2>
        <p>Add two fractions and get the simplified result.</p>
      </div>
      <div class="card" onclick="location.href='hexa-to-decimal-calculator.html'">
        <h2>Hexa to Decimal Calculator</h2>
        <p>Convert any hexadecimal number into its decimal value instantly.</p>
      </div>
      <div class="card" onclick="location.href='GST-Calculator.html'">
        <h2>GST Calculator</h2>
        <p>Quickly calculate GST for any amount — inclusive or exclusive, with CGST/SGST or IGST options.</p>
      </div>
      <hr>
      <div class="card" onclick="location.href='resume-builder.html'">
        <h2>Resume Builder</h2>
        <p>Create professional resumes quickly — fill your details and download as PDF instantly.</p>
      </div>
      <div class="card" onclick="location.href='qr-code-generator.html'">
        <h2>QR Code Generator</h2>
        <p>Generate QR codes instantly for URLs, text, or contact info — ready to download or share.</p>
      </div>
      <div class="card" onclick="location.href='Grocery-Bill-Generator.html'">
        <h2>Grocery / Retail Bill Generator</h2>
        <p>Create bills for grocery or retail stores with quantity, GST, discounts, and PDF download.</p>
      </div>
      <div class="card" onclick="location.href='Utility-Bill-Generator.html'">
        <h2>Utility Bill Generator</h2>
        <p>Generate electricity, water, or gas bills with consumption, taxes, and PDF export.</p>
      </div>
      <div class="card" onclick="location.href='Service-Invoice-Generator.html'">
        <h2>Service Invoice Generator</h2>
        <p>Create invoices for services like freelance work or company projects with GST and PDF download.</p>
      </div>
      <div class="card" onclick="location.href='ecommerce-invoice.html'">
        <h2>E-commerce / Online Store Invoice Generator</h2>
        <p>Generate invoices for online orders with product list, taxes, discounts, shipping, and PDF.</p>
      </div>
      <div class="card" onclick="location.href='medical-bill.html'">
        <h2>Medical / Pharmacy Bill Generator</h2>
        <p>Create medical bills with medicine list, quantity, GST, discounts, and PDF download.</p>
      </div>
      <div class="card" onclick="location.href='restaurant-bill-generator.html'">
        <h2>Restaurant / Cafe Bill Generator</h2>
        <p>Generate bills for restaurant or cafe orders. Add menu items, quantity, price, GST & discounts. Download PDF instantly.</p>
      </div>
    </div>
  </div>

  