<?php
include("../objects/Products.php");
include("../objects/Users.php");
$cart_object = new Products ($databaseHandler);

$productAmount_IN = ( isset($_GET['productAmount']) ? $_GET['productAmount'] : '' );
$productID_IN = ( isset($_GET['productID']) ? $_GET['productID'] : '' );
$tokenID_IN = ( isset($_GET['tokenID']) ? $_GET['tokenID'] : '' );



if(!empty($productAmount_IN)) {
    if(!empty($productID_IN)) {
       if(!empty($tokenID_IN)) {
 
        $cart_object->addToCart($productAmount_IN, $productID_IN, $tokenID_IN);
        echo "DET GICK";
       } else {
          echo "Error: TokenId cannot be empty!";
       }
    } else {
        echo "Error: productId cannot be empty!";
    }
 } else {
    echo "Error: productamount cannot be empty!";
 }


?>