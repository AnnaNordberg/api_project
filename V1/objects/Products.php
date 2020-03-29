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
        //kan vara problem med namnet availability?
        

        $query_string = "SELECT ID, productName, price, availability FROM Products WHERE ID=:product_id";
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

        $query_string = "SELECT ID, productName, price, availability FROM Products";
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
    public function addProduct($title_param) {

        $query_string = "INSERT INTO Products (productName, price, availability) VALUES(:name_IN, 150, 20)";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {

            $statementHandler->bindParam(":name_IN", $title_param);
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

        // Testar att byta content till availability , 
        //Ändrade även [id] till [Id]

        if(!empty($data['availability'])) {
            $query_string = "UPDATE Products SET availability=:availability WHERE ID=:product_id";
            $statementHandler = $this->database_handler->prepare($query_string);

            $statementHandler->bindParam(":availability", $data['availability']);
            $statementHandler->bindParam(":product_id", $data['ID']);

            $statementHandler->execute();
            
        }

        $query_string = "SELECT ID, productName, price, availability FROM Products WHERE ID=:product_id";
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

}


?>