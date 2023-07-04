<?php

if (isset($_COOKIE['user'])) {
    $user = $_COOKIE['user'];
    require 'connection.php';

    if (isset($_POST['updateAccount'])) {
        $name = $_POST['uname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];


        $sql = "UPDATE signup set name = '$name',email='$email' ,
                     password='$password',phone='$phone' WHERE username = '$user'";

        if (mysqli_query($connection, $sql)) {
            header("Location: updateUser.php");
            exit();
        } else {
            echo "<script>alert('Error Updating Data! 😢')</script> " . mysqli_error($connection);
        }
        mysqli_close($connection);
    }

}
?>