const bar = document.getElementById('bar');
const closeBar = document.getElementById('close');
const nav = document.getElementById('navbar');

if (bar) {
    bar.addEventListener('click', () => {
        nav.classList.add('active');
    })
}

if (closeBar) {
    closeBar.addEventListener('click', () => {
        nav.classList.remove('active');
    })
}

var check = function() {
    if (document.getElementById('psd').value ==
      document.getElementById('psd-repeat').value) {
      document.getElementById('message').style.color = 'green';
      document.getElementById('message').innerHTML = 'matching';
    } else {
      document.getElementById('message').style.color = 'red';
      document.getElementById('message').innerHTML = 'not matching';
    }
  }
