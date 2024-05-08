<?php 
    require_once("./Common/navbar.php");
    require_once("../Views/userView.php");
    require_once("../../Backend/Models/userModel.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us</title>
    <link href="../Assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../Assets/assets/css/fontawesome.css">
    <link rel="stylesheet" href="../Assets/assets/css/templatemo-lugx-gaming.css">
    <link rel="stylesheet" href="../Assets/assets/css/owl.css">
    <link rel="stylesheet" href="../Assets/assets/css/animate.css">
</head>
<body>

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
 
    userNavbar("shop"); 
    $categories = getAllProductCategories("Shop");
    displayShopPage($categories);
    ?>


    <script src="../Assets/vendor/jquery/jquery.min.js"></script>
    <script src="../Assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../Assets/assets/js/custom.js"></script>
</body>
</html>