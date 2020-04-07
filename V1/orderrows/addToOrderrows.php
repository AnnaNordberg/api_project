<?php
include("../../objects/Products.php");
include("../../objects/Users.php");
include("../../objects/Orderrows.php");

$orderrows_object = new Orderrows ($databaseHandler);
$product_object = new Products ($databaseHandler);

$productAmount_IN = ( isset($_POST['productAmount']) ? $_POST['productAmount'] : '' );
$productID_IN = ( isset($_POST['productID']) ? $_POST['productID'] : '' );
$tokenID_IN = ( isset($_POST['token']) ? $_POST['token'] : '' );
$orderID_IN = ( isset($_POST['orderID']) ? $_POST['orderID'] : '');

$productPrice = $product_object->getProductPrice($productID_IN);
$totalPrice_IN = $productAmount_IN * $productPrice['0'];



if(!empty($productAmount_IN)) {
    if(!empty($productID_IN)) {
       if(!empty($orderID_IN)) {
 
        $orderrows_object->addToOrderrows($productAmount_IN, $productID_IN, $totalPrice_IN, $orderID_IN);
        echo "DET GICK";
       } else {
          echo "Error: orderId cannot be empty!";
       }
    } else {
        echo "Error: productId cannot be empty!";
    }
 } else {
    echo "Error: productamount cannot be empty!";
 }


?>