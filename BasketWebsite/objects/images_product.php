<?php
// 'product image' object
class Images_product{
	// database connection and table name
	private $conn;
	private $table_name = "images_product";
	// object properties
	public $id;
	public $product_id;
	public $name_of_prod;
	public $timestamp;
	// constructor
	public function __construct($db){
		$this->conn = $db;
	}

  function readFirst(){
    // select query
    $query = "SELECT id, product_id, name_of_prod
        FROM " . $this->table_name . "
        WHERE product_id = ?
        ORDER BY name_of_prod DESC
        LIMIT 0, 1";
    // prepare query statement
    $stmt = $this->conn->prepare( $query );
    // sanitize
    $this->id=htmlspecialchars(strip_tags($this->id));
    // bind prodcut id variable
    $stmt->bindParam(1, $this->product_id);
    // execute query
    $stmt->execute();
    // return values
    return $stmt;
  }
}