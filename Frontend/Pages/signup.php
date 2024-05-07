<?php
    require_once("../Views/userView.php");
    require_once("../Controllers/userController.php");
?>
<html>

<head>
<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


<!-- Additional CSS Files -->
<link rel="stylesheet" href="../Assets/assets/css/fontawesome.css">
<link rel="stylesheet" href="../Assets/assets/css/templatemo-lugx-gaming.css">
<link rel="stylesheet" href="../Assets/assets/css/owl.css">
<link rel="stylesheet" href="../Assets/assets/css/animate.css">
<link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
</head>

<body>
    <center>
        <h1 class="title" style="margin-top: 50px;"> Sign Up</h1>
        <h3>Already have an account? <a href="./login.php">Login</a></h3>
        <?php
            SignupForm();
        ?>
    </center>

    <script src="../Assets/vendor/jquery/jquery.min.js"></script>
    <script src="../Assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../Assets/assets/js/isotope.min.js"></script>
    <script src="../Assets/assets/js/owl-carousel.js"></script>
    <script src="../Assets/assets/js/counter.js"></script>
    <script src="../Assets/assets/js/custom.js"></script>
</body>

</html>