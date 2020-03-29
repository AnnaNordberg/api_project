<?php
include("../objects/Products.php");
$posts_object = new Posts($databaseHandler);

$title_IN = ( isset($_GET['name']) ? $_GET['name'] : '' );
//$content_IN = ( isset($_GET['content']) ? $_GET['content'] : '' );


/* if(!empty($title_IN)) {
    if(!empty($content_IN)) {

        $posts_object->addPost($title_IN, $content_IN);

    } else {
        echo "Error: content cannot be empty!";
    }
} else {
    echo "Error: titel cannot be empty!";
}

 */

?>