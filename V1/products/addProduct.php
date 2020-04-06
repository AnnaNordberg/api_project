<?php
include("../objects/Products.php");
include("../objects/Users.php"); 

$products_object = new Products($databaseHandler);
$user_handler = new User($databaseHandler);
//ANDERS KOD
//$posts_object = new Posts($databaseHandler);



$token = $_POST['token'];

if($user_handler->validateToken($token) === false) {
    echo "Invalid token!";
    die;
}

$isAdmin = $user_handler->isAdmin($token);

if($isAdmin === false) {
    echo "You are not admin";
    die;
}





$productName_IN = ( isset($_POST['productName']) ? $_POST['productName'] : '' );
$price_IN = ( isset($_POST['price']) ? $_POST['price'] : '' );
$stockAmount_IN = ( isset($_POST['stockAmount']) ? $_POST['stockAmount'] : '' );



 if(!empty($productName_IN)) {
 if(!empty($price_IN)) {
if(!empty($stockAmount_IN)) {    
 // tog bort  $products_object->addproduct($title_IN, >>>>$content_IN<<<<<<); ur raden nedan
       $products_object->addProduct($productName_IN,$price_IN,$stockAmount_IN);
     

   } else {
    echo "Error: stockamout cannot be empty!";
    }  
 } else {
    echo "Error: price cannot be empty!";
 } 
}else {
   echo "Error: name cannot be empty!";
 }


?>