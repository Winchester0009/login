<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./styles.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="shortcut icon" type="image/jpg" href="./assets/favicon.jpg" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins&display=swap"
      rel="stylesheet"
    />
    <script src="./script.js"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
    />
    <title>Nieli Market Shop</title>
  </head>

  <body>
    <input type="checkbox" name="" id="check" />

    <nav class="sticky">
      <div class="icon">Shop</div>
      <div class="search_box">
        <input type="search" placeholder="Search products" />
        <span class="fa fa-search"></span>
      </div>

      <ol>
        <li><a href="#Trending" class="btn btn-center">Trending </a></li>
        <li><a href="#Products" class="btn btn-center">Products</a></li>
        <li><a href="login-signup/logout.php">Logout</a>
        </li>
      </ol>
      <label for="check" class="bar">
        <span class="fa fa-bars" id="bars"></span>
        <span class="fa fa-times" id="times"></span>
      </label>
    </nav>
  </body>

  <!-- Slideshow container -->
  <div class="slideshow-container">
      <img src="1.png">
  </div>

  <!-- Product section. -->
  <!-- Top deals section starts -->
  <section class="product">
    <h2 class="product-category" id="Trending">Top Deals</h2>
  </section>
  <div class="product-container">
    <div class="product-card">
      <div class="product-image">
        <a href="./products/product_page.html">
        <span class="discount-tag">5% off if buy 2</span>
        <img src="Golden.png" class="product-thumb" alt="" />
      </a>
        <button class="card-btn">add to whislist</button>
      </div>
      <div class="product-info">
        <a href="./products/product_page.html">
        <h2 class="product-brand">Golden Fairy</h2>
        <p class="product-short-des">Legendary</p>
        <span class="price">120$</span><span class="actual-price">150$</span>
      </a>
      </div>
    </div>
    <div class="product-card">
      <div class="product-image">
        <a href="./products/product_page.html">
        <span class="discount-tag">10% off</span>
        <img src="2.png" class="product-thumb" alt="" />
      </a>
        <button class="card-btn">add to whislist</button>
      </div>
      <div class="product-info">
        <a href="./products/product_page.html">
        <h2 class="product-brand">Suveria's runeblade</h2>
        <p class="product-short-des">Legendary</p>
        <span class="price">150$</span><span class="actual-price">190$</span>
      </a>
      </div>
    </div>
    <div class="product-card">
      <div class="product-image">
        <a href="./products/product_page.html">
        <span class="discount-tag">6% off</span>
        <img src="3.png" class="product-thumb" alt="" />
      </a>
        <button class="card-btn">add to whislist</button>
      </div>
      <div class="product-info">
        <a href="./products/product_page.html">
        <h2 class="product-brand">Golden bar/ore</h2>
        <p class="product-short-des">Legendary</p>
        <span class="price">25$ - 30$</span><span class="actual-price">35$</span>
      </a>
      </div>
    </div>
    <div class="product-card">
      <div class="product-image">
        <a href="./products/product_page.html">
        <span class="discount-tag">5% off if buy 2</span>
        <img src="5.png" class="product-thumb" alt="" />
      </a>
        <button class="card-btn">add to whislist</button>
      </div>
      <div class="product-info">
        <a href="./products/product_page.html">
        <h2 class="product-brand">Lucky Ring</h2>
        <p class="product-short-des">Legendary</p>
        <span class="price">35$ - 40$</span><span class="actual-price">45$</span>
      </a>
      </div>
    </div>

  </div>

  <!-- Top deals section ends -->
  <!-- shoes section starts -->

  <!-- Cloths section ends -->
  <!-- Product Section ends -->

  <!-- Footer section starts -->
  <footer>
    <div class="footer-content">
      <h3>Nieli Market Shop</h3>
      <div class="social">
        <a href="#"><i class="fab fa-discord"></i></a>
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
      </div>
      <p class="copyright">
    &copy; Nieli @2025 . All rights reserved
      </p>
    </div>
</footer>
  <!-- Footer section ends -->
  <script src="https://kit.fontawesome.com/67c66657c7.js"></script>
  <script src="./script.js"></script>
</html>