<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login to the Account</title>
    <link rel="stylesheet" href="css/index.css" />
</head>

<body>

    <?php
    // session_start();
    if (isset($_COOKIE['user'])) {
        $user = $_COOKIE['user'];
        require 'connection.php';
        $query = "select * from signup where username = '$user'";
        $data = $connection->query($query);

        while ($row = $data->fetch_assoc()) { ?>

            <section class="model-login">
                <div class="model-cheff__content">
                    <h1 class="model-cheff--head">Update your Account</h1>
                    <form action="updation.php" method="POST" class="form_credentials">
                        <div class="divve">
                            <label for="username" class="labbell">User Name:</label>
                            <input type="text" value="<?php echo $row["username"]; ?>" class="model-cheff__input updateinp"
                               style="color: #fff" name="username" id="username" disabled />
                        </div>
                        <div class="divve">
                            <label for="uname" class="labbell">Your Name:</label>
                            <input type="text" value="<?php echo $row["name"]; ?>" class="model-cheff__input updateinp"
                                name="uname" id="uname" required/>
                        </div>
                        <div class="divve">
                            <label for="email" class="labbell">Your Email:</label>
                            <input type="email" value="<?php echo $row["email"]; ?>" class="model-cheff__input updateinp"
                                name="email" id="email" required/>
                        </div>
                        <div class="divve">
                            <label for="password" class="labbell">Password:</label>
                            <input type="text" value="<?php echo $row["password"]; ?>" class="model-cheff__input updateinp"
                                name="password" id="password" required/>
                        </div>
                        <div class="divve">
                            <label for="phone" class="labbell">Your Phone:</label>
                            <input type="number" value="<?php echo $row["phone"]; ?>" class="model-cheff__input updateinp"
                                name="phone" id="phone" required/>
                        </div>

                        <button class="model-cheff__btn btn-large loginbtnacc" type="submit" name="updateAccount"
                            onclick="updateUserData()">
                            Update Account
                        </button>
                    </form>
                    <button class="model-cheff__btn btn-large cancleBtn">
                        <svg class="svg-pri-dark back">
                            <use xlink:href="img/sprite.svg#icon-login"></use>
                        </svg>
                        Cancle
                    </button>
                </div>
            </section>
            <?php
        }
        mysqli_close($connection);
    }

    ?>
    <script>
        function updateUserData() {
            const obj = new XMLHttpRequest();
            obj.open("GET", "updation.php", true);
            obj.send();
            obj.onreadystatechange = function () {
                if (obj.readyState === 4 && obj.status === 200) {
                    alert('Account Details Updated! 😉');
                    window.open('index.php', '_self')
                }
            }
        } 
    </script>
    <script src="js/login.js"></script>

</body>

</html>