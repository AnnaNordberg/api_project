<?php
include('../objects/Cart.php');
include('../objects/Users.php');

$cart_object = new Cart($databaseHandler);


$user_handler = new User($databaseHandler);
$token = $_POST['token'];
if($user_handler->validateToken($token) === false) {
    echo "Invalid token!";
    die;
}

echo "<pre>";
print_r($posts_object->fetchAllPosts());
echo "</pre>";



?>