<?php

include("../../config/database_handler.php");

class Products {
    private $database_handler;
    private $product_id;

    public function __construct( $database_handler_IN ) {

        $this->database_handler = $database_handler_IN;

    }

    public function setProductId($product_id_IN) {

        $this->product_id = $product_id_IN;

    }

    public function fetchSingleProduct() {

        //Ändrade WHERE id=:product_id till ID
        //kan vara problem med namnet availability? Ändrade till stockAmount
        

        $query_string = "SELECT ID, productName, price, stockAmount FROM Products WHERE ID=:product_id";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {
            
            $statementHandler->bindParam(":product_id", $this->product_id);
            $statementHandler->execute();

            return $statementHandler->fetch();



        } else {
            echo "Could not create database statement!";
            die();
        }
    }

    public function fetchAllProducts() {

        $query_string = "SELECT ID, productName, price, stockAmount FROM Products";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {

            $statementHandler->execute();
            return $statementHandler->fetchAll();

        } else {
            echo "Could not create database statement!";
            die();
        }
        
    }

    //Ändrade om namnen i :name_IN och tog även bort ,content_param från addproduct( ).
    public function addProduct($productName_param,$price_param,$stockAmount_param ) {

        $query_string = "INSERT INTO Products (productName, price, stockAmount) VALUES(:name_IN, :price_IN, :stockAmount_IN)";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {

            $statementHandler->bindParam(":name_IN", $productName_param);
            $statementHandler->bindParam(":price_IN", $price_param);
            $statementHandler->bindParam(":stockAmount_IN", $stockAmount_param);
           /*  $statementHandler->bindParam(":content_IN", $content_param); */
            
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

        // Testar att byta title till name -- if(!empty($data['title'])) 

        if(!empty($data['productName'])) {
            $query_string = "UPDATE Products SET productName=:productName WHERE ID=:product_id";
            $statementHandler = $this->database_handler->prepare($query_string);

            $statementHandler->bindParam(":productName", $data['productName']);
            $statementHandler->bindParam(":product_id", $data['ID']);

            $statementHandler->execute();
            
        }

       
        if(!empty($data['price'])) {
            $query_string = "UPDATE Products SET price=:price WHERE ID=:product_id";
            $statementHandler = $this->database_handler->prepare($query_string);

            $statementHandler->bindParam(":price", $data['price']);
            $statementHandler->bindParam(":product_id", $data['ID']);

            $statementHandler->execute();
            
        }

        $query_string = "SELECT ID, productName, price, stockAmount FROM Products WHERE ID=:product_id";
        $statementHandler = $this->database_handler->prepare($query_string);

        $statementHandler->bindParam(":product_id", $data['ID']);
        $statementHandler->execute();

        echo json_encode($statementHandler->fetch());


    }


    // Ett försök att skapa DELETEproduct funktion

    public function deleteProduct($data) {


        if(!empty($data['ID'])) {
            $query_string = "DELETE FROM Products WHERE ID=:product_id";
            $statementHandler = $this->database_handler->prepare($query_string);

            $statementHandler->bindParam(":product_id", $data['ID']);

            $statementHandler->execute();
            
        }

    
        $query_string = "SELECT ID FROM Products WHERE ID=:product_id";
        $statementHandler = $this->database_handler->prepare($query_string);

        $statementHandler->bindParam(":product_id", $data['ID']);
        $statementHandler->execute();

        echo json_encode($statementHandler->fetch());


    }

// FÖRSÖK PÅ SORTERING:
public function fetchAllProductsSort() {

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



}



?>