  
<?php
include('../../objects/Products.php');
include('../../objects/Users.php');

$products_object = new Products($databaseHandler);
$user_handler = new User($databaseHandler);

$token = $_POST['token'];


 if($user_handler->validateToken($token) === false) {
    echo "Invalid token!";
    die;
} 


    if(isset($_POST['order']) && $_POST['order'] == "DESC"){
    echo "<pre>";
    print_r($products_object->fetchAllProductsDESC());
    echo "</pre>";
 }  else {
    echo "<pre>";
    print_r($products_object->fetchAllProductsSort());
    echo "</pre>";
 }






?>