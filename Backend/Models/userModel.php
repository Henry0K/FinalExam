<?php


/**
 * Retrieves all distinct product categories that are active.
 * 
 * @return array Returns an array of active product categories.
 */
function getAllProductCategories($call){
    //Changing the directory based on the call because index is in the root directory
    //Whereas the shop is in the Frontend/Pages directory
    if ($call == "Home"){
        $db = require("./Backend/Common/Dbconfig.php");
    } else {
        $db = require("../../Backend/Common/Dbconfig.php");
    }
    
    $query = "SELECT DISTINCT CATEGORY FROM Products WHERE IS_ACTIVE = 1";
    $stmt = $db->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Fetches all products that belong to a specific category and are active.
 * 
 * @param string $category The category to filter products by.
 * @return array Returns an array of products within the specified category.
 */
function getProductsByCategory($category, $call){
    if ($call == "Home"){
        $db = require("./Backend/Common/Dbconfig.php");
    } else {
        $db = require("../../Backend/Common/Dbconfig.php");
    }
    
    $query = "SELECT * FROM Products WHERE CATEGORY = '$category' AND IS_ACTIVE = 1";
    $stmt = $db->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


/**
 * Fetches all products that are active.
 * 
 * @return array Returns an array of all active products.
 */
function getProducts(){
    $db = require("../../Backend/Common/Dbconfig.php");
    $query = "SELECT * FROM Products WHERE IS_ACTIVE = 1";
    $stmt = $db->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


/**
 * Retrieves product details based on the product ID.
 * 
 * @param int $productID Product ID
 * @return array Associative array containing product details
 */
function getProductByID($productID, $call){
    if ($call == "Home" || $call == "Other"){
        $db = require("./Common/Dbconfig.php");
    } else {
        $db = require("../../Backend/Common/Dbconfig.php");
    }
    $query = "SELECT * FROM Products WHERE ID = '$productID'";
    $stmt = $db->query($query);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

/**
 * Inserts a new contact message into the database.
 * 
 * @param string $phone The phone number of the contact.
 * @param string $email The email address of the contact.
 * @param string $subject The subject of the contact message.
 * @param string $body The body of the contact message.
 * @return bool Returns true on successful insertion.
 */
function insertContact($contact, $db) {
        $sql = "INSERT INTO table_contacts (Phone, Email, Subject, Body, ContactDate) VALUES ('$contact->phone', '$contact->email', '$contact->subject', '$contact->body', NOW())";
        $stmt = $db->query($sql);
        return $stmt->rowCount() > 0 ? true : false;
}

/**
 * Adds a new product to the database.
 * 
 * @param stdClass $product Product details
 * @param PDO $db Database connection object
 * @return bool Returns true if the product was successfully added, otherwise false
 */
function addCheckout($checkout, $db) {
    $sql = "INSERT INTO Checkout (CustomerID, ProductID, OrderDate) VALUES (:customerID, :productID, NOW())";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':customerID', $checkout->customerID);
    $stmt->bindParam(':productID', $checkout->productID);
    return $stmt->execute();
}

/**
 * Adds a new customer to the database.
 * 
 * @param stdClass $customer Customer details
 * @param PDO $db Database connection object
 * @return int Returns the ID of the newly added customer
 */
function addCustomer($customer, $db) {
    $sql = "INSERT INTO CustomerInformation (Name, Address, Email) VALUES (:name, :address, :email)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':name', $customer->name);
    $stmt->bindParam(':address', $customer->address);
    $stmt->bindParam(':email', $customer->email);
    $stmt->execute();
    return $db->lastInsertId();
}
