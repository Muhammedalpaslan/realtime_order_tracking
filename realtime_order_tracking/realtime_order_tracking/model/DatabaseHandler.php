<?php

	class DatabaseHandler{
		var $username, $password;
		var $host, $current_DB;
		
		function __construct($host='localhost', $username = 'order_tracker_user', $password = 'order_tracker_pw', $db = 'realtime_order_tracker_db'){
			$this->host = $host;
			$this->username = $username;
			$this->password = $password;
			$this->db = $db;
			
		}
		
		function connectDB(){
			$db = new mysqli($this->host, $this->username, $this->password, $this->db);
			
			/* check connection */
			if (mysqli_connect_errno()) {
				printf("Connect failed: %s\n", mysqli_connect_error());
				exit();
			}
			
			return $db;
			
		}
		
		function check_login($username, $password){
			$db = $this->connectDB();
			
			$statement = mysqli_prepare($db,"SELECT nickname FROM users WHERE username = ? AND password = ?");
			$statement->bind_param('ss',$username,MD5($password));
			$statement->execute();
			
			$nickname = $statement->get_result();
			
			$db->close();
			return $nickname;
		}
		
		
		function getOrders(){
			$db = $this->connectDB();
				
			$statement = mysqli_prepare($db,"SELECT a.order_id , b.item_name, b.item_price, 
											a.order_quantity, a.order_eta 
											FROM orders a 
											INNER JOIN items b ON a.order_item = b.item_id");
			$statement->execute();
			$result = $statement->get_result();
			
			while($row = MYSQLI_fetch_ASSOC($result)){
				$orders[] = $row;
			}
			
			$db->close();
			return $orders;
		}

		function getSubTotal($id){
			return $this->orders[$id]['price'] * $this->orders[$id]['quantity'];
		}
		
		function getGrandTotal(){
			$db = $this->connectDB();
			$gTotal = 0;
		
			$statement = mysqli_prepare($db,"SELECT SUM(a.order_quantity * b.item_price) AS GRAND_TOTAL
											FROM orders a 
											INNER JOIN items b ON a.order_item = b.item_id");
			$statement->execute();
			$result = $statement->get_result();
			
			while($row = MYSQLI_fetch_ASSOC($result)){
				$gTotal = $row['GRAND_TOTAL'];
			}
			
			$db->close();
		
			return $gTotal;
		}
	}
?>