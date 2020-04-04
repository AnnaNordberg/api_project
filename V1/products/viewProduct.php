<?php
include('../objects/Cart.php');
include('../objects/Users.php');
$cart_object = new Cart($databaseHandler);

$cartID = ( !empty($_GET['ID'] ) ? $_GET['ID'] : -1 );


if($cartID > -1) {

    $cart_object->setCartId($cartID);
    print_r( $cart_object->fetchSinglePost() );


} else {

    echo "Error: Missing parameter id!";

}
