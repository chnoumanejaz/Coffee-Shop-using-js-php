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
      <img src="img/cheff.png" alt="Cheff" class="dashboard__image-chef" />
      <h2 class="dashboard__name no-wrap">Cheff Mr. Kamal</h2>
      <div class="dashboard__btns">
        <button class="btn btn-orders no-wrap">Check New Orders</button>
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