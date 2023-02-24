<?php
// set page title

// for database connection
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
// action and pagination will be here

// action for custom messages
$action = isset($_GET['action']) ? $_GET['action'] : "";
// for pagination purposes
$page = isset($_GET['page']) ? $_GET['page'] : 1; // page is the current page, if there's nothing set, default is page 1
$records_per_page = 6; // set records or rows of data per page
$from_record_num = ($records_per_page * $page) - $records_per_page; // calculate for the query LIMIT clause

$page_title="All Products";
// page header html
include 'head_view.php';
// contents will be here 
// read all products in the database
$stmt=$product->read($from_record_num, $records_per_page);
// count number of retrieved products
$num = $stmt->rowCount();
// if products retrieved were more than zero
if($num>0){
	// needed for paging
	$page_url="allmyproducts.php?";
	$total_rows=$product->count();
	// show products
	include_once "read_products_template.php";
}
// tell the user if there's no products in the database
else{
	echo "<div class='col-md-12'>
    	<div class='alert alert-danger'>No products found.</div>
	</div>";
}
// layout footer code
include 'footer_view.php';
?>