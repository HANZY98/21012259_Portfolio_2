<?php
// include classes
include_once "config/database.php";
include_once "objects/items_for_cart.php";
// get database connection
$database = new My_database();
$db = $database->connect_Get();
// initialize objects
$cart_item = new Items_for_cart($db);
// remove all cart item by user, from database
$cart_item->user_id = 1; // we default to '1' because we do not have logged in user
$cart_item->deleteByUser();
// set page title
$page_title = "Thank You!";
// include page header HTML
include_once 'head_view.php';
// tell the user order has been placed
echo "<div class='col-md-12'>
	<div class='alert alert-success'>
		<strong>Your order has been placed!</strong> Thank you very much!
	</div>
</div>";
// include page footer HTML
include_once 'footer_view.php';