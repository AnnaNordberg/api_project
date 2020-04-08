<?php
include('../../objects/Orderrows.php');
include('../../objects/Users.php');

$orderrows_handler = new Orderrows($databaseHandler);
$user_handler = new User($databaseHandler);

if(!empty($_POST['token'])) {

    if(!empty($_POST['ID'])) { 

        $token = $_POST['token'];

        if($user_handler->validateToken($token) === false) {
            $retObject = new stdClass;
            $retObject->error = "Token is invalid";
            $retObject->errorCode = 1338;
            echo json_encode($retObject);
            die();
        }

        $orderrows_handler->deleteOrderrows($_POST);
        echo "orderrows har nu raderats";


    } else {


        $retObject = new stdClass;
        $retObject->error = "Invalid ID!";
        $retObject->errorCode = 1336;

        echo json_encode($retObject);
    }

} else {
    $retObject = new stdClass;
    $retObject->error = "No token found!";
    $retObject->errorCode = 1337;

    echo json_encode($retObject);
}