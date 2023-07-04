<?php
session_start();
if (isset($_SESSION['cart'])) {
    require 'connection.php';
    $id = $_SESSION['orNo'];
    if (isset($_POST['done-order'])) {
        $sql = "UPDATE `cartdata` SET `username`='" . $_POST['username'] . "',`phone`='" . $_POST['userphone'] . "',`address`='" . $_POST['useraddress'] . "' WHERE id = $id";
        if (!mysqli_query($connection, $sql)) {
            echo "<script>alert('Error Adding user data. Try Again😢')</script> " . mysqli_error($connection);
        }
    }
    mysqli_close($connection);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Placed Successfully! ! Royale Cafe | Nouman Ejaz</title>
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" href="css/gateway.css" />
    <link rel="stylesheet" href="css/responsive.css" />
</head>

<body>
    <?php
    if (isset($_SESSION['cart'])) {
        ?>
        <main class="gateway">
            <div class="image-gateway">
                <img src="img/tick.png" alt="Order Done" class="img-gateway">
            </div>
            <div class="gateway-msg">
                <p class="thanks">Thank you for you order!</p>
                <br>
                <p>Trying our Best to Delivery it On Time!</p>
            </div>
            <div class="redirection">
                <h3 class="re">
                    We are Redirecting you to Main Page in 03 sec. . . 😉
                </h3>
            </div>
        </main>
        <?php
    } else {
        ?>
        <main class="gateway">
            <div class="gateway-msg">
                <p class="thanks">No Cheating 😂😂😂</p>
            </div>
        </main>
        <?php
    }
    ?>
    <script>
        // Page redirection after order success 1.5sec
        const redirect = function () {
            setTimeout(function () {
                window.open('index.php', '_self');
            }, 1500);
        };
        redirect();
    </script>
</body>

</html>

<?php
if (isset($_SESSION['cart'])) {
    session_destroy();
}
?>