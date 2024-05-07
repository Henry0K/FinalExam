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
            $product->image = $_POST["image"];
            $product->category = $_POST["category"];
            $product->is_active = $_POST["is_active"];

            $target_dir = "../../Frontend/Assets/Images/ProductImages/";
            //             ../../Frontend/Assets/Images/BlogImages/  Title  .jpg or .png or .jpeg
            $target_file = $target_dir . $product->id . '.' . pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $product->image = basename($target_file);
            } else {
                    header("Location: ../../Frontend/AdminPages/add-product.php?errorCode=5&errorDesc=File upload failed!");
                    exit();
            }
            if (addProduct($db, $product)) {
                header("Location: ../../Frontend/AdminPages/add-product.php?errorCode=5&errorDesc=Product Added Sucessfully!");
            } else {
                header("Location: ../../Frontend/AdminPages/add-product.php?errorCode=5&errorDesc=Product Adding Failed!");
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
                        header("Location: ../../Frontend/AdminPages/view-products.php?successCode=1&successDesc=Product deleted successfully!");
                    } else {
                        header("Location: ../../Frontend/AdminPages/view-products.php?errorCode=6&errorDesc=Product deletion failed!");
                    }
                } else {
                   header("Location: ../../Frontend/AdminPages/view-products.php?errorCode=7&errorDesc=No product ID provided!");
                }
                break;

        default:
            break;
    }
}

?>

