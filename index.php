<?php
    require_once("./Frontend/Pages/Common/navbar.php");
    require_once("./Frontend/Pages/Common/footer.php");

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
            <h6>Welcome to TechHub</h6>
            <h2>Discover the Future of Technology at Our Store</h2>
            <p>TechHub offers a premier selection of technology products for every aspect of modern life. From the latest smartphones and smart home devices to high-performance computing solutions and cutting-edge accessories, our catalog is designed to elevate your tech experience. Whether you're enhancing your home, upgrading your workspace, or gifting the latest gadgets, explore our extensive range to find exactly what you need. Join the TechHub community to stay informed and ahead in the world of technology!</p>
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
            <img src="./Frontend/Assets/assets/images/appleipad.jpg" alt="">
            <span class="price">$899</span>
            <span class="offer">-10%</span>
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
                        <div class="image text-center">
                            <i class="fas fa-mobile-alt fa-3x"></i>
                        </div>
                        <h4>Smartphones and Accessories</h4>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a href="#">
                    <div class="item">
                        <div class="image text-center">
                            <i class="fas fa-tablet-alt fa-3x"></i>
                        </div>
                        <h4>Tablets and Portable Computing</h4>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a href="#">
                    <div class="item">
                        <div class="image text-center">
                            <i class="fas fa-laptop fa-3x"></i>
                        </div>
                        <h4>Laptops and Desktop Computers</h4>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6">
                <a href="#">
                    <div class="item">
                        <div class="image text-center">
                            <i class="fas fa-home fa-3x"></i>
                        </div>
                        <h4>Smart Home Devices</h4>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>


  <?php 
         userFooter();?>
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