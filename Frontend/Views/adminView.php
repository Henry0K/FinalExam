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
                      <form class="form-container" id="login-form" action="../../Backend/Controllers/adminController.php" method="post">
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

    function displayAddProductForm(){
        ?>
        <form action="../../../Backend/Controllers/adminController.php"  class="row g-3 mt-5 mx-5" method="post" enctype="multipart/form-data">
            <div class="row mb-3">
              <div class="col-sm-10">
                <input type="hidden" name="action" value="ADDPRODUCT">
              </div>
            </div>
            <div class="row mb-3">
              <label for="title" class="col-sm-2 col-form-label">Name</label>
              <div class="col-sm-10">
                <input type="text" name="name" placeholder="Enter Product Name" class="form-control">
              </div>
            </div>
            <div class="row mb-3">
              <label for="author" class="col-sm-2 col-form-label">Price</label>
              <div class="col-sm-10">
              <input type="number" name ="price" placeholder="Enter Product Price" class="form-control">
              </div>
            </div>
            <div class="row mb-3">
              <label for="category" class="col-sm-2 col-form-label">Category</label>
              <div class="col-sm-10">
              <input type="text" name ="category" placeholder="Category" class="form-control">
              </div>
            </div>
            <div class="row mb-3">
              <label for="description" class="col-sm-2 col-form-label">Description</label>
              <div class="col-sm-10">
              <input type="text" name ="description" placeholder="Description" class="form-control">
              </div>
            </div>
            <div class="row mb-3">
              <label for="File" class="col-sm-2 col-form-label">Product Image</label>
              <div class="col-sm-10">
                <input class="form-control"type="file" name="image" accept="image/*" required>
              </div>
            </div>

            <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Add Product</label>
                  <div class="col-sm-10">
                    <button type="submit" name="addProduct" value="Add Product" class="btn btn-primary">Add</button>
                  </div>
              </div>
        </form>
    <?php
    }


    function displayAddUserForm(){
      ?>
      <form action="../../../Backend/Controllers/adminController.php" class="row g-3 mt-5 mx-5" method="post" enctype="multipart/form-data">
          <div class="row mb-3">
              <div class="col-sm-10">
                  <input type="hidden" name="action" value="ADDUSER">
              </div>
          </div>
          <div class="row mb-3">
              <label for="username" class="col-sm-2 col-form-label">Username</label>
              <div class="col-sm-10">
                  <input type="text" name="username" placeholder="Enter Username" class="form-control" required>
              </div>
          </div>
          <div class="row mb-3">
              <label for="firstName" class="col-sm-2 col-form-label">First Name</label>
              <div class="col-sm-10">
                  <input type="text" name="firstname" placeholder="Enter First Name" class="form-control" required>
              </div>
          </div>
          <div class="row mb-3">
              <label for="lastName" class="col-sm-2 col-form-label">Last Name</label>
              <div class="col-sm-10">
                  <input type="text" name="lastname" placeholder="Enter Last Name" class="form-control" required>
              </div>
          </div>
          <div class="row mb-3">
              <label for="email" class="col-sm-2 col-form-label">Email</label>
              <div class="col-sm-10">
                  <input type="email" name="email" placeholder="Enter Email" class="form-control" required>
              </div>
          </div>
          <div class="row mb-3">
              <label for="profilePicture" class="col-sm-2 col-form-label">Profile Picture</label>
              <div class="col-sm-10">
                  <input type="file" name="profilePicture" class="form-control" accept="image/*">
              </div>
          </div>
          <div class="row mb-3">
              <label for="password" class="col-sm-2 col-form-label">Password</label>
              <div class="col-sm-10">
                  <input type="password" name="password" placeholder="Enter Password" class="form-control" required>
              </div>
          </div>
          <div class="row mb-3">
              <label for="gender" class="col-sm-2 col-form-label">Gender</label>
              <div class="col-sm-10">
                  <select name="gender" class="form-control">
                      <option value="M">Male</option>
                      <option value="F">Female</option>
                  </select>
              </div>
          </div>
          <div class="row mb-3">
              <label for="age" class="col-sm-2 col-form-label">Age</label>
              <div class="col-sm-10">
                  <input type="number" name="age" placeholder="Enter Age" class="form-control" required>
              </div>
          </div>
          <div class="row mb-3">
              <div class="col-sm-10">
                  <button type="submit" name="addUser" value="Add User" class="btn btn-primary">Add User</button>
              </div>
          </div>
      </form>
      <?php
  }



    function displayProducts($products){
      ?>
      <div class="card">
          <div class="card-body">
              <h5 class="card-title">Product List</h5>
              <table class="table">
                  <thead>
                      <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Price</th>
                          <th scope="col">Category</th>
                          <th scope="col">Image</th>
                          <th scope="col">Activate Status</th>
                          <th scope="col">Action</th>
                          <th scope="col">Edit</th>
                          <th scope="col">Delete</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach($products as $product): ?>
                      <tr>
                          <th scope="row"><?php echo $product['ID']; ?></th>
                          <td><?php echo $product['PRODUCT']; ?></td>
                          <td><?php echo $product['PRICE']; ?></td>
                          <td><?php echo $product['CATEGORY']; ?></td>
                          <td><img src="<?php echo '../../AdminAssets/Images/ProductImages/'.$product['IMAGE']; ?>" alt="Image" width="100" height="100"></td>
                          <td><?php echo $product['IS_ACTIVE']; ?></td>
                          <td>
                              <form method="post" action="../../../Backend/Controllers/adminController.php">
                                  <input type="hidden" name="action" value="CHANGEACTIVATIONSTATUS">
                                  <input type="hidden" name="id" value="<?php echo $product['ID']; ?>">
                                  <?php if ($product['IS_ACTIVE']): ?>
                                      <button type="submit" class="btn btn-danger">Deactivate</button>
                                  <?php else: ?>
                                      <button type="submit" class="btn btn-success">Activate</button>
                                  <?php endif; ?>
                              </form>
                          </td>
                          <td>
                              <button type="button" class="btn btn-primary" onclick="showEditForm(<?php echo htmlspecialchars(json_encode($product)); ?>)">Edit</button>
                          </td>
                          <td>
                              <form method="post" action="../../../Backend/Controllers/adminController.php">
                                  <input type="hidden" name="action" value="DELETEPRODUCT">
                                  <input type="hidden" name="id" value="<?php echo $product['ID']; ?>">
                                  <button type="submit" class="btn btn-danger">Delete</button>
                              </form>
                          </td>
                      </tr>
                      <?php endforeach; ?>
                  </tbody>
              </table>
          </div>
      </div>
      <?php
    }

  function showEditProduct(){
    ?>
    <div id="editProductForm" class="modal" tabindex="-1" style="display:none;">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header bg-primary text-white">
            <h5 class="modal-title">Edit Product</h5>
            <button type="button" class="btn-close" onclick="document.getElementById('editProductForm').style.display='none';"></button>
          </div>
          <form method="post" action="../../../Backend/Controllers/adminController.php" class="form-group" enctype="multipart/form-data">
            <div class="modal-body">
              <input type="hidden" name="action" value="UPDATEPRODUCT">
              <input type="hidden" name="id" id="editProductId">
              <div class="mb-3">
                <label for="editProductName" class="form-label">Name</label>
                <input type="text" name="name" id="editProductName" class="form-control">
              </div>
              <div class="mb-3">
                <label for="editProductPrice" class="form-label">Price</label>
                <input type="number" name="price" id="editProductPrice" class="form-control">
              </div>
              <div class="mb-3">
                <label for="editProductCategory" class="form-label">Category</label>
                <input type="text" name="category" id="editProductCategory" class="form-control">
              </div>
              <div class="mb-3">
                <label for="editProductDescription" class="form-label">Description</label>
                <input type="text" name="description" id="editProductDescription" class="form-control">
              </div>
            </div>
            <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Update Product</button>
          <button type="button" class="btn btn-secondary" onclick="document.getElementById('editProductForm').style.display='none';">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php
}






