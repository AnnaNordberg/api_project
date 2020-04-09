<?php
include('../../objects/Orderrows.php');
include('../../objects/Users.php');

$orderrows_handler = new Orderrows($databaseHandler);
$user_handler = new User($databaseHandler);

if(!empty($_POST['token'])) {
        $token = $_POST['token'];

        if($user_handler->validateToken($token) === false) {
            $retObject = new stdClass;
            $retObject->error = "Token is invalid";
            $retObject->errorCode = 554;
            echo json_encode($retObject);
            die();
        }

        $productAmount_IN = ( isset($_POST['amount']) ? $_POST['amount'] : '');
        $rowID_IN = ( isset($_POST['rowID']) ? $_POST['rowID'] : '');
        
        $orderrows_handler->updateOrderrows($productAmount_IN, $rowID_IN);
      
        echo "Antal produkter på varukorgsrad $rowID_IN är nu ändrat $productAmount_IN ";

} else {
    $retObject = new stdClass;
    $retObject->error = "No token found!";
    $retObject->errorCode = 557;

    echo json_encode($retObject);
}