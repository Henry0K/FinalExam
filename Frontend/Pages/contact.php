<?php 
    require_once("./Common/navbar.php");
    require_once("../Views/userView.php");
    require_once("../Controllers/userController.php");
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
    <style>
        .header-area {
            background-color: #007BFF; 
            padding: 20px;
            padding-top: 40px;
            top: 0;
            
        }
        .nav-link {
            color: white; 
        }
        .nav-link:hover {
            color: #FFD700; 
        }
        .logo img {
            filter: brightness(0) invert(1); 
        }
        .push-down-container {
            margin-top: 150px; 
        }
    </style>
</head>
<body>
    <?php 
    displayCart();
    cartScripts();
    userNavbar("contact"); 
    displayContactForm();
    ?>


    <script src="../Assets/vendor/jquery/jquery.min.js"></script>
    <script src="../Assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../Assets/assets/js/custom.js"></script>
</body>
</html>