'use strict';

// --------------------------------------------
// Login Button
const btnLogin = document.querySelector('.login-btn');

// models appear when click on login
const btnClose = document.querySelector('.btn--close');
const overlay = document.querySelector('.overlay');
const model = document.querySelector('.model');
const modelCheff = document.querySelector('.model-cheff');
const modelAcc = document.querySelector('.model-acc');
const btnCustomer = document.querySelector('#Customer');

// For Cheff
const code = document.querySelector('.code');
const codeValid = document.querySelector('.code-valid');
const cheffValid = document.querySelector('.cheff-valid');
const loginCheff = document.querySelector('.loginCheff');
const loginBtn = document.querySelector('.loginbtn');

// For Accountant
const codeAcc = document.querySelector('.codeacc');
const codeValidacc = document.querySelector('.code-validacc');
const accValid = document.querySelector('.acc-valid');
const loginBtnAcc = document.querySelector('.loginbtnacc');
const loginAcc = document.querySelector('.loginAcc');

// copyright Year
const copyYear = document.querySelector('.copyYear');

// Cart Functionality
const modelCart = document.querySelector('.model-cart');
const cartBtn = document.querySelector('.cartBtn');
const cartBtnClose = document.querySelector('.btn--close-cart');
const cartLink = document.querySelector('.cart-link');

// Error and Success Messages
const error = document.querySelector('.error-sec');
const errorMsg = document.querySelector('.error');
const success = document.querySelector('.success-sec');
const successMsg = document.querySelector('.success');

// --------------------------------------------
// functions
// open Close main Model
const toggelModel = function () {
  model.classList.toggle('hidden');
  overlay.classList.toggle('hidden');
};

// open Close cheff Model
const toggelCheffModel = function () {
  modelCheff.classList.toggle('hidden');
  overlay.classList.toggle('hidden');
};

// open Close accontant Model
const toggelAccModel = function () {
  modelAcc.classList.toggle('hidden');
  overlay.classList.toggle('hidden');
};

// open Close cart Model
const toggelCartModel = function () {
  modelCart.classList.toggle('hidden');
  overlay.classList.toggle('hidden');
};

// Error to render on page for 2.5s
const errorIcon = `
      <svg class="svg-white">
        <use xlink:href="img/sprite.svg#icon-warning"></use>
      </svg>`;

const showError = function (msg) {
  errorMsg.textContent = msg;
  errorMsg.insertAdjacentHTML('beforeend', errorIcon);
  error.style.transform = 'translateY(3rem)';
  setTimeout(function () {
    error.style.transform = 'translateY(-20rem)';
  }, 2500);
};

// Success to render on page for 2.5s
const infoIcon = `
      <svg class="svg-white">
        <use xlink:href="img/sprite.svg#icon-info"></use>
      </svg>`;
const showSuccess = function (msg) {
  successMsg.textContent = msg;
  successMsg.insertAdjacentHTML('afterbegin', infoIcon);
  success.style.transform = 'translateY(3rem)';
  setTimeout(function () {
    success.style.transform = 'translateY(-20rem)';
  }, 2500);
};

// Generate random CODE to login and for order No.
function generateRandomCode() {
  const randomNumber = Math.floor(Math.random() * 1000000);
  const paddedNumber = String(randomNumber).padStart(6, '0');
  return paddedNumber;
}

// handling models by events
btnLogin.addEventListener('click', toggelModel);
btnClose.addEventListener('click', function (e) {
  e.preventDefault();
  toggelModel();
});
btnCustomer.addEventListener('click', toggelModel);
overlay.addEventListener('click', function () {
  if (!model.classList.contains('hidden')) toggelModel();
  if (!modelCheff.classList.contains('hidden')) toggelCheffModel();
  if (!modelAcc.classList.contains('hidden')) toggelAccModel();
  if (!modelCart.classList.contains('hidden')) toggelCartModel();
});

