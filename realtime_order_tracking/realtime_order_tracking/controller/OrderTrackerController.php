<?php
require_once '..\\model\\DatabaseHandler.php';


class OrderTrackerController{
	var $dbHandler;
	
	function __construct(){
		$this->dbHandler = new DatabaseHandler();
	}
	
	function  getOrders(){
		return $this->dbHandler->getOrders();
	}
	
	function getOrderCount(){
		return $this->dbHandler->getOrderCount();
	}

	
	function getSubTotal($price, $quantity){
		return $price* $quantity;
	}
	
	function getGrandTotal(){
		return $this->dbHandler->getGrandTotal();
	}
	
}

?>