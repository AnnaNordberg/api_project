<?php
include("../../objects/Products.php");
include("../../objects/Users.php");
include("../../objects/Cart.php");

$cart_object = new Cart ($databaseHandler);

$productAmount_IN = ( isset($_GET['productAmount']) ? $_GET['productAmount'] : '' );
$productID_IN = ( isset($_GET['productID']) ? $_GET['productID'] : '' );
$userID_IN = ( isset($_GET['userID']) ? $_GET['userID'] : '' );



if(!empty($productAmount_IN)) {
    if(!empty($productID_IN)) {
       if(!empty($userID_IN)) {
 
        $cart_object->addToCart($productAmount_IN, $productID_IN, $userID_IN);
        echo "DET GICK";
       } else {
          echo "Error: userId cannot be empty!";
       }
    } else {
        echo "Error: productId cannot be empty!";
    }
 } else {
    echo "Error: productamount cannot be empty!";
 }


?>