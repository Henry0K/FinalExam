<?php



/**
 * @param $username
 * @param $password
 * @param $db
 * @return array|int
 */

function Login($username, $password, $db){
    $query = "SELECT ID, ProfilePicture, FirstName, LastName FROM Users WHERE Username = '$username' AND Password = '$password'";
    $stmt = $db->query($query);
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $array = array("ID" => $row["ID"], "ProfilePicture" => $row["ProfilePicture"], "FirstName" => $row["FirstName"], "LastName" => $row["LastName"]);
        return $array;
    } else {
        return -1;
    }
}




function getAllProductCategories(){
    $db = require("./Backend/Common/Dbconfig.php");
    $query = "SELECT DISTINCT CATEGORY FROM Products";
    $stmt = $db->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function getProductsByCategory($category){
    $db = require("./Backend/Common/Dbconfig.php");
    $query = "SELECT * FROM Products WHERE CATEGORY = '$category'";
    $stmt = $db->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getProductByID($productID){
    $db = require("../../Backend/Common/Dbconfig.php");
    $query = "SELECT * FROM Products WHERE ID = '$productID'";
    $stmt = $db->query($query);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


function insertContact($phone, $email, $subject, $body) {
    
        $sql = "INSERT INTO table_contacts (phone, email, subject, message) VALUES ('$phone', '$email', '$subject', '$body')";
        $conn->query($sql);

        return true;
}
