<?php

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
          <form method="post" action="../../Backend/Controllers/adminController.php" class="form-group" enctype="multipart/form-data">
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
              <div class="mb-3">
                <label for="editProductImage" class="form-label">Image</label>
                <input type="file" name="image" id="editProductImage" class="form-control">
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
?>

  ?>
  <script>
      function showEditForm(product) {
        document.getElementById('editProductId').value = product.ID;
        document.getElementById('editProductName').value = product.PRODUCT;
        document.getElementById('editProductPrice').value = product.PRICE;
        document.getElementById('editProductCategory').value = product.CATEGORY;
        document.getElementById('editProductDescription').value = product.DESCRIPTION;
        var imageElement = document.getElementById('currentProductImage');
        if (imageElement) {
          imageElement.src = '../AdminAssets/Images/ProductImages/' + product.IMAGE;
          imageElement.alt = 'Current Product Image';
        }
        document.getElementById('editProductForm').style.display = 'block';
      }
  </script>
  <?php

function displayUsers(){
  require_once("../../../Backend/Models/adminModel.php");
  $users = getUsers();

  echo '<style>
          table {
              width: 100%;
              border-collapse: collapse;
              margin: 20px 0;
              font-size: 0.9em;
              font-family: sans-serif;
              min-width: 400px;
              box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
          }
          th, td {
              padding: 12px 15px;
              text-align: left;
              border-bottom: 1px solid #dddddd;
          }
          th {
              background-color: #00008B;
              color: #ffffff;
              text-align: center;
          }
          tr:nth-of-type(even) {
              background-color: white;
          }
          tr:last-of-type {
              border-bottom: 2px solid blue;
          }
          button {
              padding: 8px;
              color: white;
              background-color: #00008B;
              border: none;
              border-radius: 5px;
              cursor: pointer;
          }
          button:hover {
              background-color: #00008B;
          }
        </style>';

  echo '<table>
          <tr>
              <th>ID</th>
              <th>Username</th>
              <th>Firstname</th>
              <th>Lastname</th>
              <th>Delete</th>
              <th>Edit</th>
          </tr>';

  foreach ($users as $user) {
      ?><tr>
              <td><?php echo $user['ID']; ?></td>
              <td><?php echo $user['Username']; ?></td>
              <td><?php echo $user['FirstName']; ?></td>
              <td><?php echo $user['LastName']; ?></td>
              <td>
                  <button onclick='deleteUser(<?php echo $user["ID"] ?>)'>Delete</button>
              </td>
              <td>
                  <button onclick='showEditUserForm(<?php echo htmlspecialchars(json_encode($user)); ?>)'>Edit</button>
              </td>
            </tr><?php
  }

  echo '</table>';

  // Hidden form for deleting users
  echo '<form id="deleteUserForm" method="post" action="../../Backend/Controllers/adminController.php" style="display:none;">
          <input type="hidden" name="action" value="DELETE_USER">
          <input type="hidden" name="userId" id="userIdToDelete">
        </form>';
 
  // JavaScript to handle the delete action
  echo '<script>
          function deleteUser(userId) {
              document.getElementById("userIdToDelete").value = userId;
              document.getElementById("deleteUserForm").submit();
          }
        </script>';
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
        <form method="post" action="../../Backend/Controllers/adminController.php" class="form-group">
          <div class="modal-body">
            <input type="hidden" name="action" value="EDIT_USER">
            <input type="hidden" name="id" id="editUserId">
            <div class="mb-3">
              <label for="editUsername" class="form-label">Username</label>
              <input type="text" name="username" id="editUsername" class="form-control">
            </div>
            <div class="mb-3">
              <label for="editFirstName" class="form-label">First Name</label>
              <input type="text" name="firstName" id="editFirstName" class="form-control">
            </div>
            <div class="mb-3">
              <label for="editLastName" class="form-label">Last Name</label>
              <input type="text" name="lastName" id="editLastName" class="form-control">
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
  function showEditUserForm(user) {
      console.log('Editing User:', user);
      document.getElementById('editUserId').value = user.ID;
      document.getElementById('editUsername').value = user.Username;
      document.getElementById('editFirstName').value = user.FirstName;
      document.getElementById('editLastName').value = user.LastName;
      document.getElementById('editUserForm').style.display = 'block';
  }
</script>


?>

