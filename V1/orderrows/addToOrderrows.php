<?php
include("../../objects/Products.php");
include("../../objects/Users.php");
include("../../objects/Orderrows.php");

//Hämta klasser
$orderrows_object = new Orderrows ($databaseHandler);
$user_handler = new User($databaseHandler);
$product_object = new Products ($databaseHandler);


$productAmount_IN = ( isset($_POST['productAmount']) ? $_POST['productAmount'] : '' );
$productID_IN = ( isset($_POST['productID']) ? $_POST['productID'] : '' );
$tokenID_IN = ( isset($_POST['token']) ? $_POST['token'] : '' );
$userID_IN = ( isset($_POST['userID']) ? $_POST['userID'] : '');

//räkna ut totalpris av produkter
$productPrice = $product_object->getProductPrice($productID_IN);
$totalPrice_IN = $productAmount_IN * $productPrice['0'];



if(!empty($productAmount_IN)) {
   if(!empty($productID_IN)) {
      if(!empty($tokenID_IN)) {

         $token = $_POST['token'];

         if($user_handler->validateToken($token) === false) {
             $retObject = new stdClass;
             $retObject->error = "Token is invalid";
             $retObject->errorCode = 1338;
             echo json_encode($retObject);
             die();
         }
      
         $existingCartID = $orderrows_object->checkUserID($userID_IN);

         if (($existingCartID[0] == $userID_IN) === true ) {
            $cartID = $orderrows_object->getCartID($userID_IN);
            $cartID_IN = $cartID['0'];
            $orderrows_object->addProductToOrderrows($productAmount_IN, $totalPrice_IN, $productID_IN, $cartID_IN);
            die;

         }   else {
            $orderrows_object->createCart($userID_IN);
            $cartID = $orderrows_object->getCartID($userID_IN);
            $cartID_IN = $cartID['0'];
            $orderrows_object->addProductToOrderrows($productAmount_IN, $totalPrice_IN, $productID_IN, $cartID_IN);
         } 
 
     
      } else {
         echo "Error: TokenID cannot be empty!";
      }
   } else {
       echo "Error: productID cannot be empty!";
   }
} else {
   echo "Error: productamount cannot be empty!";
} 

?>