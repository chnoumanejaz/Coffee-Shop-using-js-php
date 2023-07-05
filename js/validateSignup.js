

'use strict';

// Error and Success Messages
const error = document.querySelector('.error-sec');
const errorMsg = document.querySelector('.error');


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



// Selection of Input fields

const uname = document.querySelector('.name');
const userName = document.querySelector('.username');
const email = document.querySelector('.email');
const pass = document.querySelector('.pass');
const signupbtn = document.querySelector('.signupbtn');

signupbtn.addEventListener('click', function(e)
{
    if(uname.value.trim() === '' || userName.value.trim() === '' || pass.value.trim() === '' || email.value.trim() === '')
    {
        e.preventDefault();
        console.log(pass.value.trim());
        showError('Please Fill All the Required Fields! 😒')
    }
})