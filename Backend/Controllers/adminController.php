<?php
session_start();
require_once("../Common/Dbconfig.php");
require_once("../Models/adminModel.php");

/**
 * Check if the required arguments for the login form are missing
 * @return bool
 */
function isMissingArgsLogin(){
    if (!isset($_POST["username"]) || $_POST["username"] == "")
        return true;
    if (!isset($_POST["password"]) || $_POST["password"] == "")
        return true;
    return false;
}

if (isset($_POST["action"])) {
    switch($_POST["action"]){
        case "LOGIN":
            if (isMissingArgsLogin()) {
                header("Location: ../../Frontend/Pages/login.php?errorCode=1&errorDesc=Missing arguments");
                exit();
            } else {
                $username = $_POST["username"];
                $password = $_POST["password"];
                $array = Login($username, $password, $db);
                if ($array != -1) {
                    $_SESSION["username"] = $username;
                    $_SESSION["ID"] = $array["ID"];
                    $_SESSION["ProfilePicture"] = $array["ProfilePicture"];
                    $_SESSION["firstname"] = $array["FirstName"];
                    $_SESSION["lastname"] = $array["LastName"];
                    header("Location: ../../Frontend/Pages/AdminPages/admin.php");
                } else {
                    header("Location: ../../Frontend/Pages/login.php?errorCode=2&errorDesc=Invalid username or password");
                
                }
            }
        break; 
        case "ADDPRODUCT":
            $product = new stdClass();
            $product->name = $_POST["name"];
            $product->description = $_POST["description"];
            $product->price = $_POST["price"];
            $product->category = $_POST["category"];

            //By default a product is active until someone from the admin side deactivates the product
            $product->is_active = 1;

            $target_dir = "../../Frontend/AdminAssets/Images/ProductImages/";
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
                header('Location: ../../Frontend/Pages/AdminPages/view-users.php?status=success');
            } else {
                header('Location: ../../Frontend/Pages/AdminPages/view-users.php?status=error');
            }
                break;

            case "UPDATEPRODUCT":
                if (isset($_POST['id'])) {
                    $product = new stdClass();
                    $product->id = $_POST['id'];
                    $product->product = $_POST['name'];
                    $product->description = $_POST['description'];
                    $product->price = $_POST['price'];
                    $product->category = $_POST['category'];
                   
                    $result = updateProduct($product, $db);
            
                    if ($result) {
                        header("Location: ../../Frontend/Pages/AdminPages/view-products.php?successCode=1&successDesc=Product updated successfully!");
                    } else {
                        header("Location: ../../Frontend/Pages/AdminPages/view-products.php?errorCode=6&errorDesc=Product update failed!");
                }
                } else {
                    header("Location: ../../Frontend/Pages/AdminPages/view-products.php?errorCode=7&errorDesc=No product ID provided!");
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
            $user->activeStatus = 1;

            print_r($user);

            $target_dir = "../../Frontend/AdminAssets/Images/ProfilePictures/";
            $target_file = $target_dir . $user->username . '.' . pathinfo($_FILES["profilePicture"]["name"], PATHINFO_EXTENSION);
            if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $target_file)) {
                    $user->profilePicture = basename($target_file);
            } else {
                    header("Location: ../../Frontend/Pages/AdminPages/add-users.php?errorCode=5&errorDesc=File upload failed!");
                    exit();
            }

            if (addUser($db, $user)) {
                header("Location: ../../Frontend/Pages/AdminPages/add-users.php?successCode=1&successDesc=User added successfully!");
            } else {
                header("Location: ../../Frontend/Pages/AdminPages/add-users.php?errorCode=6&errorDesc=User addition failed!");
            }
            break;

        case "UPDATEUSER":
            if (isset($_POST['ID'])) {
                $user = new stdClass();
                $user->id = $_POST['ID'];
                $user->username = $_POST['username'];
                $user->firstname = $_POST['firstname'];
                $user->lastname = $_POST['lastname'];
                $user->email = $_POST['email'];
                $user->gender = ($_POST['gender'] == 'Male') ? 'M' : 'F';
                $user->age = $_POST['age'];

                if(updateUser($user, $db)){
                    header("Location: ../../Frontend/Pages/AdminPages/view-users.php?successCode=1&successDesc=User updated successfully!");
                } else {
                    header("Location: ../../Frontend/Pages/AdminPages/view-users.php?errorCode=6&errorDesc=User update failed!");
                }
            }
            break;
        case "DELETEUSER":
            if (isset($_POST['ID'])) {
                $id = $_POST['ID'];
                $userDetails = getUserDetails($id, $db);
                $imagePath = "../../Frontend/Assets/Images/ProfilePictures/" . $userDetails['ProfilePicture'];
                    
                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                    } else {
                        echo "File does not exist at: " . $imagePath;
                    }
                if(deleteUser($id, $db)){
                    header("Location: ../../Frontend/Pages/AdminPages/view-users.php?successCode=1&successDesc=User deleted successfully!");
                } else {
                    header("Location: ../../Frontend/Pages/AdminPages/view-users.php?errorCode=6&errorDesc=User deletion failed!");
                }
            }
            break;
        default:
            header("Location: ../../Frontend/Pages/AdminPages/admin.php?errorCode=3&errorDesc=Invalid action!");
            break;
    }
}

?>

