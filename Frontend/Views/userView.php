<?php


/**
 * This function is used to display the login form
 * @return void
 * 
 */
function LoginForm(){
    ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6"> 
    
                <div class="card shadow-lg p-5 bg-white rounded"> 
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">Login to Your Account</h3> 
                        <form class="form-container" id="login-form" action="../../Backend/Controllers/userController.php" method="post">
                            <input type="hidden" name="action" value="LOGIN">
                            <div class="form-group mb-4"> 
                                <label for="username" class="h5 text-left">Username</label> 
                                <input class="form-control form-control-lg" id="username" type="text" name="username" placeholder="Enter your username" required> 
                            </div>
                            <div class="form-group mb-4">
                                <label for="password" class="h5 text-left">Password</label> 
                                <input class="form-control form-control-lg" id="password" type="password" name="password" placeholder="Enter your password" required>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary btn-lg btn-block" type="submit" name="login" value="Login"> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}



/**
 * This function is used to display the sign up form
 * @return void
 */
function SignUpForm(){
    ?>
    <form class="form-container" id="signup-form" action="../../Backend/Controllers/userController.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="action" value="SIGNUP">
        <input class="input-field" type="text" name="username" placeholder="Username" required>
        <input class="input-field" type="text" name="firstname" placeholder="Firstname" required>
        <input class="input-field" type="text" name="lastname" placeholder="Lastname" required>
        <input class="input-field" type="email" name="email" placeholder="Email" required>
        <input class="input-field" type="password" name="password" placeholder="Password" required>
        <div style="text-align: left; margin-bottom: 10px;">
            Gender:
            <label><input type="radio" name="gender" value="male" required> Male</label>
            <label><input type="radio" name="gender" value="female"> Female</label>
        </div>
        <input class="input-field" type="number" name="age" placeholder="Age" required>
        <label for="profilePicture" style="float: left; margin-bottom: 10px;">Profile Picture:</label>
        <input class="input-field" type="file" name="profilePicture" accept="image/png, image/jpeg" required>
        <input class="input-field" type="hidden" name="role" value="User">
        <input class="input-field" type="submit" name="signup" value="Sign Up">
    </form>
    <?php   
}


function getAllProducts($categories){
  ?>
  <div class="section trending">
      <div class="container">
          <?php foreach ($categories as $category): ?>
              <div class="row">
                  <div class="col-lg-12">
                      <div class="section-heading">
                          <h2><?= htmlspecialchars($category['CATEGORY']) ?></h2>
                      </div>
                  </div>
                  <div class="col-lg-12">
                      <div class="main-button">
                          <a href="shop.html">View All</a>
                      </div>
                  </div>
                  <?php
                  $products = getProductsByCategory($category['CATEGORY']);
                  foreach ($products as $product):
                  ?>
                      <div class="col-lg-3 col-md-6">
                          <div class="item">
                              <div class="thumb">
                              <?php
                               echo '<a href="./Frontend/Pages/shop.php?productID=' . htmlspecialchars($product['ID']) . '"><img src="./Frontend/AdminAssets/Images/ProductImages/' . htmlspecialchars($product['IMAGE']) . '" alt="' . htmlspecialchars($product['PRODUCT']) . '" class="img-fluid" style="width: 300px; height: 300px; object-fit: contain;"></a>';
                              ?>
                                  <span class="price"><?= htmlspecialchars($product['PRICE']) ?></span>
                              </div>
                              <div class="down-content">
                                  <span class="category"><?= htmlspecialchars($product['CATEGORY']) ?></span>
                                  <h4><?= htmlspecialchars($product['PRODUCT']) ?></h4>
                                  <a href="product-details.html"><i class="fa fa-shopping-bag"></i></a>
                              </div>
                          </div>
                      </div>
                  <?php endforeach; ?>
              </div>
          <?php endforeach; ?>
      </div>
  </div>
  <?php
}

function displayProductDetails($product){
  ?>
  <main id="main">
      <section class="single-post-content">
          <div class="container">
              <div class="row">
                  <div class="col-md-9 post-content" data-aos="fade-up">
                      <!-- ======= Single Post Content ======= -->
                      <div class="single-post">
                          <div class="post-meta">
                              <span class="date"><?= $product['CATEGORY'] ?></span>
                              <span class="mx-1">&bullet;</span>
                          </div>
                          <h1 class="mb-5"><?= $product['PRODUCT'] ?></h1>
                          <img src="../AdminAssets/Images/ProductImages/<?= $product['IMAGE'] ?>" alt="" class="img-fluid" style="width: 300px; height: 300px; object-fit: contain;">
                          <p><?= $product['DESCRIPTION'] ?></p>
                      </div><!-- End Single Post Content -->

                  </div>
              </div>
          </div>
      </section>
  </main><!-- End #main -->
  <?php
}
?>
  