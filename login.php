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
            <h1 class="model-cheff--head">Login to Account</h1>
            <form action="" method="POST" class="form_credentials">
                <input type="text" placeholder="Enter Username" class="model-cheff__input" name="username" required />
                <input type="password" placeholder="Enter Password" class="model-cheff__input" name="password" required />
                <button class="model-cheff__btn btn-large loginbtnacc">
                    Login
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


<?php
require 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM signup WHERE username = '$username'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $userPass = $row["password"];
        if ($password == $userPass) {
            $token = bin2hex(random_bytes(16));
            setcookie('auth_token', $token, time() + (86400 * 2), '/');
            setcookie('user', $username, time() + (86400 * 2), '/');
            header("Location: index.php");
            exit();
        } else {
            $error = "Invalid password";
        }
    } else {
        $error = "Invalid username";
    }
}
mysqli_close($connection);
?>

<?php
if (isset($error)) {
    echo "<script>alert('Wrong Credentials! Try Again😢')</script> ";
}
?>