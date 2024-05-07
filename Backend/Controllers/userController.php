<?php
session_start();
require_once("../Common/Dbconfig.php");
require_once("../Models/userModel.php");

/**
 * Check if the required arguments for the contact form are missing
 * @param bool $isNotEmpty
 * @return int
 */
function isMissingArgsContact($isNotEmpty = false){
    if (!isset($_POST["phone"]) || ($_POST["phone"] == "" && $isNotEmpty))
        return 1;
    if (!isset($_POST["email"]) || ($_POST["email"] == "" && $isNotEmpty))
        return 1;
    if (!isset($_POST["subject"]) || ($_POST["subject"] == "" && $isNotEmpty))
        return 1;
    if (!isset($_POST["body"]) || ($_POST["body"] == "" && $isNotEmpty))
        return 1;
}

if (isset($_POST["action"])) {

    switch($_POST["action"]){            
            case "CONTACT":
                if (isMissingArgsContact(true)) {
                    header('Location: ../../Frontend/Pages/contact.php?status=missingArgs');
                    exit;
                }
                $contact = new stdClass();
                $contact->phone = $_POST['phone'];
                $contact->email = $_POST['email'];
                $contact->subject = $_POST['subject'];
                $contact->body = $_POST['body'];
            
                $result = insertContact($contact, $db);
                if ($result) {
                    header('Location: ../../Frontend/Pages/contact.php?status=success');
                } else {
                    header('Location: ../../Frontend/Pages/contact.php?status=error');
                }
                break;    
        default:
            header("Location: ../../index.php?errorCode=3&errorDesc=Invalid action!");
            break;
    }
}
?>
