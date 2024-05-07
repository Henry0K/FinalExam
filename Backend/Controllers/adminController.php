<?php
session_start();
require_once("../Common/Dbconfig.php");
require_once("../Models/adminModel.php");

if (isset($_POST["action"])) {
    switch($_POST["action"]){
        case "ADDPRODUCT":
            $product = new stdClass();
            $product->name = $_POST["name"];
            $product->description = $_POST["description"];
            $product->price = $_POST["price"];
            $product->category = $_POST["category"];

            //By default a product is active until someone from the admin side deactivates the product
            $product->is_active = 1;

            $target_dir = "../../Frontend/AdminAssets/Images/ProductImages/";
            //             ../../Frontend/Assets/Images/BlogImages/  Title  .jpg or .png or .jpeg
            $target_file = $target_dir . $product->name . '.' . pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $product->image = basename($target_file);
            } else {
                    header("Location: ../../Frontend/Pages/AdminPages/add-products.php?errorCode=5&errorDesc=File upload failed!");
                    exit();
            }
            if (addProduct($db, $product)) {
                header("Location: ../../Frontend/Pages/AdminPages/add-products.php?errorCode=5&errorDesc=Product Added Sucessfully!");
            } else {
                header("Location: ../../Frontend/Pages/AdminPages/add-products.php?errorCode=5&errorDesc=Product Adding Failed!");
            }
            break;

           
        case "DELETE_USER":
            echo "delete user";
            echo $_POST['userId'];
            if (isset($_POST['userId'])) {
                $userId = $_POST['userId'];
                require_once("../Models/adminModel.php");
                $result = deleteUser($db, $userId);
                if ($result == 1) {
                    header("Location: ../../Frontend/AdminPages/view-users.php?successCode=1&successDesc=User deleted successfully!");
                } else {
                    header("Location: ../../Frontend/AdminPages/view-users.php?errorCode=6&errorDesc=User deletion failed!");
                }
            } else {
                header("Location: ../../Frontend/AdminPages/view-users.php?errorCode=7&errorDesc=No user ID provided!");
            }
            break;
        
        case "EDIT_USER";
            $user = new StdClass();
            $user->id = $_POST['id'];
            $user->username = $_POST['username'];
            $user->firstName = $_POST['firstName'];
            $user->lastName = $_POST['lastName'];
        
            $result = updateUserData($user, $db);
        
            if ($result) {
                header('Location: ../../Frontend/AdminPages/view-users.php?status=success');
            } else {
                header('Location: ../../Frontend/AdminPages/view-users.php?status=error');
            }
                break;

            case "UPDATEPRODUCT":
                if (isset($_POST['id'])) {
                    $product = new stdClass();
                    $product->id = $_POST['id'];
                    $product->title = $_POST['title'];
                    $product->content = $_POST['content'];
                    $product->price = $_POST['price'];
                    $product->category = $_POST['category'];
                   
                    $result = updateProduct($product, $db);
            
                    if ($result) {
                        header("Location: ../../Frontend/AdminPages/view-products.php?successCode=1&successDesc=Product updated successfully!");
                    } else {
                        header("Location: ../../Frontend/AdminPages/view-products.php?errorCode=6&errorDesc=Product update failed!");
                }
                } else {
                    header("Location: ../../Frontend/AdminPages/view-products.php?errorCode=7&errorDesc=No product ID provided!");
                }
                break;

                
            case "DELETEPRODUCT":
                if(isset($_POST['id'])){
                    $id = $_POST['id'];  
                    $productDetails = getProductDetails($id, $db);
                    $imagePath = "../../Frontend/Assets/Images/ProductImages/" . $productDetails['Image'];
                    
                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                    } else {
                        echo "File does not exist at: " . $imagePath;
                    }
            
                    $result = deleteProduct($id, $db);
                    if ($result == 1) {
                        header("Location: ../../Frontend/Pages/AdminPages/view-products.php?successCode=1&successDesc=Product deleted successfully!");
                    } else {
                        header("Location: ../../Frontend/Pages/AdminPages/view-products.php?errorCode=6&errorDesc=Product deletion failed!");
                    }
                } else {
                   header("Location: ../../Frontend/Pages/AdminPages/view-products.php?errorCode=7&errorDesc=No product ID provided!");
                }
                break;
            case "CHANGEACTIVATIONSTATUS":
                if(isset($_POST['id'])){
                    $id = $_POST['id'];
                    $productDetails = getProductDetails($id, $db);
                    $is_active = $productDetails['IS_ACTIVE'];
                    $is_active = ($is_active == 1) ? 0 : 1;
                    $result = changeActivationStatus($id, $is_active, $db);
                    if ($result == 1) {
                        header("Location: ../../Frontend/Pages/AdminPages/view-products.php?successCode=1&successDesc=Product status changed successfully!");
                    } else {
                        header("Location: ../../Frontend/Pages/AdminPages/view-products.php?errorCode=6&errorDesc=Product status change failed!");
                    }
                }
            break;

        case "ADDUSER":
            $user = new stdClass();
            $user->username = $_POST["username"];
            $user->firstname = $_POST["firstname"];
            $user->lastname = $_POST["lastname"];
            $user->email = $_POST["email"];
            $user->password = $_POST["password"];
            $user->gender = $_POST["gender"];
            $user->age = $_POST["age"];
            $user->profilePicture = $_POST["profilePicture"];
            $user->activeStatus = 1;

            if (addUser($db, $user)) {
                header("Location: ../../Frontend/AdminPages/view-users.php?successCode=1&successDesc=User added successfully!");
            } else {
                header("Location: ../../Frontend/AdminPages/view-users.php?errorCode=6&errorDesc=User addition failed!");
            }

            break;
        
            
        default:
            break;
    }
}

?>

