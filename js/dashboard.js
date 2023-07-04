'use strict';
// Dahboard elements
const areaMsg = document.querySelector('.area-msg');
const areaData = document.querySelector('.area-data');
const chkOrders = document.querySelector('.btn-orders');
const btnLogout = document.querySelector('.btn-logout');

//  Dashboard functionality
chkOrders?.addEventListener('click', function () {
  areaMsg.style.display = 'none';
  areaData.classList.remove('hidden');
});
btnLogout?.addEventListener('click', function () {
  window.open('main.php', '_self');
});

// for order confirm page button (Browse More)
document.querySelector('.browse-more')?.addEventListener('click', function () {
  window.open('index.php#menu', '_self');
});

// for order confirm
const confirmOrder = document.querySelector('.place-order-btn');
const dataModel = document.querySelector('.model-data');
const overlay = document.querySelector('.overlay');
const closeBtnData = document.querySelector('.btn--close');

const toggelDataModel = function () {
  overlay.classList.toggle('hidden');
  dataModel.classList.toggle('hidden');
};
confirmOrder?.addEventListener('click', toggelDataModel);
closeBtnData?.addEventListener('click', toggelDataModel);
