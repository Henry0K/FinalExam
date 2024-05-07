<?php
    require_once("./Frontend/Pages/Common/navbar.php");
?>
<html>
    <head>

    <!-- LINK TO TEMPLATE ASSETS -->
        <!-- Bootstrap core CSS -->
        <link href="./Frontend/Assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    

        <!-- Additional CSS Files -->
        <link rel="stylesheet" href="./Frontend/Assets/assets/CSS/fontawesome.css">
        <link rel="stylesheet" href="./Frontend/Assets/assets/CSS/templatemo-lugx-gaming.css">
        <link rel="stylesheet" href="./Frontend/Assets/assets/CSS/owl.css">
        <link rel="stylesheet" href="./Frontend/Assets/assets/CSS/animate.css">
        <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
      
    </head>

    <body>
         <!-- ***** Preloader Start ***** -->
        <div id="js-preloader" class="js-preloader">
            <div class="preloader-inner">
                <span class="dot"></span>
                <div class="dots">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
    <?php 
        userNavbar("Home");?>
  <!-- ***** Header Area End ***** -->

    
  <div class="main-banner">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="caption header-text">
            <h6>Welcome to lugx</h6>
            <h2>BEST GAMING SITE EVER!</h2>
            <p>LUGX Gaming is free Bootstrap 5 HTML CSS website template for your gaming websites. You can download and use this layout for commercial purposes. Please tell your friends about TemplateMo.</p>
            <div class="search-input">
              <form id="search" action="#">
                <input type="text" placeholder="Type Something" id='searchText' name="searchKeyword" onkeypress="handle" />
                <button role="button">Search Now</button>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-4 offset-lg-2">
          <div class="right-image">
            <img src="assets/images/banner-image.jpg" alt="">
            <span class="price">$22</span>
            <span class="offer">-40%</span>
          </div>
        </div>
      </div>
    </div>
  </div>
    
  <div class="features">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <a href="#">
            <div class="item">
              <div class="image">
                <img src="assets/images/featured-01.png" alt="" style="max-width: 44px;">
              </div>
              <h4>Free Storage</h4>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6">
          <a href="#">
            <div class="item">
              <div class="image">
                <img src="assets/images/featured-02.png" alt="" style="max-width: 44px;">
              </div>
              <h4>User More</h4>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6">
          <a href="#">
            <div class="item">
              <div class="image">
                <img src="assets/images/featured-03.png" alt="" style="max-width: 44px;">
              </div>
              <h4>Reply Ready</h4>
            </div>
          </a>
        </div>
        <div class="col-lg-3 col-md-6">
          <a href="#">
            <div class="item">
              <div class="image">
                <img src="assets/images/featured-04.png" alt="" style="max-width: 44px;">
              </div>
              <h4>Easy Layout</h4>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>

        <!-- Scripts -->
        <!-- Bootstrap core JavaScript -->
        <script src="./Frontend/Assets/vendor/jquery/jquery.min.js"></script>
        <script src="./Frontend/Assets/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="./Frontend/Assets/assets/js/isotope.min.js"></script>
        <script src="./Frontend/Assets/assets/js/owl-carousel.js"></script>
        <script src="./Frontend/Assets/assets/js/counter.js"></script>
        <script src="./Frontend/Assets/assets/js/custom.js"></script>
    </body>
</html>