cartBtn.addEventListener('click', function (e) {
  e.preventDefault();
  toggelCartModel();
});
cartBtnClose.addEventListener('click', function (e) {
  e.preventDefault();
  toggelCartModel();
});

cartLink?.addEventListener('click', toggelCartModel);

// when click on cheff login then random code generated for login
let randomCode;
loginCheff.addEventListener('click', function () {
  toggelModel();
  toggelCheffModel();
  showSuccess(' You can close form by clicking outside the model');
  randomCode = generateRandomCode();
  code.textContent = +randomCode;
});

// when click on Accountant login then again random code generated for login
loginAcc.addEventListener('click', function () {
  toggelModel();
  toggelAccModel();
  showSuccess(' You can close form by clicking outside the model');
  randomCode = generateRandomCode();
  codeAcc.textContent = +randomCode;
});

// validating cheff login
loginBtn.addEventListener('click', function () {
  if (+randomCode !== +codeValid.value) {
    showError('Please Enter Code correctly');
  } else if (
    cheffValid.value.trim() != 'cheff' &&
    cheffValid.value.trim() != 'Cheff'
  ) {
    showError('Please Enter cheff correctly');
  } else window.open('cheff.php', '_self');
});

// validating Accountant login
loginBtnAcc.addEventListener('click', function () {
  if (+randomCode !== +codeValidacc.value) {
    showError('Please Enter Code correctly');
  } else if (
    accValid.value.trim() != 'accounts' &&
    accValid.value.trim() != 'Accounts'
  ) {
    showError('Please Enter accounts correctly');
  } else window.open('accountant.php', '_self');
});

// Rendering copyright year
const year = new Date();
copyYear.textContent = year.getFullYear();

// Handling menu by event deligation
// for item quantity
const menu = document.querySelector('.menu');

menu.addEventListener('click', function (event) {
  const btn = event.target.closest('.btn-mini-active');
  if (!btn) return;
  if (btn.textContent === '+') {
    const quantity = event.target
      .closest('.tabel__row')
      .querySelector('.quantity');
    quantity.value++;
    if (quantity.value === '16') {
      showError('Sorry! You can order 15 at once');
      quantity.value = 15;
    }
  } else {
    const quantity = event.target
      .closest('.tabel__row')
      .querySelector('.quantity');
    if (quantity.value > 0) quantity.value--;
    if (quantity.value === '0') {
      showError('Minimum Quantity Must be 1');
      quantity.value = 1;
    }
  }
});

// preventing default actions of reloading on all + and - buttons
const plusBtn = document.querySelectorAll('.plus');
plusBtn.forEach(a =>
  a.addEventListener('click', function (event) {
    event.preventDefault();
  })
);
const minusBtn = document.querySelectorAll('.minus');
minusBtn.forEach(m =>
  m.addEventListener('click', function (event) {
    event.preventDefault();
  })
);

// Generating random order No for all orders
const randomOrderNoField = document.querySelectorAll('.orderNo');
const orderNoRand = generateRandomCode();
randomOrderNoField.forEach(r => (r.value = orderNoRand));

// Making menu test Capitilize by 1st capital letter
const textSetting = document.querySelectorAll('.input__post');
textSetting.forEach(t => {
  if (!+t.value) {
    const lower = t.value.toString().toLowerCase();
    const upFirst = lower.split('')[0].toUpperCase();
    t.value = upFirst + lower.slice(1);
  }
});

// handling checkout button on the cart
const cartpageBTN = document.querySelector('.cartpageBTN');
cartpageBTN?.addEventListener('click', function () {
  window.open('cartprocess.php', '_self');
});

// alerting out of stock items
const btnDisable = document.querySelectorAll('.btn-disable');
btnDisable.forEach(b => {
  b.addEventListener('click', function (e) {
    e.preventDefault();
    showError('This Item is Out of Stock! ');
  });
});

