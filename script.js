// header.html को लोड कराके div में डाल देगा
  fetch('header.html')
    .then(response => response.text())
    .then(html => {
      document.getElementById('header').innerHTML = html;
    })
    .catch(err => console.error('Header load error', err));


    // Fetch wallet balance from Apps Script
  fetch("https://script.google.com/macros/s/AKfycbwfafWuI6kSe8mLJifDTJt8Kxo20151vRw1SldTJ5gsXv36rL66Dd2mZdvBM5RbXp-GRA/exec", {
    method: "POST",
    body: JSON.stringify({ action: "getWallet", userId: 2 })
  })
    .then(res => res.json())
    .then(data => {
        console.log("fff",data);
        document.getElementById('roinc').innerText = data.current_balance;
    })
    .catch(err => console.error('Error:', err));