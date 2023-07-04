'use strict';

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

// Error and Success Messages
const error = document.querySelector('.error-sec');
const errorMsg = document.querySelector('.error');
const success = document.querySelector('.success-sec');
const successMsg = document.querySelector('.success');

// back button
const backBtn = document.querySelectorAll('.backbtn');

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

// Generate random CODE to login and for order No.
function generateRandomCode() {
  const randomNumber = Math.floor(Math.random() * 1000000);
  const paddedNumber = String(randomNumber).padStart(6, '0');
  return paddedNumber;
}

// ------- Main

btnCustomer.addEventListener('click', function () {
  window.open('login.php', '_self');
});
overlay.addEventListener('click', function () {
  if (!model.classList.contains('hidden')) toggelModel();
  if (!modelCheff.classList.contains('hidden')) toggelCheffModel();
  if (!modelAcc.classList.contains('hidden')) toggelAccModel();
  if (!modelCart.classList.contains('hidden')) toggelCartModel();
});

// when click on cheff login then random code generated for login
let randomCode;
loginCheff.addEventListener('click', function () {
  toggelModel();
  toggelCheffModel();
  randomCode = generateRandomCode();
  code.textContent = +randomCode;
});

// when click on Accountant login then again random code generated for login
loginAcc.addEventListener('click', function () {
  toggelModel();
  toggelAccModel();
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

backBtn?.forEach(btn => {
  btn.addEventListener('click', function () {
    window.open('main.php', '_self');
  });
});

const signUp = document.getElementById('Signup');
signUp.addEventListener('click', function () {
  window.open('signup.php', '_self');
});
