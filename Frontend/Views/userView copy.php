<?php
   

function LoginForm(){
    ?>
    <form class="form-container" id="login-form" action="Backend/Controllers/userController.php" method="post">
        <input type="hidden" name="action" value="LOGIN">
        <input class="input-field" type="text" name="username" placeholder="Username">
        <input class="input-field" type="password" name="password" placeholder="Password">
        <input class="input-field" type="submit" name="login" value="Login">
    </form>
    <?php
}

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
    foreach ($categories as $category) {
        $products = getProductsByCategory($category['Category']);
        ?>
        <section id="<?= $category['Category'] ?>-products" class="product-store position-relative padding-large no-padding-top">
        <div class="container">
          <div class="row">
            <div class="display-header d-flex justify-content-between pb-3">
              <h2 class="display-7 text-dark text-uppercase"><?= $category['Category'] ?></h2>
              <div class="btn-right">
                <a href="shop.html" class="btn btn-medium btn-normal text-uppercase">Go to Shop</a>
              </div>
            </div>
            <div class="swiper product-swiper">
              <div class="swiper-wrapper">
                <?php foreach ($products as $product): ?>
                <div class="swiper-slide">
                  <div class="product-card position-relative">
                    <div class="image-holder">
                      <img src="../AdminAssets/Images/ProductImages/<?= $product['Image'] ?>" alt="<?= $product['Name'] ?>" class="img-fluid" style="width: 400px; height: 400px; object-fit: contain;">
                      
                    </div>
                    <div class="cart-concern position-absolute">
                      <div class="cart-button d-flex">
                        <a href="#" class="btn btn-medium btn-black">Add to Cart<svg class="cart-outline"><use xlink:href="#cart-outline"></use></svg></a>
                      </div>
                    </div>
                    <div class="card-detail d-flex justify-content-between align-items-baseline pt-3">
                      <h3 class="card-title text-uppercase">
                        <a href="#"><?= $product['Name'] ?></a>
                      </h3>
                      <span class="item-price text-primary">$<?= $product['Price']?></span>
                    </div>
                  </div>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-pagination position-absolute text-center"></div>
      </section>
      <?php
    }
}



?>