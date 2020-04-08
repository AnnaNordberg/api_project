<?php

include('../../objects/Orderrows.php');
include('../../objects/Users.php');
include('../../objects/Products.php');

$orderrows_object = new Orderrows ($databaseHandler);
$user_handler = new User($databaseHandler);
$product_handler = new Products($databaseHandler);

$token = $_POST['token'];
$orderrowsID = ( !empty($_POST['cartID'] ) ? $_POST['cartID'] : -1 );
 

if($user_handler->validateToken($token) === false) {
    $retObject = new stdClass;
    $retObject->error = "Token is invalid";
    $retObject->errorCode = 1338;
    echo json_encode($retObject);
    die();
} 


if($orderrowsID > -1) {

    $orderrows_object->setOrderrowsID($orderrowsID);
    print_r( $orderrows_object->fetchOrderrows($orderrowsID) );

} else {

    echo "Error: Missing parameter ID!";

}
?>