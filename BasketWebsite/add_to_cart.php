<?php
// parameters
$product_id = isset($_GET['id']) ? $_GET['id'] : "";
$amount = 1;
// connect to database
include 'config/database.php';
// include object
include_once "objects/items_for_cart.php";
// get database connection
$database = new My_database();
$db = $database->connect_Get();
// initialize objects
$cart_item = new Items_for_cart($db);
// set cart item values
$cart_item->user_id = 1; // we default to '1' because we do not have logged in user
$cart_item->product_id = $product_id;
$cart_item->amount = $amount;
// check if the item is in the cart, if it is, do not add
if ($cart_item->exists()) {
	// redirect to product list and tell the user it was added to cart
	header("Location: cart.php?action=exists");
}
// else, add the item to cart
else {
	// add to cart
	if ($cart_item->create()) {
		// redirect to product list and tell the user it was added to cart
		header("Location: cart.php?id={$product_id}&action=added");
	} else {
		header("Location: cart.php?id={$product_id}&action=unable_to_add");
	}
}