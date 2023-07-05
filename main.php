<?php
session_start();
session_destroy();
setcookie('auth_token', '', time() - 3600, '/');
setcookie('user', '', time() - 3600, '/');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login to the Account</title>
  <link rel="stylesheet" href="css/index.css" />
  <link rel="stylesheet" href="css/responsiveMain.css" />
</head>

<body>
  <div class="overlay hidden"></div>
  <section class="model ">
    <div class="model__content">
      <img src="img/logo.png" alt="Cafe Royal Logo" class="logo" />
      <button class="model__btn loginCheff">
        Login as a Cheff
        <svg class="svg-pri">
          <use xlink:href="img/sprite.svg#icon-login"></use>
        </svg>
      </button>
      <button class="model__btn loginAcc">
        Login as a Accountant
        <svg class="svg-pri">
          <use xlink:href="img/sprite.svg#icon-login"></use>
        </svg>
      </button>
      <button class="model__btn" id="Customer">Login as Customer</button>
      <button class="model__btn" id="Signup">Signup as Customer</button>
    </div>
  </section>

  <section class="model-cheff hidden">
    <div class="model-cheff__content">
      <h1 class="model-cheff--head">Login As A CHEFF</h1>
      <input type="text" placeholder="Enter Cheff Here" class="model-cheff__input cheff-valid" />
      <div class="code">code</div>
      <input type="number" placeholder="Enter Code Here" class="model-cheff__input code-valid" />
      <button class="model-cheff__btn btn-large loginbtn">
        Login
        <svg class="svg-pri-dark">
          <use xlink:href="img/sprite.svg#icon-login"></use>
        </svg>
      </button>
      <button class="model-cheff__btn btn-large backbtn">
        <svg class="svg-pri-dark">
          <use xlink:href="img/sprite.svg#icon-login"></use>
        </svg>
        Back
      </button>
    </div>
  </section>

  <section class="model-acc hidden">
    <div class="model-cheff__content">
      <h1 class="model-cheff--head">Login As A Accountant</h1>
      <input type="text" placeholder="Enter Accounts Here" class="model-cheff__input acc-valid" />
      <div class="codeacc">code</div>
      <input type="number" placeholder="Enter Code Here" class="model-cheff__input code-validacc" />
      <button class="model-cheff__btn btn-large loginbtnacc">
        Login
        <svg class="svg-pri-dark">
          <use xlink:href="img/sprite.svg#icon-login"></use>
        </svg>
      </button>
      <button class="model-cheff__btn btn-large backbtn">
        <svg class="svg-pri-dark back">
          <use xlink:href="img/sprite.svg#icon-login"></use>
        </svg>
        Back
      </button>
    </div>
  </section>

  <section class="error-sec">
    <div class="error">This is Error</div>
  </section>
  <script src="js/mainpage.js"></script>
</body>

</html>