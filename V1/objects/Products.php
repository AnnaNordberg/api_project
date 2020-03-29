<?php

include("../../config/database_handler.php");

class Posts {
    private $database_handler;
    private $post_id;

    public function __construct( $database_handler_IN ) {

        $this->database_handler = $database_handler_IN;

    }

    public function setPostId($post_id_IN) {

        $this->post_id = $post_id_IN;

    }

    public function fetchSinglePost() {

        $query_string = "SELECT ID, name, price, availability FROM Products WHERE ID=:post_id";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {
            
            $statementHandler->bindParam(":post_id", $this->post_id);
            $statementHandler->execute();

            return $statementHandler->fetch();



        } else {
            echo "Could not create database statement!";
            die();
        }
    }

    public function fetchAllPosts() {

        $query_string = "SELECT ID, name, price, availability FROM Products";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {

            $statementHandler->execute();
            return $statementHandler->fetchAll();

        } else {
            echo "Could not create database statement!";
            die();
        }
        
    }

     public function addPost($title_param) {

        $query_string = "INSERT INTO Products (name, price, availability) VALUES(:name_IN, 100, 20)";
        $statementHandler = $this->database_handler->prepare($query_string);

        if($statementHandler !== false) {

            $statementHandler->bindParam(":name_IN", $title_param);
            //$statementHandler->bindParam(":price_IN", $content_param);
            
            $success = $statementHandler->execute();

            if($success === true) {
                echo "OK!";
            } else {
                echo "Error while trying to insert post to database!";
            }

        } else {
            echo "Could not create database statement!";
            die();
        }
    } 


//testar byta title till name
    public function updatePost($data) {


        if(!empty($data['name'])) {
            $query_string = "UPDATE Products SET name=:name WHERE ID=:post_id";
            $statementHandler = $this->database_handler->prepare($query_string);

            $statementHandler->bindParam(":name", $data['name']);
            $statementHandler->bindParam(":post_id", $data['ID']);

            $statementHandler->execute();
            
        }

        if(!empty($data['availability'])) {
            $query_string = "UPDATE Products SET availability=:availability WHERE ID=:post_id";
            $statementHandler = $this->database_handler->prepare($query_string);

            $statementHandler->bindParam(":availability", $data['availability']);
            $statementHandler->bindParam(":post_id", $data['ID']);

            $statementHandler->execute();
            
        }

        $query_string = "SELECT ID, name, price, availability FROM Products WHERE ID=:post_id";
        $statementHandler = $this->database_handler->prepare($query_string);

        $statementHandler->bindParam(":post_id", $data['ID']);
        $statementHandler->execute();

        echo json_encode($statementHandler->fetch());


    }

}


?>