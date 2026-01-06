<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<title>Converter Toolkit — Demo</title>
<style>
  body{font-family:system-ui,-apple-system,Segoe UI,Roboto; padding:20px; max-width:800px; margin:auto;}
  .card{border:1px solid #eee; padding:16px; border-radius:8px; margin-bottom:12px;}
  label{display:block; font-size:13px; margin-bottom:6px;}
  input, select, button{padding:8px; font-size:16px; margin-right:8px;}
  .row{display:flex; gap:8px; align-items:center; flex-wrap:wrap;}
  .result{font-weight:700; margin-top:8px;}
</style>
</head>
<body>
<h1>Converter Toolkit — Demo</h1>

<div class="card" id="tempCard">
  <h2>Temperature</h2>
  <div class="row">
    <input id="tempInput" type="number" value="25" />
    <select id="tempFrom">
      <option value="C">°C</option><option value="F">°F</option><option value="K">K</option>
    </select>
    <span>→</span>
    <select id="tempTo">
      <option value="F">°F</option><option value="C">°C</option><option value="K">K</option>
    </select>
    <button id="tempSwap">Swap</button>
  </div>
  <div class="result" id="tempResult"></div>
</div>

<div class="card" id="lengthCard">
  <h2>Length</h2>
  <div class="row">
    <input id="lenInput" type="number" value="1" />
    <select id="lenFrom">
      <option value="m">m</option><option value="km">km</option><option value="cm">cm</option>
      <option value="mm">mm</option><option value="in">in</option><option value="ft">ft</option>
      <option value="mi">mi</option>
    </select>
    <span>→</span>
    <select id="lenTo">
      <option value="km">km</option><option value="m">m</option><option value="cm">cm</option>
      <option value="in">in</option><option value="ft">ft</option><option value="mi">mi</option>
    </select>
    <button id="lenSwap">Swap</button>
  </div>
  <div class="result" id="lenResult"></div>
</div>

<div class="card" id="currencyCard">
  <h2>Currency (example fetch)</h2>
  <div class="row">
    <input id="amountCur" type="number" value="100" />
    <select id="curFrom"><option>USD</option><option>EUR</option><option>INR</option></select>
    <span>→</span>
    <select id="curTo"><option>INR</option><option>USD</option><option>EUR</option></select>
    <button id="convertCur">Convert</button>
  </div>
  <div class="result" id="curResult"></div>
  <small>Replace <code>YOUR_API_KEY</code> with your key.</small>
</div>

<script>
// Temperature conversion
function convertTemp(val, from, to){
  const c = from === 'C' ? val : from === 'F' ? (val - 32) * 5/9 : val - 273.15;
  if(to === 'C') return c;
  if(to === 'F') return c * 9/5 + 32;
  if(to === 'K') return c + 273.15;
}
function updateTemp(){
  const v = parseFloat(document.getElementById('tempInput').value) || 0;
  const from = document.getElementById('tempFrom').value;
  const to = document.getElementById('tempTo').value;
  const out = convertTemp(v, from, to);
  document.getElementById('tempResult').textContent = `${v} ${from} = ${Number(out.toFixed(4))} ${to}`;
}
document.getElementById('tempInput').addEventListener('input', updateTemp);
document.getElementById('tempFrom').addEventListener('change', updateTemp);
document.getElementById('tempTo').addEventListener('change', updateTemp);
document.getElementById('tempSwap').addEventListener('click', ()=>{
  const a = document.getElementById('tempFrom'), b = document.getElementById('tempTo');
  [a.value,b.value] = [b.value,a.value]; updateTemp();
});
updateTemp();

// Length conversion (base: meters)
const lengthFactors = { m:1, km:1000, cm:0.01, mm:0.001, in:0.0254, ft:0.3048, mi:1609.344 };
function convertLen(val, from, to){
  const meters = val * (lengthFactors[from] || 1);
  return meters / (lengthFactors[to] || 1);
}
function updateLen(){
  const v = parseFloat(document.getElementById('lenInput').value) || 0;
  const from = document.getElementById('lenFrom').value;
  const to = document.getElementById('lenTo').value;
  const out = convertLen(v, from, to);
  document.getElementById('lenResult').textContent = `${v} ${from} = ${Number(out.toFixed(6))} ${to}`;
}
document.getElementById('lenInput').addEventListener('input', updateLen);
document.getElementById('lenFrom').addEventListener('change', updateLen);
document.getElementById('lenTo').addEventListener('change', updateLen);
document.getElementById('lenSwap').addEventListener('click', ()=>{
  const a = document.getElementById('lenFrom'), b = document.getElementById('lenTo');
  [a.value,b.value] = [b.value,a.value]; updateLen();
});
updateLen();

// Currency fetch example (replace API endpoint/key as needed)
document.getElementById('convertCur').addEventListener('click', async ()=>{
  const amount = parseFloat(document.getElementById('amountCur').value) || 0;
  const from = document.getElementById('curFrom').value;
  const to = document.getElementById('curTo').value;
  document.getElementById('curResult').textContent = 'Loading...';
  try{
    // Example using exchangerate-api (replace URL + key)
    const API_KEY = 'YOUR_API_KEY';
    // Example endpoint: https://v6.exchangerate-api.com/v6/YOUR_API_KEY/pair/USD/INR
    const url = `https://v6.exchangerate-api.com/v6/${API_KEY}/pair/${from}/${to}`;
    const resp = await fetch(url);
    if(!resp.ok) throw new Error('API error');
    const data = await resp.json();
    // data.conversion_rate expected from many APIs; adapt per provider
    const rate = data.conversion_rate ?? data.conversionRate ?? (data.rates && data.rates[to]);
    if(!rate) throw new Error('Rate not found');
    const converted = amount * rate;
    document.getElementById('curResult').textContent = `${amount} ${from} = ${converted.toFixed(4)} ${to}  (rate ${rate})`;
  }catch(err){
    document.getElementById('curResult').textContent = 'Failed to fetch rates. Check API key/endpoint in console.';
    console.error(err);
  }
});
</script>
</body>
</html>
