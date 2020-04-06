<?php
include("../../objects/Products.php");

$products_object = new Products($databaseHandler);



$productID = ( !empty($_GET['ID'] ) ? $_GET['ID'] : -1 );


if($productID > -1) {

    $products_object->setProductId($productID);
    print_r( $products_object->fetchSingleProduct() );


} else {

    echo "Error: Missing parameter id!";

}

?>