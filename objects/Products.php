<?php

include("../../config/database_handler.php");

class Products {
    private $database_handler;
    private $product_ID;

    public function __construct( $database_handler_IN ) {

        $this->database_handler = $database_handler_IN;

    }

    public function setProductID($product_ID_IN) {

        $this->product_ID = $product_ID_IN;

    }

    public function fetchSingleProduct() {

       
        

        $query_string = "SELECT ID, productName, price, stockAmount FROM Products WHERE ID=:product_ID";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {
            
            $statementHandler->bindParam(":product_ID", $this->product_ID);
            $statementHandler->execute();

            return $statementHandler->fetch();



        } else {
            echo "Could not create database statement!";
            die();
        }
    }

    public function fetchAllProducts() {

        $query_string = "SELECT ID, productName, price, stockAmount FROM Products ORDER BY price";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {

            $statementHandler->execute();
            return $statementHandler->fetchAll();

        } else {
            echo "Could not create database statement!";
            die();
        }
        
    }
    public function fetchAllProductsDESC() {

   
        $query_string = "SELECT ID, productName, price, stockAmount FROM Products ORDER BY price DESC";
        $statementHandler = $this->database_handler->prepare($query_string);
    
        if($statementHandler !== false) {
    
            $statementHandler->execute();
            return $statementHandler->fetchAll();
    
    
        } else {
            echo "Could not create database statement!";
            die();
        }
        
    }

    
    public function addProduct($productName_param,$price_param,$stockAmount_param ) {

        $query_string = "INSERT INTO Products (productName, price, stockAmount) VALUES(:name_IN, :price_IN, :stockAmount_IN)";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {

            $statementHandler->bindParam(":name_IN", $productName_param);
            $statementHandler->bindParam(":price_IN", $price_param);
            $statementHandler->bindParam(":stockAmount_IN", $stockAmount_param);
          
            
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


    public function updateProduct($data) {

     

        if(!empty($data['productName'])) {
            $query_string = "UPDATE Products SET productName=:productName WHERE ID=:product_ID";
            $statementHandler = $this->database_handler->prepare($query_string);

            $statementHandler->bindParam(":productName", $data['productName']);
            $statementHandler->bindParam(":product_ID", $data['ID']);

            $statementHandler->execute();
            
        }

       
        if(!empty($data['price'])) {
            $query_string = "UPDATE Products SET price=:price WHERE ID=:product_ID";
            $statementHandler = $this->database_handler->prepare($query_string);

            $statementHandler->bindParam(":price", $data['price']);
            $statementHandler->bindParam(":product_ID", $data['ID']);

            $statementHandler->execute();
            
        }

        $query_string = "SELECT ID, productName, price, stockAmount FROM Products WHERE ID=:product_ID";
        $statementHandler = $this->database_handler->prepare($query_string);

        $statementHandler->bindParam(":product_ID", $data['ID']);
        $statementHandler->execute();

        echo json_encode($statementHandler->fetch());


    }




    public function deleteProduct($data) {


        if(!empty($data['ID'])) {
            $query_string = "DELETE FROM Products WHERE ID=:product_ID";
            $statementHandler = $this->database_handler->prepare($query_string);

            $statementHandler->bindParam(":product_ID", $data['ID']);

            $statementHandler->execute();
            
        }

    
        $query_string = "SELECT ID FROM Products WHERE ID=:product_ID";
        $statementHandler = $this->database_handler->prepare($query_string);

        $statementHandler->bindParam(":product_ID", $data['ID']);
        $statementHandler->execute();

        echo json_encode($statementHandler->fetch());


    }
  
    
    public function getProductPrice($productID_param) {

        $query_string = "SELECT price FROM Products WHERE ID=:productID_IN";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {
            
            $statementHandler->bindParam(":productID_IN", $productID_param);
            $statementHandler->execute();

            return $statementHandler->fetch();

        } else {
            echo "Could not create database statement!";
            die();
        }


    }



}



?>