function displayUsers($users){
  ?>
  <div class="card">
      <div class="card-body">
          <h5 class="card-title">User List</h5>
          <table class="table">
              <thead>
                  <tr>
                      <th scope="col">#</th>
                      <th scope="col">Username</th>
                      <th scope="col">First Name</th>
                      <th scope="col">Last Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Profile Picture</th>
                      <th scope="col">Active Status</th>
                      <th scope="col">Gender</th>
                      <th scope="col">Age</th>
                      <th scope="col">Edit</th>
                      <th scope="col">Delete</th>
                  </tr>
              </thead>
              <tbody>
                  <?php foreach($users as $user): ?>
                  <tr>
                      <th scope="row"><?php echo $user['ID']; ?></th>
                      <td><?php echo $user['Username']; ?></td>
                      <td><?php echo $user['FirstName']; ?></td>
                      <td><?php echo $user['LastName']; ?></td>
                      <td><?php echo $user['Email']; ?></td>
                      <td><img src="<?php echo '../../AdminAssets/Images/ProfilePictures/'.$user['ProfilePicture']; ?>" alt="Profile Picture" width="100" height="100"></td>
                      <td><?php echo $user['ActiveStatus']; ?></td>
                      <td><?php echo $user['Gender']; ?></td>
                      <td><?php echo $user['Age']; ?></td>
                      <td>
                          <button type="button" class="btn btn-primary" onclick="showEditFormUser(<?php echo htmlspecialchars(json_encode($user)); ?>)">Edit</button>
                      </td>
                      <td>
                          <form method="post" action="../../../Backend/Controllers/adminController.php">
                              <input type="hidden" name="action" value="DELETEUSER">
                              <input type="hidden" name="ID" value="<?php echo $user['ID']; ?>">
                              <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                      </td>
                  </tr>
                  <?php endforeach; ?>
              </tbody>
          </table>
      </div>
  </div>
  <?php
}

