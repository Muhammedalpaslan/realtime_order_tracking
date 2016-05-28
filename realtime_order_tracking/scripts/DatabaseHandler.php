<?php

	class DatabaseHandler{
		var $user_info	= array("testuser1","testuser1");
		var $orders		= array(
								"0001" =>array(	"name"	=> "Coca Cola",
												"price"	=> 100,
												"quantity" => 12
								),
								"0002" => array(	"name"	=> "Pepsi Cola",
													"price"	=> 119,
													"quantity" => 12
											),
								
								"0003" => array(	"name"	=> "Royal",
													"price"	=> 145,
													"quantity" => 12
											),
								"0004" => array(	"name"	=> "Mug Rootbeer",
													"price"	=> 238,
													"quantity" => 12
											)
							);
		
		function check_login($username, $password){
			return $this->user_info[0] . $this->user_info[1] === $username . $password;
		}
		
		
		function getOrders(){
			return $this->orders;
		}
		
		function getOrderCount(){
			return count($this->orders);
		}
		
		function getOrderNamebyId($id){
			return $this->orders[$id]['name'];
		}

		function getOrderPricebyId($id){
			return $this->orders[$id]['price'];
		}
		
		function getOrderQuantitybyId($id){
			return $this->orders[$id]['quantity'];
		}

		function getSubTotal($id){
			return $this->orders[$id]['price'] * $this->orders[$id]['quantity'];
		}
		
		function getGrandTotal(){
			$gTotal = 0;
		
			foreach ($this->getOrders() as $orderItem)
			$gTotal += $orderItem['price'] * $orderItem['quantity'];
		
			return $gTotal;
		}
	}
?>