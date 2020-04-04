<?php 

include("../../config/database_handler.php");

class Cart {
    private $database_handler;
    private $cartID;

    public function __construct( $database_handler_IN ) {

        $this->database_handler = $database_handler_IN;

    }


    public function setCartID($cart_ID_IN) {

        $this->cartID = $cart_ID_IN;

    }

  /*   public function fetchSinglePost() {

        $query_string = "SELECT ID, productAmount, productID, userID FROM Cart WHERE ID=:cartID";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {
            
            $statementHandler->bindParam(":cartID", $this->cartID);
            $statementHandler->execute();

            return $statementHandler->fetch();



        } else {
            echo "Could not create database statement!";
            die();
        }
    } */

    public function fetchCart() {

        $query_string = "SELECT ID, productAmount, productID, userID FROM Cart";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {

            $statementHandler->execute();
            return $statementHandler->fetchAll();

        } else {
            echo "Could not create database statement!";
            die();
        }
        
    } 


    public function addToCart($productAmount_param, $productID_param, $userID_param) {

        $query_string = "INSERT INTO Cart (productAmount, productID, userID) VALUES(:productAmount_IN, :productID_IN, :userID_IN)";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {

            $statementHandler->bindParam(":productAmount_IN", $productAmount_param);
            $statementHandler->bindParam(":productID_IN", $productID_param);
            $statementHandler->bindParam(":userID_IN", $userID_param);

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

//senaste försök ändrade ID till productID

//testa lägga till delete product From CART

        if(!empty($data['productID'])) {
            $query_string = "DELETE FROM Cart WHERE productID=:product_id";
            $statementHandler = $this->database_handler->prepare($query_string);

            $statementHandler->bindParam(":product_id", $data['productID']);

            $statementHandler->execute();
            
        }

    
        $query_string = "SELECT ID FROM Cart WHERE productID=:product_id";
        $statementHandler = $this->database_handler->prepare($query_string);

        $statementHandler->bindParam(":product_id", $data['productID']);
        $statementHandler->execute();

        echo json_encode($statementHandler->fetch());


    }

} 