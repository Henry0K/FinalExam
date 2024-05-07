<?php

require_once("../../Backend/Common/Dbconfig.php");

function SignUp($user, $db){
    $check_query = "SELECT * FROM Users WHERE Username = '$user->username'";
    $stmt = $db->query($check_query);
    if ($stmt->rowCount() > 0) {
        return -1;
    }

    $query = "INSERT INTO Users (Username, FirstName, LastName, Email, Password, Gender, Age, Role, ProfilePicture, ActiveStatus, CreationDate) 
              VALUES ('$user->username', '$user->firstname', '$user->lastname', '$user->email', '$user->password', 
                      '$user->gender', '$user->age', '$user->role', '$user->profilePicture', 1, NOW())";
    $stmt = $db->query($query);
    return $stmt->rowCount() > 0 ? 1 : 0;
}

function Login($username, $password, $db){
    $query = "SELECT ID, Role, ProfilePicture, FirstName, LastName FROM Users WHERE Username = '$username' AND Password = '$password'";
    $stmt = $db->query($query);
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $array = array("ID" => $row["ID"], "Role" => $row["Role"], "ProfilePicture" => $row["ProfilePicture"], "FirstName" => $row["FirstName"], "LastName" => $row["LastName"]);
        return $array;
    } else {
        return -1;
    }
}


function getAllCategories(){
    $db = require("../../Backend/Common/Dbconfig.php");
    $query = "SELECT DISTINCT Category FROM Products";
    $stmt = $db->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getProductsByCategory($category){
    $db = require("../../Backend/Common/Dbconfig.php");
    $query = "SELECT * FROM Products WHERE Category = '$category'";
    $stmt = $db->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>
