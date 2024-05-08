<?php

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
                          <a href="./Frontend/Pages/shop.php">View All</a>
                      </div>
                  </div>
                  <?php
                  $products = getProductsByCategory($category['CATEGORY'], "Home");
                  foreach ($products as $product):
                  ?>
                      <div class="col-lg-3 col-md-6">
                          <div class="item">
                              <div class="thumb">
                              <?php
                               echo '<a href="./Frontend/Pages/product.php?productID=' . htmlspecialchars($product['ID']) . '"><img src="./Frontend/AdminAssets/Images/ProductImages/' . htmlspecialchars($product['IMAGE']) . '" alt="' . htmlspecialchars($product['PRODUCT']) . '" class="img-fluid" style="width: 300px; height: 300px; object-fit: contain;"></a>';
                              ?>
                                  <span class="price">$<?= htmlspecialchars($product['PRICE']) ?></span>
                              </div>
                              <div class="down-content">
                                  <span class="category"><?= htmlspecialchars($product['CATEGORY']) ?></span>
                                  <h4><?= htmlspecialchars($product['PRODUCT']) ?></h4>
                                  <a href="./Frontend/Pages/product.php?productID=<?= htmlspecialchars($product['ID']) ?>"><i class="fa fa-shopping-bag" style="margin-top: 10px;"></i></a>
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
    <div class="page-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h3><?= htmlspecialchars($product['PRODUCT']) ?></h3>
            <span class="breadcrumb"><a href="../../index.php">Home</a>  >  <a href="./shop.php">Shop</a>  > <?= htmlspecialchars($product['CATEGORY']) ?></span>
          </div>
        </div>
      </div>
    </div>
  
    <div class="single-product section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="left-image">
              <img src="../AdminAssets/Images/ProductImages/<?= htmlspecialchars($product['IMAGE']) ?>" alt="<?= htmlspecialchars($product['PRODUCT']) ?>" class="img-fluid">
            </div>
          </div>
          <div class="col-lg-6 align-self-center">
            <h4><?= htmlspecialchars($product['PRODUCT']) ?></h4>
            <span class="price">$<?= htmlspecialchars($product['PRICE']) ?></span>
            <p><?= htmlspecialchars($product['DESCRIPTION']) ?></p>
            <form id="qty" action="./Frontend/Pages/product.php?productID=<?= htmlspecialchars($product['ID']) ?>">
              <input type="number" class="form-control" id="quantity" aria-describedby="quantity" placeholder="1">
              <button type="submit"><i class="fa fa-shopping-bag"></i> ADD TO CART</button>
            </form>
            <ul>
              <li><span>Category:</span> <a href="#"><?= htmlspecialchars($product['CATEGORY']) ?></a></li>
            </ul>
          </div>
          <div class="col-lg-12">
            <div class="sep"></div>
          </div>
        </div>
      </div>
    </div>
    <?php
  }

function displayContactForm(){
  ?>
      <div class="container push-down-container" >
        <h2>Contact Us</h2>
        <form action="../../Backend/Controllers/userController.php" method="post">
            <input type="hidden" name="action" value="CONTACT">
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
  <?php
}

function displayShopPage($categories){
    $currentCategory = isset($_GET['category']) ? $_GET['category'] : '*';
    ?>
    <div class="section trending">
        <div class="container">
            <ul class="trending-filter">
                <li>
                    <form action="./shop.php" method="get">
                        <input type="hidden" name="category" value="*">
                        <button type="submit" class="<?= $currentCategory == '*' ? 'is_active' : '' ?>">Show All</button>
                    </form>
                </li>
                <?php foreach ($categories as $category): ?>
                <li>
                    <form action="./shop.php" method="get">
                        <input type="hidden" name="category" value="<?= htmlspecialchars($category['CATEGORY']) ?>">
                        <button type="submit" class="<?= $currentCategory == htmlspecialchars($category['CATEGORY']) ? 'is_active' : '' ?>"><?= htmlspecialchars($category['CATEGORY']) ?></button>
                    </form>
                </li>
                <?php endforeach; ?>
            </ul>
            <div class="row trending-box">
                <?php
                if (isset($_GET['category']) && $_GET['category'] != '*') {
                    $products = getProductsByCategory($_GET['category'], "Shop");
                } else {
                    $products = getProducts();
                }
                foreach ($products as $product):
                ?>
                <div class="col-lg-3 col-md-6 align-self-center mb-30 trending-items">
                    <div class="item">
                        <div class="thumb">
                            <a href="./product.php?productID=<?= htmlspecialchars($product['ID']) ?>"><img src="../AdminAssets/Images/ProductImages/<?= htmlspecialchars($product['IMAGE']) ?>" alt="<?= htmlspecialchars($product['PRODUCT']) ?>" style="width: 300px; height: 300px; object-fit: contain;"></a>
                            <span class="price">$<?= htmlspecialchars($product['PRICE']) ?></span>
                        </div>
                        <div class="down-content">
                            <span class="category"><?= htmlspecialchars($product['CATEGORY']) ?></span>
                            <h4><?= htmlspecialchars($product['PRODUCT']) ?></h4>
                            <a href="./Frontend/Pages/product.php?productID=<?= htmlspecialchars($product['ID']) ?>"><i class="fa fa-shopping-bag"></i></a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php
}
?>
  