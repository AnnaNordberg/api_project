
<?php

include('../../objects/Orderrows.php');
include('../../objects/Users.php');

$orderrows_object = new Orderrows ($databaseHandler);
$user_handler = new User($databaseHandler);

$userID_IN = ( isset($_POST['userID']) ? $_POST['userID'] : '');
$token = $_POST['token'];
$checkoutStatus = 1;
$cartID = $orderrows_object->getCartID($userID_IN);


if($user_handler->validateToken($token) === false) {
    $retObject = new stdClass;
    $retObject->error = "Token is invalid";
    $retObject->errorCode = 1338;
    echo json_encode($retObject);
    die();
} 

if(!empty($userID_IN)) {
    $orderrows_object->checkoutCart($checkoutStatus, $userID_IN);
    $orderrows_object->updatestockAmount ($cartID[0]);
    echo "Nu är din varukorg utcheckad";
} else {
    echo "Error: userID cannot be empty!";
}