function showEditUser(){
  ?>
  <div id="editUserForm" class="modal" tabindex="-1" style="display:none;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">Edit User</h5>
          <button type="button" class="btn-close" onclick="document.getElementById('editUserForm').style.display='none';"></button>
        </div>
        <form method="post" action="../../../Backend/Controllers/adminController.php" class="form-group" enctype="multipart/form-data">
          <div class="modal-body">
            <input type="hidden" name="action" value="UPDATEUSER">
            <input type="hidden" name="ID" id="editUserId">
            <div class="mb-3">
              <label for="editUsername" class="form-label">Username</label>
              <input type="text" name="username" id="editUsername" class="form-control">
            </div>
            <div class="mb-3">
              <label for="editFirstName" class="form-label">First Name</label>
              <input type="text" name="firstname" id="editFirstName" class="form-control">
            </div>
            <div class="mb-3">
              <label for="editLastName" class="form-label">Last Name</label>
              <input type="text" name="lastname" id="editLastName" class="form-control">
            </div>
            <div class="mb-3">
              <label for="editEmail" class="form-label">Email</label>
              <input type="email" name="email" id="editEmail" class="form-control">
            </div>
            <div class="mb-3">
              <label for="editProfilePicture" class="form-label">Profile Picture</label>
              <input type="file" name="profilePicture" id="editProfilePicture" class="form-control">
            </div>
            <div class="mb-3">
              <label for="editGender" class="form-label">Gender</label>
              <select name="gender" id="editGender" class="form-control">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="editAge" class="form-label">Age</label>
              <input type="number" name="age" id="editAge" class="form-control">
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Update User</button>
            <button type="button" class="btn btn-secondary" onclick="document.getElementById('editUserForm').style.display='none';">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <?php
}
?>
<script>
    function showEditFormUser(user) {
      document.getElementById('editUserId').value = user.ID;
      document.getElementById('editUsername').value = user.Username;
      document.getElementById('editFirstName').value = user.FirstName;
      document.getElementById('editLastName').value = user.LastName;
      document.getElementById('editEmail').value = user.Email;
      var genderSelect = document.getElementById('editGender');
      var options = genderSelect.options;
      for (var i = 0; i < options.length; i++) {
        if (options[i].value === user.Gender) {
          genderSelect.selectedIndex = i;
          break;
        }
      }
      document.getElementById('editAge').value = user.Age;
      var imageElement = document.getElementById('currentProfilePicture');
      if (imageElement) {
        imageElement.src = '../AdminAssets/Images/ProfilePictures/' + user.ProfilePicture;
        imageElement.alt = 'Current Profile Picture';
      }
      document.getElementById('editUserForm').style.display = 'block';
    }

      function showEditForm(product) {
        document.getElementById('editProductId').value = product.ID;
        document.getElementById('editProductName').value = product.PRODUCT;
        document.getElementById('editProductPrice').value = product.PRICE;
        document.getElementById('editProductCategory').value = product.CATEGORY;
        document.getElementById('editProductDescription').value = product.DESCRIPTION;
        document.getElementById('editProductForm').style.display = 'block';
      }
  </script>


  <?php

?>