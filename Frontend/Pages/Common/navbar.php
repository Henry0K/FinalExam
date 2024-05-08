<?php


function userNavbar($activePage){
  // Determine the base path for links based on the active page
  $basePath = ($activePage == 'Home') ? "../Final/Frontend/Pages/" : "./";
  $homePath = ($activePage == 'Home') ? "index.php" : "../../index.php";

  ?>
  <header class="header-area header-sticky">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <nav class="main-nav">
                      <a href="<?php echo $homePath; ?>" class="logo">
                          <img src="./Frontend/Assets/assets/images/LOGO.svg" alt="" style="width: 158px; margin-top: -20px;">
                      </a>
                      <!-- Navigation -->
                      <ul class="nav">
                          <li><a href="<?php echo $homePath; ?>" <?php echo ($activePage == 'Home') ? 'class="active"' : ''; ?>>Home</a></li>
                            <li><a href="<?php echo $basePath; ?>shop.php" <?php echo ($activePage == 'shop') ? 'class="active"' : ''; ?>>Shop</a></li>
                          <li><a href="<?php echo $basePath; ?>about.php" <?php echo ($activePage == 'about') ? 'class="active"' : ''; ?>>About Us</a></li>
                          <li><a href="<?php echo $basePath; ?>contact.php" <?php echo ($activePage == 'contact') ? 'class="active"' : ''; ?>>Contact Us</a></li>
                          <li><a href="#" onclick="toggleCart(); return false;">Cart</a></li>
                          <li><a href="<?php echo $basePath; ?>login.php" <?php echo ($activePage == 'signin') ? 'class="active"' : ''; ?>>Sign In</a></li>
                      </ul>   
                      <!-- Menu Trigger -->
                      <a class='menu-trigger'>
                          <span>Menu</span>
                      </a>
                  </nav>
              </div>
          </div>
      </div>
  </header>
  <?php
}



function AdminNavbar($activePage){
  ?>
  
  <header id="header" class="header fixed-top d-flex align-items-center">
      <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
          <img src="assets/img/logo.png" alt="">
          <span class="d-none d-lg-block">User Panel</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
      </div><!-- End Logo -->


      <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

          <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
              <img src="../../AdminAssets/Images/ProfilePictures/<?php echo $_SESSION['ProfilePicture']; ?>" alt="Profile" class="rounded-circle">
              <span class="d-none d-md-block dropdown-toggle ps-2">Admin</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
              <li class="dropdown-header">
              <h6><?php echo $_SESSION['firstname'] . " " . $_SESSION['lastname']; ?></h6>
              </li>
              <li>
              <hr class="dropdown-divider">
              </li>

              <li>
              <a class="dropdown-item d-flex align-items-center" href="../../../index.php">
                  <i class="bi bi-box-arrow-right"></i>
                  <span>Sign Out</span>
              </a>
              </li>

          </ul><!-- End Profile Dropdown Items -->
          </li><!-- End Profile Nav -->

      </ul>
      </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->
  
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
        <?php echo ($activePage == 'Dashboard') ? '<a class="nav-link active" href="#">' : '<a class="nav-link collapsed" href="./admin.php">'; ?>
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
        </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
        <a class="nav-link <?php echo ($activePage == 'Add Products') || ($activePage == 'View Products') ? '' : 'collapsed'; ?>" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#" <?php echo ($activePage == 'Add Products') || ($activePage == 'View Products') ? 'aria-expanded="true"' : 'aria-expanded="false"'; ?>>
        <i class="bi bi-menu-button-wide"></i><span>Products</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse <?php echo ($activePage == 'Add Products') || ($activePage == 'View Products') ? 'show' : ''; ?>" data-bs-parent="#sidebar-nav">
        <li>
            <?php echo ($activePage == 'Add Products') ? '<a href="#" class="active">' : '<a href="./add-products.php">'; ?>
            <i class="bi bi-circle"></i><span>Add Products</span>
            </a>
        </li>
        <li>
            <?php echo ($activePage == 'View Products') ? '<a href="#" class="active">' : '<a href="./view-products.php">'; ?>
            <i class="bi bi-circle"></i><span>View Products</span>
            </a>
        </li>
        </ul>
    </li><!-- End Products Nav -->

    <li class="nav-item">
        <a class="nav-link <?php echo ($activePage == 'Add Users') || ($activePage == 'View Users') ? '' : 'collapsed'; ?>" data-bs-target="#users-nav" data-bs-toggle="collapse" href="#" <?php echo ($activePage == 'Add Users') || ($activePage == 'View Users') ? 'aria-expanded="true"' : 'aria-expanded="false"'; ?>>
        <i class="bi bi-menu-button-wide"></i><span>Users</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="users-nav" class="nav-content collapse <?php echo ($activePage == 'Add Users') || ($activePage == 'View Users') ? 'show' : ''; ?>" data-bs-parent="#sidebar-nav">
        <li>
            <?php echo ($activePage == 'Add Users') ? '<a href="#" class="active">' : '<a href="./add-users.php">'; ?>
            <i class="bi bi-circle"></i><span>Add Users</span>
            </a>
        </li>
        <li>
            <?php echo ($activePage == 'View Users') ? '<a href="#" class="active">' : '<a href="./view-users.php">'; ?>
            <i class="bi bi-circle"></i><span>View Users</span>
            </a>
        </li>
        </ul>
    </li><!-- End Users Nav -->

    <!-- Begin Messages Nav -->
    <li class="nav-item">
        <a class="nav-link <?php echo ($activePage == 'View Messages') ? '' : 'collapsed'; ?>" data-bs-target="#messages-nav" data-bs-toggle="collapse" href="#" <?php echo ($activePage == 'View Messages') ? 'aria-expanded="true"' : 'aria-expanded="false"'; ?>>
        <i class="bi bi-envelope"></i><span>Messages</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="messages-nav" class="nav-content collapse <?php echo ($activePage == 'View Messages') ? 'show' : ''; ?>" data-bs-parent="#sidebar-nav">
        <li>
            <?php echo ($activePage == 'View Messages') ? '<a href="#" class="active">' : '<a href="./view-messages.php">'; ?>
            <i class="bi bi-circle"></i><span>View Messages</span>
            </a>
        </li>
        </ul>
    </li><!-- End Messages Nav -->

    </ul>
</aside><!-- End Sidebar-->
<?php
}
?>


