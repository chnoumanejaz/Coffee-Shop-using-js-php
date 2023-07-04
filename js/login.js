'use strict';

const backBtn = document.querySelector('.backbtn');

backBtn?.addEventListener('click', function () {
  window.open('main.php', '_self');
});


const cancleBtn = document.querySelector('.cancleBtn');

cancleBtn?.addEventListener('click', function () {
  window.open('index.php', '_self');
});
