<?php
session_start();
require 'renderCart.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cafe Royale | Coffee Shop | Nouman Ejaz</title>
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" href="css/cartprocess.css" />
    <link rel="stylesheet" href="css/responsive.css" />
</head>

<body>
    <?php
    if (isset($_SESSION['cart'])) {
        ?>
        <div class="checkout ">
            <button class="btn cartpageBTN confirm-order browse-more">Browse More</button>
            <span class="or">OR</span>
            <button class="btn cartpageBTN confirm-order place-order-btn">Confirm Order</button>
        </div>
        <?php
    }
    ?>

    <div class="overlay hidden"></div>
    <section class="model-data hidden">
        <a href="#">
            <img src="img/icons/cross-23.svg" alt="Close" class="btn--close" />
        </a>
        <div class="model-data__content">
            <h1 class="model-data--head">Enter Your Details</h1>
            <form action="gateway.php" method="post" class="userdata">
                <input type="text" placeholder="Enter your Name" name="username" class="model-data__input" required
                    minlength="3" maxlength="40" />
                <input type="text" placeholder="Enter your Address" name="useraddress" class="model-data__input"
                    required minlength="10" maxlength="200" />
                <input type="number" placeholder="Enter Phone No" name="userphone" class="model-data__input" required
                    minlength="10" maxlength="12" />
                <button class="model-data__btn btn-large complete-order-btn" name="done-order" type="submit">Complete
                    Order</button>
            </form>
        </div>
    </section>
    <script src="js/dashboard.js"></script>
</body>

</html>