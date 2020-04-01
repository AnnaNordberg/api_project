<?php 

include("../../config/database_handler.php");

class Cart {
    private $database_handler;
    private $product_id;

    public function __construct( $database_handler_IN ) {

        $this->database_handler = $database_handler_IN;

    }

    public function addToCart($productAmount_param, $productID_param, $tokenID_param) {

        $query_string = "INSERT INTO Cart (productAmount, productID, tokenID) VALUES(:productAmount_IN, :productID_IN, :tokenID_IN)";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {

            $statementHandler->bindParam(":productAmount_IN", $productAmount_param);
            $statementHandler->bindParam(":productID_IN", $productID_param);
            $statementHandler->bindParam(":tokenID_IN", $tokenID_param);

           /* $statementHandler->bindParam(":content_IN", $content_param); */
            
            $success = $statementHandler->execute();

            if($success === true) {
                echo "OK!";
            } else {
                echo "Error while trying to insert product to database!";
            }

        } else {
            echo "Could not create database statement!";
            die();
        }
    } 

    // Ta bort produkt från varukorg

    public function removeFromCart($data) {


        if(!empty($data['ID'])) {
            $query_string = "DELETE FROM Cart WHERE ID=:product_id";
            $statementHandler = $this->database_handler->prepare($query_string);

            $statementHandler->bindParam(":product_id", $data['ID']);

            $statementHandler->execute();
            
        }

    
        $query_string = "SELECT ID FROM Cart WHERE ID=:product_id";
        $statementHandler = $this->database_handler->prepare($query_string);

        $statementHandler->bindParam(":product_id", $data['ID']);
        $statementHandler->execute();

        echo json_encode($statementHandler->fetch());


    }

} 