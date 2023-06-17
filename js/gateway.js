'use strict';

// Page redirection after order success 2sec
const redirect = function () {
  setTimeout(function () {
    window.open('index.php', '_self');
  }, 2000);
};
redirect();


