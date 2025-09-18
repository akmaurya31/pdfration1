// header.html को लोड कराके div में डाल देगा
  fetch('header.html')
    .then(response => response.text())
    .then(html => {
      document.getElementById('header').innerHTML = html;
    })
    .catch(err => console.error('Header load error', err));



      
  function waitForBalanceAndUpdate() {

  const interval = setInterval(() => {
    const balance = localStorage.getItem('current_balance');
    console.log("Ffff");
    if (balance !== null) {        // value आ गई
      document.getElementById('roinc').innerText = balance;
      clearInterval(interval);     // interval बंद कर दो
    }
  }, 100); // हर 100ms में check
}

// page load पर call करो
waitForBalanceAndUpdate();