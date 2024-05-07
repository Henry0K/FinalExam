<?php

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

function getProductDetails($id, $db) {
    $query = "SELECT * FROM Products WHERE ID = '$id'";
    $result = $db->query($query);
    return $result->fetch(PDO::FETCH_ASSOC);
}


function getProducts() {
        $db = require_once("../../../Backend/Common/Dbconfig.php");
        $query = "SELECT * FROM Products";
        $result = $db->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
}
    
    function getUsers() {
        $db = require_once("../../../Backend/Common/Dbconfig.php");
        $query = "SELECT * FROM Users";
        $result = $db->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    function deleteUser($db, $userId) {
        $query = "DELETE FROM Users WHERE ID = '$userId'";
        $result = $db->query($query);
        if ($result) {
            return 1;
        } else {
            return 0;
        }
    }
    function updateUserData($user, $db) {
        $query = "UPDATE Users SET Username = '$user->username', FirstName = '$user->firstName', LastName = '$user->lastName' WHERE ID = '$user->id'";

        $result = $db->query($query);
    
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    function deleteProduct($id, $db){
        $query = "DELETE FROM Products WHERE ID = '$id'";
        $result = $db->query($query);
        if ($result) {
            return 1;
        } else {
            return 0;
        }
    }

    function updateProduct($product, $db) {
        $query = "UPDATE Products SET PRODUCT = '$product->product', DESCRIPTION = '$product->description', PRICE = '$product->price', IMAGE = '$product->image', CATEGORY = '$product->category', IS_ACTIVE = '$product->is_active' WHERE ID = '$product->id'";
        $result = $db->query($query);
        if ($result) {
            return 1;
        } else {
            return 0;
        }
    }

    function changeActivationStatus($id, $status, $db) {
        $query = "UPDATE Products SET IS_ACTIVE = '$status' WHERE ID = '$id'";
        $result = $db->query($query);
        if ($result) {
            return 1;
        } else {
            return 0;
        }
    }

    

?>