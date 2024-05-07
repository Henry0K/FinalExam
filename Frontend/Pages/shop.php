
<?php 
   require_once("./Common/navbar.php");
   require_once("./Common/footer.php");
   require_once("../../Backend/Models/userModel.php");
   require_once("../Views/userView.php");
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Lugx Gaming - Shop Page</title>

    <!-- Bootstrap core CSS -->
    <link href="../Assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="../Assets/assets/css/fontawesome.css">
    <link rel="stylesheet" href="../Assets/assets/css/templatemo-lugx-gaming.css">
    <link rel="stylesheet" href="../Assets/assets/css/owl.css">
    <link rel="stylesheet" href="../Assets/assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
<!--

TemplateMo 589 lugx gaming

https://templatemo.com/tm-589-lugx-gaming

-->
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


  <div class="page-heading header-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h3>Our Shop</h3>
          <span class="breadcrumb"><a href="#">Home</a> > Our Shop</span>
        </div>
      </div>
    </div>
  </div>


<?php
    userNavbar1("Shop");
    $productID = $_GET['productID'];
    $product = getProductByID($productID);
    displayProductDetails($product);
  userFooter();
  
  ?>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="../Assets/vendor/jquery/jquery.min.js"></script>
  <script src="../Assets/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="../Assets/assets/js/isotope.min.js"></script>
  <script src="../Assets/assets/js/owl-carousel.js"></script>
  <script src="../Assets/assets/js/counter.js"></script>
  <script src="../Assets/assets/js/custom.js"></script>

  </body>
</html>