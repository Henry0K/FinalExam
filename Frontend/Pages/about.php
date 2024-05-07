<?php 
require_once("./Common/navbar.php");
userNavbar1("About");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - TechHub</title>
    <link href="../Assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php require_once("./Common/navbar.php"); userNavbar1("About"); ?>

    <div class="container mt-5">
        <h1 class="mb-3">About Us</h1>
        <div class="row">
            <div class="col-lg-12">
                <p>Welcome to TechHub, your number one source for all things tech. We're dedicated to giving you the very best of technology products, with an emphasis on innovation, customer service, and uniqueness.</p>
                <p>Founded in 2020 by Alain Samaha, Alex Kheir, Henry Hardane and Jessy Demirjian, TechHub has come a long way from its beginnings in Lebanon.</p>
            </div>
        </div>
        <h2 class="mt-4 mb-3">Our Mission</h2>
        <div class="row">
            <div class="col-lg-12">
                <p>Our mission is to provide the latest and greatest in technology to our customers. From the latest smartphones to the most powerful laptops, we strive to offer our customers a diverse range of high-quality products at competitive prices.</p>
            </div>
        </div>
        <h2 class="mt-4 mb-3">Meet Our Team</h2>
        <div class="row">
            <div class="col-sm-6 col-md-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Henry Hardane</h5>
                        <p class="card-text">Position: CEO</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Alan Samaha</h5>
                        <p class="card-text">Position: CTO</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Alex Kheir</h5>
                        <p class="card-text">Position: Lead Developer</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Jessy Demirjian</h5>
                        <p class="card-text">Position: CFO</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../Assets/vendor/jquery/jquery.min.js"></script>
    <script src="../Assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>