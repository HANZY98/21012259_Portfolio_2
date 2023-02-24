<?php
// get the product id
$product_id = isset($_GET['id']) ? $_GET['id'] : 1;
$amount = isset($_GET['amount']) ? $_GET['amount'] : "";
// make quantity a minimum of 1
$amount=$amount<=0 ? 1 : $amount;
// connect to database
include 'config/database.php';
// include object
include_once "objects/items_cart_item.php";
// get database connection
$database = new My_database();
$db = $database->connect_Get();
// initialize objects
$cart_item = new Items_for_cart($db);
// set cart item values
$cart_item->user_id=1; // we default to '1' because we do not have logged in user
$cart_item->product_id=$product_id;
$cart_item->amount=$amount;
// add to cart
if($cart_item->update()){
	// redirect to product list and tell the user it was added to cart
	header("Location: cart.php?updated");
}else{
	header("Location: cart.php?action=unable_to_update");
}