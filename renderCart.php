<?php
// Function to display the cart items
function displayCart()
{
    if (empty($_SESSION['cart'])) {
        echo "<h2 class='cart-heading'>🙂 Your cart is empty 🙂</h2>";
        echo "<h2 class='cart-heading-s'>Browse Our <a href='index.php#menu' class='nav__link cart-link'>Menu</a></h2>";
        echo "<h2 class='cart-heading-s'>Find Something Special and add it ... 😉</h2>";
    } else {
        echo "<h2 class='cart-heading'>Your Cart Has</h2>";
        echo "<section class='overflow-check'>";
        echo "<table class='in'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th class='adjusted-th'>Order No</th>";
        echo "</tr>";
        echo "<tr>";
        echo "<th class='adjusted-th'>Item</th>";
        echo "</tr>";
        echo "<tr>";
        echo "<th class='adjusted-th'>Quantity</th>";
        echo "</tr>";
        echo "<tr>";
        echo "<th class='adjusted-th'>Price</th>";
        echo "</tr>";
        echo "<tr>";
        echo "<th class='adjusted-th no-wrap'>Total to Pay: </th>";
        echo "</tr>";
        echo "</thead>";
        echo "</table>";
        echo "<table class='in'>";
        echo "<tbody>";
        echo "<tr>";
        foreach ($_SESSION['orderNo'] as $qorderNo) {
            echo "<td  class='adjusted-td'>$qorderNo</td>";
        }
        echo "</tr>";
        echo "<tr>";

        foreach ($_SESSION['cart'] as $qname) {
            echo "<td  class='adjusted-td no-wrap'>$qname</td>";
        }
        echo "</tr>";
        echo "<tr>";
        foreach ($_SESSION['quantity'] as $qquantity) {
            echo "<td  class='adjusted-td'>$qquantity</td>";
        }
        echo "</tr>";
        echo "<tr>";

        foreach ($_SESSION['price'] as $qprice) {
            echo "<td  class='adjusted-td'>$qprice RS</td>";
        }
        echo "</tr>";
        echo "<tr>";
        echo "<td colspan='3'>" ?>
        
        <?php
        require 'connection.php';
        $query = "SELECT quantity, price FROM cartdata";
        $result = mysqli_query($connection, $query);
        $total = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $product = $row['quantity'] * $row['price'];
            $total += $product;
        }
        echo $total . ' Rupees';
        mysqli_close($connection);
        "</td>";
        echo "</tr>";
        echo "</tbody>";
        echo "</table>";
        echo "</section>";
    }
}
// Display the cart items
displayCart();
?>