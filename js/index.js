'use strict';

// --------------------------------------------
// Login Button
const btnLogout = document.querySelector('.logout-btn');
const btnMyAcc = document.querySelector('.myacc-btn');

// models appear when click on login
const btnClose = document.querySelector('.btn--close');
const overlay = document.querySelector('.overlay');

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

// Generate random CODE for order No.
function generateRandomCode() {
  const randomNumber = Math.floor(Math.random() * 1000000);
  const paddedNumber = String(randomNumber).padStart(6, '0');
  return paddedNumber;
}

// handling models by events

overlay.addEventListener('click', function () {
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

// Logout the user
btnLogout.addEventListener('click', function () {
  window.open('main.php', '_self');
});

// update the user
btnMyAcc.addEventListener('click', function () {
  window.open('updateUser.php', '_self');
});



// account dropdown management

const myAccount = document.querySelector('.myAccount');
const myAccountCancle = document.querySelector('.myAccountCancle');
const myAccountDel = document.querySelector('.myAccountDel');
const dropdownAccount = document.querySelector('.dropdown__Account');

const toggleAccountDropdown = function () {
  myAccount.classList.toggle('hidden');
  dropdownAccount.classList.toggle('hidden');
}

myAccount.addEventListener('click', toggleAccountDropdown)
myAccountCancle.addEventListener('click', toggleAccountDropdown)
myAccountDel.addEventListener('click', function () {
  window.open('deleteAccount.php', '_self')
})


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
