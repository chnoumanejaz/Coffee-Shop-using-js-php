<?php
if (isset($_POST['addNewAccount'])) {
    function isUsernameUnique($username)
    {
        require 'connection.php';
        $query = "select * from signup";
        $data = $connection->query($query);
        $count = 0;
        while ($row = $data->fetch_assoc()) {
            if ($row["username"] === $_POST['username']) {
                $count++;
            }
        }
        mysqli_close($connection);
        if ($count > 0) {
            return false;
        } else {
            return true;
        }
    }

    if (isUsernameUnique($_POST['username'])) {
        require 'connection.php';
        $sql = "insert into signup(name, username, password, email, phone) values('" . $_POST['uname'] . "','" . $_POST['username'] . "', '" . $_POST['password'] . "', '" . $_POST['email'] . "', '" . $_POST['phone'] . "')";
        if (!mysqli_query($connection, $sql)) {
            echo "<script>alert('Error During your Account Creation! Try Again😢')</script> " . mysqli_error($connection);
        }
        mysqli_close($connection);
        echo "<script>alert('Congrats! Account Created SuccessFully 😎')</script> ";
    } else {
        echo "<script>alert('Username Already Exist.. Find another 😢')</script> ";
    }
}

?>
<script>
    // Page redirection after 10 miliSec
    const redirect = function () {
        setTimeout(function () {
            window.open('signup.php', '_self');
        }, 10);
    };
    redirect();
</script>