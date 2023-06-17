<main class="area">
  <div class="area-msg">
    <h1 class="area-msg__heading">Welcome 😉</h1>
    <p class="area-msg__para">
      Hey! Nice to See you here 😍 <br />
      <br />
      We're excited to have you on board at our coffee shop's website. Your
      expertise in accounting is crucial for maintaining our financial
      stability. This platform offers convenient tools for tracking
      transactions, managing expenses, and generating reports. If you need
      any assistance, our team is here to support you. Thank you for
      contributing to our success! <br />
      <br />
      Best regards, <span class="myName no-wrap"> Muhammad Nouman Ejaz</span>
    </p>
  </div>
  <div class="area-data hidden">
    <table>
      <?php
      if (!isset($_SESSION['cart'])) {
        echo "<thead>";
        echo "<tr>";
        echo "<th colspan='4' class='thHead'>New Orders Are</th>";
        echo "</tr>";
        echo "</thead>";

        require 'connection.php';
        $query = "select * from cartdata";
        $data = $connection->query($query);

        echo "<table>";
        echo "<tr>";
        echo "<th>Sr.No</th>";
        echo "<th class='no-wrap'>Order ID</th>";
        echo "<th class='no-wrap'>Item Name</th>";
        echo "<th>Quantity</th>";
        echo "<th>Price</th>";
        echo "<th class='no-wrap'>Customer Name</th>";
        echo "<th class='no-wrap'>Customer Phone</th>";
        echo "<th class='no-wrap'>Customer Address</th>";
        echo "</tr>";
        while ($row = $data->fetch_assoc()) {
          echo "<tr>";
          echo "<td>" . $row["sr"] . "</td>";
          echo "<td>" . $row["id"] . "</td>";
          echo "<td  class='no-wrap'>" . $row["name"] . "</td>";
          echo "<td>" . $row["quantity"] . "</td>";
          echo "<td class='no-wrap'>" . $row["price"] . " RS </td>";
          echo "<td class='no-wrap'>" . $row["username"] . " </td>";
          echo "<td class='no-wrap'>" . $row["phone"] . " </td>";
          echo "<td class='no-wrap'>" . $row["address"] . " </td>";
          echo "</tr>";
        }
        echo "</table>";
        mysqli_close($connection);
      } else {
        echo "<thead>";
        echo "<tr>";
        echo "<th colspan='4' class='thHead'>There is No new Orders Yet ...</th>";
        echo "</tr>";
        echo "</thead>";
      }
      ?>
    </table>
  </div>
</main>