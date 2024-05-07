<?php

require_once("../../Backend/Common/Dbconfig.php");


/**
 * @param $user
 * @param $db
 * @return int
 */
function SignUp($user, $db){
    $check_query = "SELECT * FROM Users WHERE Username = '$user->username'";
    $stmt = $db->query($check_query);
    if ($stmt->rowCount() > 0) {
        return -1;
    }
    //By default a user is inactive until someone from the admin side activates the user
    $query = "INSERT INTO Users (Username, FirstName, LastName, Email, Password, Gender, Age, Role, ProfilePicture, ActiveStatus, CreationDate) 
              VALUES ('$user->username', '$user->firstname', '$user->lastname', '$user->email', '$user->password', 
                      '$user->gender', '$user->age', '$user->role', '$user->profilePicture', 0, NOW())";
    $stmt = $db->query($query);
    return $stmt->rowCount() > 0 ? 1 : 0;
}

/**
 * @param $username
 * @param $password
 * @param $db
 * @return array|int
 */

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


function getAllProductDistinct($db){

    $sql = "SELECT DISTINCT * FROM Products";
        $result = $db->query($sql);
        $products = $result->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
        return [];
    }



?>
