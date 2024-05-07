<?php
session_start();
session_unset();
session_destroy();

require_once("../Views/adminView.php");
require_once("../Controllers/userController.php");

?>
<html>
    <head>

    <!-- LINK TO TEMPLATE ASSETS -->
        <!-- Bootstrap core CSS -->
        <link href="../Assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


        <!-- Additional CSS Files -->
        <link rel="stylesheet" href="../Assets/assets/css/fontawesome.css">
        <link rel="stylesheet" href="../Assets/assets/css/templatemo-lugx-gaming.css">
        <link rel="stylesheet" href="../Assets/assets/css/owl.css">
        <link rel="stylesheet" href="../Assets/assets/css/animate.css">
        <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    </head>

    <body>
        <center>
            <h1 class="title" style="margin-top: 50px;">Login</h1>
            <div class="login-container">
                <?php 
                    LoginForm();
                ?>     
                <?php
                    ScriptLogin();
                ?>
            </div>
        </center>


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