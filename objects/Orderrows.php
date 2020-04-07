<?php 

include("../../config/database_handler.php");

class Orderrows {
    private $database_handler;
    private $orderrowsID;

    public function __construct( $database_handler_IN ) {

        $this->database_handler = $database_handler_IN;

    }


    public function setorderrowsID($orderrows_ID_IN) {

        $this->orderrowsID = $orderrrows_ID_IN;

    }

 

    public function fetchOrderrows($order_id_param) {

        $query_string = "SELECT ID, productAmount, productID, orderID FROM Orderrows WHERE orderID=:order_id_IN";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {
            $statementHandler->bindParam(":order_id_IN", $order_id_param);
            $statementHandler->execute();
            return $statementHandler->fetchAll();

        } else {
            echo "Could not create database statement!";
            die();
        }
        
    } 


    public function addToOrderrows($productAmount_param, $productID_param, $totalPrice_param, $orderID_param) {

        $query_string = "INSERT INTO Orderrows (productAmount, productID, totalPrice, orderID) VALUES(:productAmount_IN, :productID_IN, :totalPrice_IN, :orderID_IN)";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {

            $statementHandler->bindParam(":productAmount_IN", $productAmount_param);
            $statementHandler->bindParam(":productID_IN", $productID_param);
            $statementHandler->bindParam(":totalPrice_IN", $totalPrice_param);
            $statementHandler->bindParam(":orderID_IN", $ordeID_param);

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

    public function deleteOrderrows($data) {


        if(!empty($data['ID'])) {
            $query_string = "DELETE FROM Orderrows WHERE ID=:orderrows_id";
            $statementHandler = $this->database_handler->prepare($query_string);

            $statementHandler->bindParam(":orderrows_id", $data['ID']);

            $statementHandler->execute();
            
        }

    
        $query_string = "SELECT ID FROM Orderrows WHERE ID=:orderrows_id";
        $statementHandler = $this->database_handler->prepare($query_string);

        $statementHandler->bindParam(":orderrows_id", $data['ID']);
        $statementHandler->execute();

        echo json_encode($statementHandler->fetch());


    }
    public function updateOrderrows($data) {

        

        if(!empty($data['productAmount'])) {
            $query_string = "UPDATE Orderrows SET productAmount=:productAmount WHERE ID=:orderrows_id";
            $statementHandler = $this->database_handler->prepare($query_string);

            $statementHandler->bindParam(":productAmount", $data['productAmount']);
            $statementHandler->bindParam(":orderrows_id", $data['ID']);

            $statementHandler->execute();
            
        }


        $query_string = "SELECT ID, productAmount, totalPrice, productID FROM Orderrows WHERE ID=:orderrows_id";
        $statementHandler = $this->database_handler->prepare($query_string);

        $statementHandler->bindParam(":orderrows_id", $data['ID']);
        $statementHandler->execute();

        echo json_encode($statementHandler->fetch());


    }

    public function fetchOrderrowsID($order_id_param) {

        $query_string = "SELECT ID FROM Orderrows WHERE orderID=:order_id_IN";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {
            $statementHandler->bindParam(":orderrows_id_IN", $order_id_param);
            $statementHandler->execute();
            return $statementHandler->fetchAll();

        } else {
            echo "Could not create database statement!";
            die();
        }
        
    } 

  
        
    } 
    

