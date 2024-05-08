<?php

/**
 * @param $username
 * @param $password
 * @param $db
 * @return array|int
 */

 function Login($username, $password, $db){
    $query = "SELECT ID, ProfilePicture, FirstName, LastName FROM Users WHERE Username = '$username' AND Password = PASSWORD('$password')";
    $stmt = $db->query($query);
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $array = array("ID" => $row["ID"], "ProfilePicture" => $row["ProfilePicture"], "FirstName" => $row["FirstName"], "LastName" => $row["LastName"]);
        return $array;
    } else {
        return -1;
    }
}
/**
 * Adds a new product to the database.
 * 
 * @param PDO $db Database connection object
 * @param stdClass $product Product details
 * @return int Returns 1 if the product was successfully added, otherwise 0
 */
function addProduct($db, $product) {
    $query = "INSERT INTO Products (PRODUCT, DESCRIPTION, PRICE, IMAGE, CATEGORY, IS_ACTIVE) VALUES (?, ?, ?, ?, ?, ?)";
    
    // Prepare the statement
    $stmt = $db->prepare($query);

    // Bind parameters to the placeholders
    $stmt->bindParam(1, $product->name);
    $stmt->bindParam(2, $product->description);
    $stmt->bindParam(3, $product->price);
    $stmt->bindParam(4, $product->image);
    $stmt->bindParam(5, $product->category);
    $stmt->bindParam(6, $product->is_active);


    // Execute the statement
    $stmt->execute();

    // Check if the insertion was successful
    return $stmt->rowCount() > 0 ? 1 : 0;
}

/**
 * Retrieves product details based on the product ID.
 * 
 * @param int $id Product ID
 * @param PDO $db Database connection object
 * @return array Associative array containing product details
 */
function getProductDetails($id, $db) {
    $query = "SELECT * FROM Products WHERE ID = '$id'";
    $result = $db->query($query);
    return $result->fetch(PDO::FETCH_ASSOC);
}

/**
 * Fetches all products from the database.
 * 
 * @return array Array of associative arrays containing product details
 */
function getProducts() {
        $db = require_once("../../../Backend/Common/Dbconfig.php");
        $query = "SELECT * FROM Products";
        $result = $db->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Fetches all users from the database.
 * 
 * @return array Array of associative arrays containing user details
 */
function getUsers() {
        $db = require_once("../../../Backend/Common/Dbconfig.php");
        $query = "SELECT * FROM Users";
        $result = $db->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Deletes a user from the database.
 * 
 * @param int $id User ID
 * @param PDO $db Database connection object
 * @return int Returns 1 if the user was successfully deleted, otherwise 0
 */
function deleteUser($id, $db) {
        $query = "DELETE FROM Users WHERE ID = '$id'";
        $result = $db->query($query);
        if ($result) {
            return 1;
        } else {
            return 0;
        }
}

/**
* Updates a user's data in the database.
* 
* @param stdClass $user User details
* @param PDO $db Database connection object
* @return bool Returns true if the user was successfully updated, otherwise false
*/
function updateUserData($user, $db) {
        $query = "UPDATE Users SET Username = '$user->username', FirstName = '$user->firstName', LastName = '$user->lastName' WHERE ID = '$user->id'";

        $result = $db->query($query);
    
        if ($result) {
            return true;
        } else {
            return false;
        }
}

/**
 * Deletes a product from the database.
 * 
 * @param int $id Product ID
 * @param PDO $db Database connection object
 * @return int Returns 1 if the product was successfully deleted, otherwise 0
 */
function deleteProduct($id, $db){
        $query = "DELETE FROM Products WHERE ID = '$id'";
        $result = $db->query($query);
        if ($result) {
            return 1;
        } else {
            return 0;
        }
}

/**
 * Updates a product's data in the database.
 * 
 * @param stdClass $product Product details
 * @param PDO $db Database connection object
 * @return int Returns 1 if the product was successfully updated, otherwise 0
 */

function updateProduct($product, $db) {
        $query = "UPDATE Products SET PRODUCT = '$product->product', DESCRIPTION = '$product->description', PRICE = '$product->price', CATEGORY = '$product->category' WHERE ID = '$product->id'";
        $result = $db->query($query);
        if ($result) {
            return 1;
        } else {
            return 0;
        }
}

/**
 * Changes the activation status of a product.
 * 
 * @param int $id Product ID
 * @param int $status New activation status
 * @param PDO $db Database connection object
 * @return int Returns 1 if the activation status was successfully changed, otherwise 0
 */
function changeActivationStatus($id, $status, $db) {
        $query = "UPDATE Products SET IS_ACTIVE = '$status' WHERE ID = '$id'";
        $result = $db->query($query);
        if ($result) {
            return 1;
        } else {
            return 0;
        }
}

/**
 * Adds a new user to the database.
 * 
 * @param PDO $db Database connection object
 * @param stdClass $user User details
 * @return int Returns 1 if the user was successfully added, otherwise 0
 */

function addUser($db, $user) {
        //A user is active by default unless an admin deactivates them.
        $query = "INSERT INTO Users (Username, Password, FirstName, LastName, ProfilePicture, Email, CreationDate, ActiveStatus, Gender, Age) VALUES (?, PASSWORD(?), ?, ?, ?, ?, NOW(), 1, ?, ?)";
        $stmt = $db->prepare($query);
        $stmt->bindParam(1, $user->username);
        $stmt->bindParam(2, $user->password);
        $stmt->bindParam(3, $user->firstname);
        $stmt->bindParam(4, $user->lastname);
        $stmt->bindParam(5, $user->profilePicture);
        $stmt->bindParam(6, $user->email);
        $stmt->bindParam(7, $user->gender);
        $stmt->bindParam(8, $user->age);
        $stmt->execute();
        return $stmt->rowCount() > 0 ? 1 : 0;
}

/**
 * Retrieves all contact messages from the database.
 * 
 * @param PDO $db Database connection object
 * @return array Array of associative arrays containing contact message details
 */

function getMessages() {
        $db = require("../../../Backend/Common/Dbconfig.php");
        $query = "SELECT * FROM table_contacts";
        $result = $db->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Deletes a contact message from the database.
 * 
 * @param int $id Contact message ID
 * @param PDO $db Database connection object
 * @return int Returns 1 if the contact message was successfully deleted, otherwise 0
 */
function updateUser($user, $db) {
        $query = "UPDATE Users SET Username = '$user->username', FirstName = '$user->firstname', LastName = '$user->lastname', Email = '$user->email', Gender = '$user->gender', Age = '$user->age' WHERE ID = '$user->id'";
        $result = $db->query($query);
        if ($result) {
            return 1;
        } else {
            return 0;
        }
}

/**
 * Retrieves user details based on the user ID.
 * 
 * @param int $id User ID
 * @param PDO $db Database connection object
 * @return array Associative array containing user details
 */
function getUserDetails($id, $db) {
        $query = "SELECT * FROM Users WHERE ID = '$id'";
        $result = $db->query($query);
        return $result->fetch(PDO::FETCH_ASSOC);
}

function deleteMessage($id,$db){
    $query = "delete  FROM table_contacts  WHERE ContactID = '$id'";
    $result = $db->query($query);
    return $result->fetch(PDO::FETCH_ASSOC);
}

?>