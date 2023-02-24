<?php
// connect to database
include 'config/database.php';
// include objects
include_once "objects/allproducts.php";
include_once "objects/images_product.php";
include_once "objects/items_for_cart.php";
// get database connection
$database = new My_database();
$db = $database->connect_Get();
// initialize objects
$product = new Allproducts($db);
$product_image = new Images_product($db);
$cart_item = new Items_for_cart($db);
// set page title
$page_title = "Checkout";
// include page header html
include 'head_view.php';
// $cart_count variable is initialized in navigation.php
if ($cart_count > 0) {
	$cart_item->user_id = "1";
	$stmt = $cart_item->read();
	$total = 0;
	$item_count = 0;
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		extract($row);
		$sub_total = $price * $amount;
		echo "<div class='cart-row'>
			    <div class='col-md-8'>
                    <div class='product-name m-b-10px'><h4>{$name}</h4></div>";
		echo $amount > 1 ? "<div>{$amount} items</div>" : "<div>{$amount} item</div>";
		echo "</div>";
		echo "<div class='col-md-4'>
				<h4>$" . number_format($price, 2, '.', ',') . "</h4>
			</div>
		</div>";
		$item_count += $amount;
		$total += $sub_total;
	}
	echo "<div class='col-md-12 text-align-center'>
		<div class='cart-row'>";
	if ($item_count > 1) {
		echo "<h4 class='m-b-10px'>Total ({$item_count} items)</h4>";
	} else {
		echo "<h4 class='m-b-10px'>Total ({$item_count} item)</h4>";
	}
	echo "<h4>$" . number_format($total, 2, '.', ',') . "</h4>
	        <a href='place_order.php' class='btn btn-lg btn-success m-b-10px'>
	        	<span class='glyphicon glyphicon-shopping-cart'></span> Place Order
	        </a>
		</div>
	</div>";
} else {
	echo "<div class='col-md-12'>
		<div class='alert alert-danger'>
			No products found in your cart!
		</div>
	</div>";
}
include 'footer_view.php';