<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login to the Account</title>
    <link rel="stylesheet" href="css/index.css" />
</head>

<body>
    <section class="model-login">
        <div class="model-cheff__content">
            <h1 class="model-cheff--head">Create your Account</h1>
            <form action="validateSignup.php" method="POST" class="form_credentials">
                <input type="text" placeholder="Enter your name" class="model-cheff__input" name="uname" required />
                <input type="text" placeholder="Enter Username" class="model-cheff__input" name="username" required />
                <input type="text" placeholder="Enter your Email" class="model-cheff__input" name="email" required />
                <input type="password" placeholder="Enter Password" class="model-cheff__input" name="password"
                    required />
                <input type="text" placeholder="Enter Phone No" class="model-cheff__input" name="phone" />
                <button class="model-cheff__btn btn-large loginbtnacc" type="submit" name="addNewAccount">
                    Signup
                    <svg class="svg-pri-dark">
                        <use xlink:href="img/sprite.svg#icon-login"></use>
                    </svg>
                </button>
            </form>
            <button class="model-cheff__btn btn-large backbtn">
                <svg class="svg-pri-dark back">
                    <use xlink:href="img/sprite.svg#icon-login"></use>
                </svg>
                Back
            </button>
        </div>

    </section>
    <script src="js/login.js"></script>
</body>

</html>