// Theme Management
const themeSetting = document.querySelector('.themeSetting');
const themeDrop = document.querySelector('.themeDrop');
const settingBtn = document.querySelector('.settingBtn');
const htmlClose = `<img src="img/icons/cross-23.svg" alt="" class="svg-setting"></img>`;
const htmlSetting = `<svg class="svg-setting">
                      <use xlink:href="img/sprite2.svg#icon-cog"></use>
                    </svg>`;

themeSetting.addEventListener('click', function (e) {
  const sBtn = e.target.closest('.svg-setting');
  const cBtn = e.target.closest('img');
  if (!sBtn) return;
  themeDrop.classList.toggle('hideThemeMenu');
  if (sBtn) {
    setTimeout(function () {
      settingBtn.innerHTML = htmlClose;
    }, 300);
  }
  if (cBtn) {
    setTimeout(function () {
      settingBtn.innerHTML = htmlSetting;
    }, 300);
  }
});

const themeDropDown = document.querySelector('.themeDrop');

themeDropDown.addEventListener('click', function (e) {
  if (e.target.closest('.BlackBtn')) {
    loadBlackTheme();
    localStorage.setItem('theme', 'black');
  }
  if (e.target.closest('.defaultBtn')) {
    loadOrangeTheme();
    localStorage.setItem('theme', 'orange');
  }
});

// loading theme on starttup
const defaultUserTheme = function () {
  const defTheme = localStorage.getItem('theme');
  if (defTheme === 'black') {
    loadBlackTheme();
  }
  if (defTheme === 'orange') {
    loadOrangeTheme();
  }
};
defaultUserTheme();

// Themes Coloring
function loadBlackTheme() {
  document.documentElement.style.setProperty(
    '--PRIMARY-COLOR-DARK',
    'rgb(12, 12, 12)'
  );
  document.documentElement.style.setProperty(
    '--PRIMARY-COLOR-DARK-OPAC',
    'rgba(32, 32, 32, 0.911)'
  );
  document.documentElement.style.setProperty(
    '--PRIMARY-COLOR-LIGHT-OPAC',
    'rgba(97, 97, 97, 0.781)'
  );

  document.documentElement.style.setProperty(
    '--PRIMARY-COLOR-LIGHT',
    'rgb(97, 97, 97)'
  );
  document.documentElement.style.setProperty(
    '--PRIMARY-COLOR-LIGHT2',
    'rgb(129, 129, 129)'
  );
  document.documentElement.style.setProperty('--CART-COLOR', '#acacac');
  document.documentElement.style.setProperty(
    '--BG-COLOR',
    'rgb(189, 189, 189)'
  );
  document.documentElement.style.setProperty(
    '--LINEAR-LIGHT',
    'rgb(170, 170, 170)'
  );
  document.documentElement.style.setProperty('--LINKEDIN', '#fff');
}
function loadOrangeTheme() {
  document.documentElement.style.setProperty(
    '--PRIMARY-COLOR-DARK',
    'rgb(236, 142, 54)'
  );
  document.documentElement.style.setProperty(
    '--PRIMARY-COLOR-DARK-OPAC',
    'rgba(236, 163, 54, 0.911)'
  );
  document.documentElement.style.setProperty(
    '--PRIMARY-COLOR-LIGHT-OPAC',
    'rgba(241, 219, 149, 0.781)'
  );

  document.documentElement.style.setProperty(
    '--PRIMARY-COLOR-LIGHT',
    'rgb(241, 212, 149)'
  );
  document.documentElement.style.setProperty(
    '--PRIMARY-COLOR-LIGHT2',
    'rgb(245, 238, 195)'
  );
  document.documentElement.style.setProperty('--CART-COLOR', '#fcd48b');
  document.documentElement.style.setProperty(
    '--BG-COLOR',
    'rgb(241, 232, 221)'
  );
  document.documentElement.style.setProperty(
    '--LINEAR-LIGHT',
    'rgba(145, 113, 54, 0.918)'
  );
}
