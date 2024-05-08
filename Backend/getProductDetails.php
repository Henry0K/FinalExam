<?php
require_once("./Models/userModel.php");

// Get the product ID from the query string
$productID = isset($_GET['productID']) ? $_GET['productID'] : null;
$caller = isset($_GET['caller']) ? $_GET['caller'] : 'Other';

if ($productID) {
    $productDetails = getProductByID($productID, $caller);
    if ($productDetails) {
        echo json_encode($productDetails);
    } else {
        echo json_encode(['error' => 'Product not found']);
    }
} else {
    echo json_encode(['error' => 'No product ID provided']);
}
?>