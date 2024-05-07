<?php
session_start();
require_once("../Common/Dbconfig.php");
require_once("../Models/userModel.php");

function isMissingArgsLogin(){
    if (!isset($_POST["username"]))
        return 1;
    if (!isset($_POST["password"]))
        return 1;
}

/**
 * Check if the required arguments for the sign up form are missing
 * @param bool $isNotEmpty
 * @return int
 */
function isMissingArgsSignUp($isNotEmpty = false){
    if (!isset($_POST["username"]) || ($_POST["username"] == "" && $isNotEmpty))
        return 1;
    if (!isset($_POST["password"]) || ($_POST["password"] == "" && $isNotEmpty))
        return 1;
    if (!isset($_POST["firstname"]) || ($_POST["firstname"] == "" && $isNotEmpty))
        return 1;
    if (!isset($_POST["lastname"]) || ($_POST["lastname"] == "" && $isNotEmpty))
        return 1;
}

if (isset($_POST["action"])) {
    switch($_POST["action"]){
        case "SIGNUP":
            if (isMissingArgsSignUp(true)) {
                header("Location: ../../index.php?errorCode=1&errorDesc=Missing arguments");
                exit();
            } else {
                $user = new stdClass();
                $user->username = $_POST["username"];
                $user->firstname = $_POST["firstname"];
                $user->lastname = $_POST["lastname"];
                $user->email = $_POST["email"];
                $user->password = $_POST["password"];
                $user->gender = ($_POST["gender"] == "Male") ? 'M' : 'F';
                $user->age = $_POST["age"];
                $user->role = $_POST["role"];

                $target_dir = "../../Frontend/AdminAssets/Images/ProfilePictures/";
                $target_file = $target_dir . $user->username . '.' . pathinfo($_FILES["profilePicture"]["name"], PATHINFO_EXTENSION);

                if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $target_file)) {
                    $user->profilePicture = basename($target_file);
                } else {
                    header("Location: ../../index.php?errorCode=5&errorDesc=File upload failed!");
                    exit();
                }

                if (SignUp($user, $db)) {
                    $_SESSION["username"] = $user->username;
                    header("Location: ../../index.php?errorCode=0&errorDesc=Successful Sign Up!");
                } else {
                    header("Location: ../../index.php?errorCode=4&errorDesc=Failed to sign up!");
                }
            }
            break;
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
                    $_SESSION["Role"] = $array["Role"];
                    $_SESSION["ProfilePicture"] = $array["ProfilePicture"];
                    $_SESSION["firstname"] = $array["FirstName"];
                    $_SESSION["lastname"] = $array["LastName"];
                    if ($_SESSION["Role"] == "Admin")
                        header("Location: ../../Frontend/Pages/AdminPages/admin.php");
                } else {
                    header("Location: ../../Frontend/Pages/login.php?errorCode=2&errorDesc=Invalid username or password!");
                }
            }
            break;            
        default:
            header("Location: ../../index.php?errorCode=3&errorDesc=Invalid action!");
            break;
    }
}
?>
