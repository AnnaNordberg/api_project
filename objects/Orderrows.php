<?php 
//Hämta databasen
include("../../config/database_handler.php");

class Orderrows {
    private $database_handler;
    private $orderrowsID;

    public function __construct( $database_handler_IN ) {

        $this->database_handler = $database_handler_IN;

    }

//funktion för att sätta ett ID på orderrow

    public function setOrderrowsID($orderrows_ID_IN) {

        $this->orderrowsID = $orderrrows_ID_IN;

    }

    //funktion för att skapa en Cart när en användare lägger produkter i varukorgen första gången

    public function createCart($userID_param) {
        $query_string = "INSERT INTO Cart (userID) VALUES(:userID_IN)";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {

            $statementHandler->bindParam(":userID_IN", $userID_param);
            $statementHandler->execute();
            
            $return = $statementHandler->fetch();

        } else {
            echo "Couldn't create statement handler!";
        }

       }

       //funktion för att skapa ett CartID när en användare lägger produkter i varukorgen första gången

    public function createCartID($userID_param) {
        $query_string = "INSERT INTO Cart (userID) VALUES(:userID_IN)";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {

            $statementHandler->bindParam(":userID_IN", $userID_param);
            $statementHandler->execute();
            
            $return = $statementHandler->fetch();

        } else {
            echo "Couldn't create statement handler!";
        }

       }

       //funktion för att hämta CartID

       public function getCartID($userID_param) {
        $query_string = "SELECT ID FROM Cart WHERE userID=:userID_IN";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {

            $statementHandler->bindParam(":userID_IN", $userID_param);

            $statementHandler->execute();
            return $statementHandler->fetch();

            } else {
                echo "Error while trying to insert product to database!";
            }
       }

       //Funktion för att kolla om UserID finns

    public function checkUserID($userID_param) {
        $query_string = "SELECT userID FROM Cart WHERE userID=:userID_IN";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {

            $statementHandler->bindParam(":userID_IN", $userID_param);
            $statementHandler->execute();
            return $statementHandler->fetch();

            } else {
                echo "Error trying to check User ID!";
            }
       } 

       //Funktion för att hämta rader(produkter) i orderrows

    public function fetchOrderrows($cart_ID_param) {

        $query_string = "SELECT ID, productAmount, totalPrice, productID, cartID FROM Orderrows WHERE cartID=:cart_ID_IN";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {
            $statementHandler->bindParam(":cart_ID_IN", $cart_ID_param);
            $statementHandler->execute();
            return $statementHandler->fetchAll();

        } else {
            echo "Could not create database statement!";
            die();
        }
        
    } 
//Funktion för att lägga till produkter i orderrows(Varukorg)

    public function addProductToOrderrows($productAmount_param, $totalPrice_param, $productID_param, $cartID_param) {

        $query_string = "INSERT INTO Orderrows (productAmount, totalPrice, productID, cartID) VALUES(:productAmount_IN, :totalPrice_IN, :productID_IN, :cartID_IN)";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {

            $statementHandler->bindParam(":productAmount_IN", $productAmount_param);
            $statementHandler->bindParam(":productID_IN", $productID_param);
            $statementHandler->bindParam(":totalPrice_IN", $totalPrice_param);
            $statementHandler->bindParam(":cartID_IN", $cartID_param);

 
            
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

    // Funktion för att ta bort produkt från varukorg

    public function deleteOrderrows($data) {


        if(!empty($data['ID'])) {
            $query_string = "DELETE FROM Orderrows WHERE ID=:orderrows_iD";
            $statementHandler = $this->database_handler->prepare($query_string);

            $statementHandler->bindParam(":orderrows_iD", $data['ID']);

            $statementHandler->execute();
            
        }

    
        $query_string = "SELECT ID FROM Orderrows WHERE ID=:orderrows_iD";
        $statementHandler = $this->database_handler->prepare($query_string);

        $statementHandler->bindParam(":orderrows_iD", $data['ID']);
        $statementHandler->execute();

        echo json_encode($statementHandler->fetch());


    }

    //Funktion för att uppdatera produkt antal i orderrows(varukorg)
    public function updateOrderrows($data) {

        

        if(!empty($data['productAmount'])) {
            $query_string = "UPDATE Orderrows SET productAmount=:productAmount WHERE ID=:orderrows_iD";
            $statementHandler = $this->database_handler->prepare($query_string);

            $statementHandler->bindParam(":productAmount", $data['productAmount']);
            $statementHandler->bindParam(":orderrows_iD", $data['ID']);

            $statementHandler->execute();
            
        }


        $query_string = "SELECT ID, productAmount, totalPrice, productID FROM Orderrows WHERE ID=:orderrows_iD";
        $statementHandler = $this->database_handler->prepare($query_string);

        $statementHandler->bindParam(":orderrows_iD", $data['ID']);
        $statementHandler->execute();

        echo json_encode($statementHandler->fetch());


    }
//Funktion för att hämta orderrowID 
    public function fetchOrderrowsID($cart_ID_param) {

        $query_string = "SELECT ID FROM Orderrows WHERE cartID=:cart_ID_IN";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {
            $statementHandler->bindParam(":orderrows_ID_IN", $cart_ID_param);
            $statementHandler->execute();
            return $statementHandler->fetchAll();

        } else {
            echo "Could not create database statement!";
            die();
        }
        
    } 

  
        
    } 
    

