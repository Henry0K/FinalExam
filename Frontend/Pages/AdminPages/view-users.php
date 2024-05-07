<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        header('Location: ../../index.php');
        exit;
    }
    require_once("../Common/navbar.php");
    require_once("../../../Backend/Models/adminModel.php");
    require_once("../../Views/adminView.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
  <link href="../../AdminAssets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../AdminAssets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../../AdminAssets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../../AdminAssets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../../AdminAssets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../../AdminAssets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../../AdminAssets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
  <link href="../../AdminAssets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <?php AdminNavbar('View Users'); ?>
  

  <main id="main" class="main">
        <div class="pagetitle">
            <h1 class="text-center">View Users</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <?php    
                        $users = getUsers();
                        displayUsers($users);
                        showEditUser();
                    ?>
                </div>
            </div>
        </section>


 <!-- Vendor JS Files -->
 <script src="../Assets/vendor/apexcharts/apexcharts.min.js"></script>
        <script src="../Assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../Assets/vendor/chart.js/chart.umd.js"></script>
        <script src="../Assets/vendor/echarts/echarts.min.js"></script>
        <script src="../Assets/vendor/quill/quill.js"></script>
        <script src="../Assets/vendor/simple-datatables/simple-datatables.js"></script>
        <script src="../Assets/vendor/tinymce/tinymce.min.js"></script>
        <script src="../Assets/vendor/php-email-form/validate.js"></script>


        <!-- Template Main JS File -->
        <script src="../Assets/js/main.js"></script>

</body>

</html>