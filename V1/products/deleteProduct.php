<?php
include('../../objects/Products.php');
include('../../objects/Users.php');

$product_handler = new Products($databaseHandler);
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

        $product_handler->deleteProduct($_POST);
        echo "Produkt har nu raderats";


    } else {

        // här borde man kanske skapa en separat funktion i ex "users.php" dit man hänvisar så man slipper upprepa. 
        $retObject = new stdClass;
        $retObject->error = "Invalid id!";
        $retObject->errorCode = 1336;

        echo json_encode($retObject);
    }

} else {
    $retObject = new stdClass;
    $retObject->error = "No token found!";
    $retObject->errorCode = 1337;

    echo json_encode($retObject);
}