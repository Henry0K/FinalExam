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
?>
  