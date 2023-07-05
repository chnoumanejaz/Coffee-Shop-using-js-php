<?php
if (isset($_COOKIE['user'])) {
    $user = $_COOKIE['user'];
    require 'connection.php';
        echo $user;
        $sql = "DELETE FROM signup WHERE username = '$user'";
        if (mysqli_query($connection, $sql)) {
            echo "<script>alert('Your Account Deleted! 👍 Sad to see you Go 😒')</script> ";
        } else {
            echo "<script>alert('Error Deleting Account! Try Again 😢')</script> " . mysqli_error($connection);
        }
        mysqli_close($connection);
}
else{
    header("Location: main.php");
    exit();
}
?>
<script>
    // Page redirection after 10 miliSec
    const redirect = function () {
        setTimeout(function () {
            window.open('main.php', '_self');
        }, 10);
    };
    redirect();
</script>