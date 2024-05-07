
<?php 
   require_once("./Common/navbar.php");

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
            padding: 10px;
            
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
    <?php require_once("./Common/navbar.php"); userNavbar1("Contact"); ?>

    <div class="container push-down-container" >
        <h2>Contact Us</h2>
        <form action="userController.php" method="post">
    <input type="hidden" name="form_type" value="CONTACT">
    <div class="mb-3">
        <label for="phone" class="form-label">Phone</label>
        <input type="tel" class="form-control" id="phone" name="phone" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="mb-3">
        <label for="subject" class="form-label">Subject</label>
        <input type="text" class="form-control" id="subject" name="subject" required>
    </div>
    <div class="mb-3">
        <label for="body" class="form-label">Message</label>
        <textarea class="form-control" id="body" name="body" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Send Message</button>
</form>
    </div>

    <script src="../Assets/vendor/jquery/jquery.min.js"></script>
    <script src="../Assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../Assets/assets/js/custom.js"></script>
</body>
</html>