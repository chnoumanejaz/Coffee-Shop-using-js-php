<?php
session_start();
if (isset($_COOKIE['auth_token'])) {
  //     $username = $_SESSION["username"];
//     echo "<script>alert('Welcome, " . $username . " ! 😎')</script>";
// }
  ?>

  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cafe Royale | Coffee Shop | Nouman Ejaz</title>
    <link rel="stylesheet" href="css/index.css" />
    <link rel="stylesheet" href="css/responsiveMain.css" />
  </head>

  <body>
    <div class="themeSetting">
      <button class="settingBtn">
        <svg class="svg-setting">
          <use xlink:href="img/sprite2.svg#icon-cog"></use>
        </svg>
      </button>
      <div class="themeDrop hideThemeMenu">
        <div class="BlackBtn"></div>
        <div class="defaultBtn"></div>
      </div>
    </div>

    <header class="header">
      <nav class="nav">
        <div class="nav__logo">
          <a href="index.php">
            <img src="img/logo.png" alt="Royal Cafe" class="logo" />
          </a>
        </div>
        <div class="nav__navigation">
          <ul class="nav__list">
            <li class="nav__item">
              <a href="#home" class="nav__link">Home</a>
            </li>
            <li class="nav__item">
              <a href="#menu" class="nav__link">Menu</a>
            </li>
            <li class="nav__item">
              <a href="#popular" class="nav__link">Popular</a>
            </li>
            <li class="nav__item">
              <a href="#footer" class="nav__link">About</a>
            </li>
            <li class="nav__item">
              <a href="#" class="nav__link myacc-btn no-wrap" style="padding: .5rem; border: 1px solid; border-radius: 10px;">My
                Account</a>
            </li>
            <li class="nav__item">
              <a href="#" class="nav__link logout-btn no-wrap">Logout
                <svg class="svg-white">
                  <use xlink:href="img/sprite.svg#icon-login"></use>
                </svg>
              </a>
            </li>
            <li class="nav__item">
              <a href="#" class="nav__link no-wrap cartBtn">Cart
                <svg class="svg-white">
                  <use xlink:href="img/sprite.svg#icon-cart"></use>
                </svg>
              </a>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <?php

    // Function to add an item to the cart
    function addToCart($product, $price, $quantity, $orderNo)
    {
      // Add the product to the cart
      $_SESSION['orderNo'][] = $orderNo;
      $_SESSION['cart'][] = $product;
      $_SESSION['price'][] = $price;
      $_SESSION['quantity'][] = $quantity;
    }
    // Add an item to the cart
    if (isset($_POST['add_to_cart'])) {
      addToCart($_POST['product'], $_POST['price'], $_POST['quantity'], $_POST['orderNo']);

      // setting orderno to get it on another page and update the name of customer with this order no
      $_SESSION['orNo'] = $_POST['orderNo'];
    }

    require 'connection.php';
    if (isset($_POST['add_to_cart'])) {
      $sql = "insert into cartdata(id, name, quantity, price) values('" . $_POST['orderNo'] . "','" . $_POST['product'] . "', '" . $_POST['quantity'] . "', '" . $_POST['price'] . "')";
      if (!mysqli_query($connection, $sql)) {
        echo "<script>alert('Error Adding item to the Cart! Try Again😢')</script> " . mysqli_error($connection);
      }
      header("Location: index.php#menu");
      exit();
    }
    if (isset($_POST['btn-disabled'])) {
      header("Location: index.php#menu");
      exit();
    }
    mysqli_close($connection);
    ?>

    <main class="main">
      <section class="cover" id="home">
        <!-- <img src="img/cover.jpg" alt="Royal Cafe Cover Image" class="cover__img"> -->
        <div class="cover__explore">
          <p class="cover__para">
            Building on the emergence of coffee culture nearly 40 years ago,
            Royal Cafe Kvetko and her husband Ed saw an opportunity to offer
            high-quality specialty coffee in a warm and friendly environment in
            their hometown, just north of Chicago, Illinois.
          </p>
          <button class="btn btn-primary no-wrap">Explore More </button>
        </div>
      </section>
      <section class="headline">
        <marquee direction="left" class="blink">
          Special Discount upto 27% till 30th June, 2023 --- Use Voucher:
          WelcomeJuly
        </marquee>
      </section>
      <section class="popular" id="popular">
        <div class="popular__head">
          <p class="section-heading">Popular Products</p>
          <svg class="icon-svg">
            <use xlink:href="img/sprite.svg#icon-arrow-down2"></use>
          </svg>
        </div>
        <div class="row">
          <div class="popular__card">
            <div class="popular__item">
              <img src="img/black.png" alt="Black Coffee" class="popular__item--img" />
            </div>
            <div class="popular__text">
              <h2 class="popular__text--heading">Black Coffee</h2>
              <p class="popular__text--para">
                Savor the bold and robust flavors of our signature black coffee,
                a pure and invigorating brew that captivates coffee
                connoisseurs.
              </p>
            </div>
          </div>
          <div class="popular__card">
            <div class="popular__item">
              <img src="img/Cappuccino.png" alt="Cappuccino Coffee" class="popular__item--img" />
            </div>
            <div class="popular__text">
              <h2 class="popular__text--heading">Cappuccino</h2>
              <p class="popular__text--para">
                Delight in the creamy perfection of our renowned cappuccino, a
                sip of pure caffeinated bliss that keeps our customers coming
                back for more.
              </p>
            </div>
          </div>
          <div class="popular__card">
            <div class="popular__item">
              <img src="img/mocha.png" alt="mocha Coffee" class="popular__item--img" />
            </div>
            <div class="popular__text">
              <h2 class="popular__text--heading">Mocha</h2>
              <p class="popular__text--para">
                Savor the perfect harmony of rich mocha flavors in our beloved
                donuts, a delight that will captivate your senses.
              </p>
            </div>
          </div>
          <div class="popular__card">
            <div class="popular__item">
              <img src="img/cupcakes.png" alt="cupcake" class="popular__item--img" />
            </div>
            <div class="popular__text">
              <h2 class="popular__text--heading">Cupcakes</h2>
              <p class="popular__text--para">
                Experience pure bliss with our delectable cupcake creations, the
                talk of the town and a guaranteed sweet escape.
              </p>
            </div>
          </div>
          <div class="popular__card">
            <div class="popular__item">
              <img src="img/donuts.png" alt="donuts" class="popular__item--img" />
            </div>
            <div class="popular__text">
              <h2 class="popular__text--heading">Donuts</h2>
              <p class="popular__text--para">
                Indulge in our irresistibly popular donuts, the ultimate treat
                for your taste buds.
              </p>
            </div>
          </div>
        </div>
      </section>
      <section class="menu" id="menu">
        <div class="menu__head">
          <p class="section-heading">Our Menu</p>
          <svg class="icon-svg">
            <use xlink:href="img/sprite.svg#icon-arrow-down2"></use>
          </svg>
        </div>
        <table class="table">
          <thead class="tabel__head">
            <tr>
              <th colspan="6">CLASSICS</th>
            </tr>
          </thead>
          <tbody class="tabel__body">
            <tr class="tabel__row">
              <form action="" method="post">
                <td colspan="2" class="qname">
                  <input type="text" name="product" class="input__post" value="CAPPUCCINO / CAFFE LATTE" readonly>
                </td>
                <td class="qprice">
                  <input type="text" name="price" class="input__post adjusted-price" value="650" readonly>
                  <span class="rs">RS</span>
                </td>
                <td colspan="2" class="mobile-style">
                  <input type="text" class="quantity" name="quantity" value="1" readonly />
                  <input type="hidden" class="orderNo" name="orderNo" value="552" readonly />
                  <button class="btn-mini btn-mini-active minus">-</button>
                  <button class="btn-mini btn-mini-active plus">+</button>
                </td>
                <td>
                  <button class="btn-cart btn-cart-active" type="submit" name="add_to_cart">Add To
                    <svg class="icon-svg-white">
                      <use xlink:href="img/sprite.svg#icon-cart"></use>
                    </svg>
                  </button>
                </td>
              </form>
            </tr>

            <tr class="tabel__row">
              <form action="" method="post">
                <td colspan="2" class="qname">
                  <input type="text" name="product" class="input__post" value="CAFÉ AMERICANO" readonly>
                </td>
                <td class="qprice">
                  <input type="text" name="price" class="input__post adjusted-price" value="495" readonly>
                  <span class="rs">RS</span>
                </td>
                <td colspan="2" class="mobile-style">
                  <input type="text" class="quantity" name="quantity" value="1" readonly />
                  <input type="hidden" class="orderNo" name="orderNo" value="552" readonly />
                  <button class="btn-mini btn-mini-active minus">-</button>
                  <button class="btn-mini btn-mini-active plus">+</button>
                </td>
                <td>
                  <button class="btn-cart btn-cart-active" type="submit" name="add_to_cart">Add To
                    <svg class="icon-svg-white">
                      <use xlink:href="img/sprite.svg#icon-cart"></use>
                    </svg>
                  </button>
                </td>
              </form>
            </tr>

            <tr class="tabel__row">
              <form action="" method="post">
                <td colspan="2" class="qname">
                  <input type="text" name="product" class="input__post" value="ESPRESSO / RISTRETTO / MACCHIATO" readonly>
                </td>
                <td class="qprice">
                  <input type="text" name="price" class="input__post adjusted-price" value="525" readonly>
                  <span class="rs">RS</span>
                </td>
                <td colspan="2" class="mobile-style">
                  <input type="text" class="quantity" name="quantity" value="1" readonly />
                  <input type="hidden" class="orderNo" name="orderNo" value="552" readonly />
                  <button class="btn-mini btn-mini-active minus">-</button>
                  <button class="btn-mini btn-mini-active plus">+</button>
                </td>
                <td>
                  <button class="btn-cart btn-cart-active" type="submit" name="add_to_cart">Add To
                    <svg class="icon-svg-white">
                      <use xlink:href="img/sprite.svg#icon-cart"></use>
                    </svg>
                  </button>
                </td>
              </form>
            </tr>
          </tbody>
          <thead class="tabel__head">
            <tr>
              <th colspan="6">SPECIALITIES</th>
            </tr>
          </thead>
          <tbody class="tabel__body">
            <tr class="tabel__row">
              <form action="" method="post">
                <td colspan="2" class="qname">
                  <input type="text" name="product" class="input__post" value="CREME BRULEE LATTE" readonly>
                </td>
                <td class="qprice">
                  <input type="text" name="price" class="input__post adjusted-price" value="725" readonly>
                  <span class="rs">RS</span>
                </td>
                <td colspan="2" class="mobile-style">
                  <input type="text" class="quantity" name="quantity" value="1" readonly />
                  <input type="hidden" class="orderNo" name="orderNo" value="552" readonly />
                  <button class="btn-mini btn-mini-active minus">-</button>
                  <button class="btn-mini btn-mini-active plus">+</button>
                </td>
                <td>
                  <button class="btn-cart btn-cart-active" type="submit" name="add_to_cart">Add To
                    <svg class="icon-svg-white">
                      <use xlink:href="img/sprite.svg#icon-cart"></use>
                    </svg>
                  </button>
                </td>
              </form>
            </tr>
            <tr class="tabel__row">
              <form action="" method="post">
                <td colspan="2" class="qname">
                  <input type="text" name="product" class="input__post" value="MINICINO / BABYCINO" readonly>
                </td>
                <td class="qprice">
                  <input type="text" name="price" class="input__post adjusted-price" value="490" readonly>
                  <span class="rs">RS</span>
                </td>
                <td colspan="2" class="mobile-style">
                  <input type="text" class="quantity" name="quantity" value="1" readonly />
                  <input type="hidden" class="orderNo" name="orderNo" value="552" readonly />
                  <button class="btn-mini btn-mini-active minus">-</button>
                  <button class="btn-mini btn-mini-active plus">+</button>
                </td>
                <td>
                  <button class="btn-cart btn-cart-active" type="submit" name="add_to_cart">Add To
                    <svg class="icon-svg-white">
                      <use xlink:href="img/sprite.svg#icon-cart"></use>
                    </svg>
                  </button>
                </td>
              </form>
            </tr>
            <tr class="tabel__row">
              <form action="" method="post">
                <td colspan="2" class="qname">
                  <input type="text" name="product" class="input__post" value="CAFFÉ MOCHA" readonly>
                </td>
                <td class="qprice">
                  <input type="text" name="price" class="input__post adjusted-price" value="700" readonly>
                  <span class="rs">RS</span>
                </td>
                <td colspan="2" class="mobile-style">
                  <input type="text" class="quantity" name="quantity" value="1" readonly />
                  <input type="hidden" class="orderNo" name="orderNo" value="552" readonly />
                  <button class="btn-mini btn-mini-active minus">-</button>
                  <button class="btn-mini btn-mini-active plus">+</button>
                </td>
                <td>
                  <button class="btn-cart btn-cart-active" type="submit" name="add_to_cart">Add To
                    <svg class="icon-svg-white">
                      <use xlink:href="img/sprite.svg#icon-cart"></use>
                    </svg>
                  </button>
                </td>
              </form>
            </tr>
            <!-- disabled -->
            <tr class="tabel__row">
              <form action="" method="post">
                <td colspan="2" class="qname">
                  <input type="text" name="product" class="input__post" value="VERY VANILLA LATTE" readonly>
                </td>
                <td class="qprice">
                  <input type="text" name="price" class="input__post adjusted-price" value="850" readonly>
                  <span class="rs">RS</span>
                </td>
                <td colspan="2" class="mobile-style">
                  <input type="text" class="quantity" name="quantity" value="0" readonly />
                  <input type="hidden" class="orderNo" name="orderNo" value="552" readonly />
                  <button class="btn-mini  btn-disable minus">-</button>
                  <button class="btn-mini  btn-disable plus">+</button>
                </td>
                <td>
                  <button class="btn-cart btn-disable" name="btn-disabled">Out of Stock</button>
                </td>
              </form>
            </tr>

            <tr class="tabel__row">
              <form action="" method="post">
                <td colspan="2" class="qname">
                  <input type="text" name="product" class="input__post" value="CHOCOLATE MACADAMIA LATTE" readonly>
                </td>
                <td class="qprice">
                  <input type="text" name="price" class="input__post adjusted-price" value="980" readonly>
                  <span class="rs">RS</span>
                </td>
                <td colspan="2" class="mobile-style">
                  <input type="text" class="quantity" name="quantity" value="1" readonly />
                  <input type="hidden" class="orderNo" name="orderNo" value="552" readonly />
                  <button class="btn-mini btn-mini-active minus">-</button>
                  <button class="btn-mini btn-mini-active plus">+</button>
                </td>
                <td>
                  <button class="btn-cart btn-cart-active" type="submit" name="add_to_cart">Add To
                    <svg class="icon-svg-white">
                      <use xlink:href="img/sprite.svg#icon-cart"></use>
                    </svg>
                  </button>
                </td>
              </form>
            </tr>
          </tbody>
          <thead class="tabel__head">
            <tr>
              <th colspan="6" class="qname">HOT CHOCOLATE</th>
            </tr>
          </thead>
          <tbody class="tabel__body">
            <!-- disabled -->
            <tr class="tabel__row">
              <form action="" method="post">
                <td colspan="2" class="qname">
                  <input type="text" name="product" class="input__post" value="CLASSIC HOT CHOCOLATE" readonly>
                </td>
                <td class="qprice">
                  <input type="text" name="price" class="input__post adjusted-price" value="700" readonly>
                  <span class="rs">RS</span>
                </td>
                <td colspan="2" class="mobile-style">
                  <input type="text" class="quantity" name="quantity" value="0" readonly />
                  <input type="hidden" class="orderNo" name="orderNo" value="552" readonly />
                  <button class="btn-mini  btn-disable minus">-</button>
                  <button class="btn-mini  btn-disable plus">+</button>
                </td>
                <td>
                  <button class="btn-cart btn-disable" name="btn-disabled">Out of Stock</button>
                </td>
              </form>
            </tr>

            <tr class="tabel__row">
              <form action="" method="post">
                <td colspan="2" class="qname">
                  <input type="text" name="product" class="input__post" value="WHITE HOT CHOCOLATE" readonly>
                </td>
                <td class="qprice">
                  <input type="text" name="price" class="input__post adjusted-price" value="490" readonly>
                  <span class="rs">RS</span>
                </td>
                <td colspan="2" class="mobile-style">
                  <input type="text" class="quantity" name="quantity" value="1" readonly />
                  <input type="hidden" class="orderNo" name="orderNo" value="552" readonly />
                  <button class="btn-mini btn-mini-active minus">-</button>
                  <button class="btn-mini btn-mini-active plus">+</button>
                </td>
                <td>
                  <button class="btn-cart btn-cart-active" type="submit" name="add_to_cart">Add To
                    <svg class="icon-svg-white">
                      <use xlink:href="img/sprite.svg#icon-cart"></use>
                    </svg>
                  </button>
                </td>
              </form>
            </tr>

            <tr class="tabel__row">
              <form action="" method="post">
                <td colspan="2" class="qname">
                  <input type="text" name="product" class="input__post" value="CREAMY HOT COCOA" readonly>
                </td>
                <td class="qprice">
                  <input type="text" name="price" class="input__post adjusted-price" value="780" readonly>
                  <span class="rs">RS</span>
                </td>
                <td colspan="2" class="mobile-style">
                  <input type="text" class="quantity" name="quantity" value="1" readonly />
                  <input type="hidden" class="orderNo" name="orderNo" value="552" readonly />
                  <button class="btn-mini btn-mini-active minus">-</button>
                  <button class="btn-mini btn-mini-active plus">+</button>
                </td>
                <td>
                  <button class="btn-cart btn-cart-active" type="submit" name="add_to_cart">Add To
                    <svg class="icon-svg-white">
                      <use xlink:href="img/sprite.svg#icon-cart"></use>
                    </svg>
                  </button>
                </td>
              </form>
            </tr>

          </tbody>
          <thead class="tabel__head">
            <tr>
              <th colspan="6" class="qname">ESPRESSO CHILLERS</th>
            </tr>
          </thead>
          <tbody class="tabel__body">
            <tr class="tabel__row">
              <form action="" method="post">
                <td colspan="2" class="qname">
                  <input type="text" name="product" class="input__post" value="VERY VANILLA CHILLER" readonly>
                </td>
                <td class="qprice">
                  <input type="text" name="price" class="input__post adjusted-price" value="725" readonly>
                  <span class="rs">RS</span>
                </td>
                <td colspan="2" class="mobile-style">
                  <input type="text" class="quantity" name="quantity" value="1" readonly />
                  <input type="hidden" class="orderNo" name="orderNo" value="552" readonly />
                  <button class="btn-mini btn-mini-active minus">-</button>
                  <button class="btn-mini btn-mini-active plus">+</button>
                </td>
                <td>
                  <button class="btn-cart btn-cart-active" type="submit" name="add_to_cart">Add To
                    <svg class="icon-svg-white">
                      <use xlink:href="img/sprite.svg#icon-cart"></use>
                    </svg>
                  </button>
                </td>
              </form>
            </tr>
            <tr class="tabel__row">
              <form action="" method="post">
                <td colspan="2" class="qname">
                  <input type="text" name="product" class="input__post" value="CRÈME BRULE CHILLER" readonly>
                </td>
                <td class="qprice">
                  <input type="text" name="price" class="input__post adjusted-price" value="490" readonly>
                  <span class="rs">RS</span>
                </td>
                <td colspan="2" class="mobile-style">
                  <input type="text" class="quantity" name="quantity" value="1" readonly />
                  <input type="hidden" class="orderNo" name="orderNo" value="552" readonly />
                  <button class="btn-mini btn-mini-active minus">-</button>
                  <button class="btn-mini btn-mini-active plus">+</button>
                </td>
                <td>
                  <button class="btn-cart btn-cart-active" type="submit" name="add_to_cart">Add To
                    <svg class="icon-svg-white">
                      <use xlink:href="img/sprite.svg#icon-cart"></use>
                    </svg>
                  </button>
                </td>
              </form>
            </tr>
            <tr class="tabel__row">
              <form action="" method="post">
                <td colspan="2" class="qname">
                  <input type="text" name="product" class="input__post" value="CAFFÉ MOCHA Special" readonly>
                </td>
                <td class="qprice">
                  <input type="text" name="price" class="input__post adjusted-price" value="999" readonly>
                  <span class="rs">RS</span>
                </td>
                <td colspan="2" class="mobile-style">
                  <input type="text" class="quantity" name="quantity" value="1" readonly />
                  <input type="hidden" class="orderNo" name="orderNo" value="552" readonly />
                  <button class="btn-mini btn-mini-active minus">-</button>
                  <button class="btn-mini btn-mini-active plus">+</button>
                </td>
                <td>
                  <button class="btn-cart btn-cart-active" type="submit" name="add_to_cart">Add To
                    <svg class="icon-svg-white">
                      <use xlink:href="img/sprite.svg#icon-cart"></use>
                    </svg>
                  </button>
                </td>
              </form>
            </tr>

            <!-- disabled -->
            <tr class="tabel__row">
              <form action="" method="post">
                <td colspan="2" class="qname">
                  <input type="text" name="product" class="input__post" value="VOLTAGE" readonly>
                </td>
                <td class="qprice">
                  <input type="text" name="price" class="input__post adjusted-price" value="850" readonly>
                  <span class="rs">RS</span>
                </td>
                <td colspan="2" class="mobile-style">
                  <input type="text" class="quantity" name="quantity" value="0" readonly />
                  <input type="hidden" class="orderNo" name="orderNo" value="552" readonly />
                  <button class="btn-mini  btn-disable minus">-</button>
                  <button class="btn-mini  btn-disable plus">+</button>
                </td>
                <td>
                  <button class="btn-cart btn-disable" name="btn-disabled">Out of Stock</button>
                </td>
              </form>
            </tr>
            <tr class="tabel__row">
              <form action="" method="post">
                <td colspan="2" class="qname">
                  <input type="text" name="product" class="input__post" value="CHOCOLATE MACADAMIA LATTE" readonly>
                </td>
                <td class="qprice">
                  <input type="text" name="price" class="input__post adjusted-price" value="980" readonly>
                  <span class="rs">RS</span>
                </td>
                <td colspan="2" class="mobile-style">
                  <input type="text" class="quantity" name="quantity" value="1" readonly />
                  <input type="hidden" class="orderNo" name="orderNo" value="552" readonly />
                  <button class="btn-mini btn-mini-active minus">-</button>
                  <button class="btn-mini btn-mini-active plus">+</button>
                </td>
                <td>
                  <button class="btn-cart btn-cart-active" type="submit" name="add_to_cart">Add To
                    <svg class="icon-svg-white">
                      <use xlink:href="img/sprite.svg#icon-cart"></use>
                    </svg>
                  </button>
                </td>
              </form>
            </tr>
          </tbody>
        </table>
      </section>
      <section class="headline">
        <marquee direction="left" class="blink">
          Special Discount upto 27% till 30th June, 2023 --- Use Voucher:
          WelcomeJuly
        </marquee>
      </section>
    </main>
    <footer class="footer" id="footer">
      <div class="footer__left">
        <ul class="footer__list">
          <li class="footer__list--item">Terms And Conditions</li>
          <li class="footer__list--item">Privacy Policy</li>
          <li class="footer__list--item">About Us</li>
          <li class="footer__list--item">Contact us</li>
          <li class="footer__list--item">Deals</li>
        </ul>
      </div>
      <div class="footer__center">
        <ul class="footer__list">
          <li class="footer__list--item">Know more</li>
          <li class="footer__list--item">Partners</li>
          <li class="footer__list--item">Stocks</li>
          <li class="footer__list--item">Social handles</li>
          <li class="footer__list--item">Timings</li>
        </ul>
      </div>
      <div class="footer__center">
        <ul class="footer__list">
          <li class="footer__list--item">Our Address</li>
          <li class="footer__list--item">About us</li>
          <li class="footer__list--item">Our Menu</li>
          <li class="footer__list--item">Top Stories</li>
          <li class="footer__list--item">Top 10 items</li>
        </ul>
      </div>
      <div class="footer__right">
        <div class="content-footer">
          <h2>Download Our App</h2>
        </div>
        <div class="footer-images">
          <div class="image-play">
            <img src="img/code.png" alt="Qrcode" class="footer__code" />
            <img src="img/playstore.png" alt="playstore" class="footer__code-link" />
          </div>

          <div class="image-app">
            <img src="img/code.png" alt="Qrcode" class="footer__code" />
            <img src="img/appstore.png" alt="appstore" class="footer__code-link" />
          </div>
        </div>
      </div>
    </footer>
    <div class="copyright">
      &copy; All rights Reserverd <span class="copyYear"></span> --- Made by
      <a href="https://www.linkedin.com/in/chnoumanejaz/" target="_blank" class="linkedin">Muhammad Nouman Ejaz</a>
    </div>

    <div class="overlay hidden"></div>
    <section class="model-cart hidden">
      <a href="#">
        <img src="img/icons/cross-23.svg" alt="Close" class="btn--close-cart" />
      </a>
      <div class="model-cart__content">
        <?php
        require 'renderCart.php';
        if (isset($_SESSION['cart'])) {
          echo "<div class='checkout'><button class='btn cartpageBTN'>Checkout</button> </div>";
        }
        ?>
      </div>
    </section>

    <section class="error-sec">
      <div class="error">
        This is Error
      </div>
    </section>
    <section class="success-sec">
      <div class="success">
        This is success
      </div>
    </section>
    <script src="js/index.js"></script>
  </body>

  </html>

  <?php
} else {
  header("Location: main.php");
}
?>