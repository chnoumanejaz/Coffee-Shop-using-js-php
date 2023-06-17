<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cafe Royale | Coffee Shop | Nouman Ejaz</title>
  <link rel="stylesheet" href="css/index.css" />
  <link rel="stylesheet" href="css/responsive.css" />
</head>

<body>
  <aside class="dashboard">
    <div class="dashboard__menu">
      <img src="img/accountant.png" alt="Accountant" class="dashboard__image" />
      <h2 class="dashboard__name no-wrap">Accountant Mr. Sajid</h2>
      <div class="dashboard__btns">
        <button class="btn btn-orders no-wrap">Check New Orders</button>

        <form action="" method="post">
          <button class="btn btn-orders no-wrap orders-completed" name="orders-completed" type="submit">All Orders
            Processed</button>
        </form>

        <button class="btn btn-logout">logout</button>
      </div>
    </div>
  </aside>
  <?php
  require 'renderMainAreaDashboard.php';
  ?>
  <script src="js/dashboard.js"></script>
</body>

</html>

<?php
require 'connection.php';
if (isset($_POST['orders-completed'])) {
  $sql = "delete from cartdata";
  if (!mysqli_query($connection, $sql)) {
    echo "<script>alert('Error Handling Order Completion! 😢')</script> " . mysqli_error($connection);
  }
  header("Location: accountant.php");
  exit();
}
mysqli_close($connection);
?>