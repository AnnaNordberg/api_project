<?php
include('../../objects/Orderrows.php');
include('../../objects/Users.php');

$orderrows_object = new Orderrows($databaseHandler);
$user_handler = new User($databaseHandler);

$token = $_POST['token'];
$orderrowsID = ( !empty($_POST['userID'] ) ? $_POST['userID'] : -1 );



if($user_handler->validateToken($token) === false) {
    $retObject = new stdClass;
    $retObject->error = "Token is invalid";
    $retObject->errorCode = 1338;
    echo json_encode($retObject);
    die();
} 




 if($orderrowsID > -1) {

    $orderrows_object->setOrderrowsID($orderrowsID);
    print_r( $orderrows_object->fetchOrderrowsID($orderrowsID) );

} else {

    echo "Error: Missing parameter iD!";

} 

    