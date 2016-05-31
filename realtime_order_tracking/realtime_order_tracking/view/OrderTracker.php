<!DOCTYPE HTML>

<?php
require_once '..\\controller\\OrderTrackerController.php';
require_once '..\\model\\UserHandler.php';

session_start();

$controller = new OrderTrackerController();

$userHandler = new UserHandler();

$userHandler->checkUser();



?>


<html>
	<head>
	
	<link rel = "stylesheet"  type="text/css" href="../styles/basic_style.css"/>
	
	</head>
	<body>
		<div class = "nav">
			<img src = ''/>
			<span class = "blackspace"></span>
			<span class = "title">Company Name Tracker</span>
			<a class = "logout" href= "Login.php?way=logout">LOGOUT</a>
		</div>
		
		<div class = "main">
			<table class = "orderTable">
				<tr>
					<td class = "orderHeader">ORDER ID</td>
					<td class = "orderHeader">ORDER NAME</td>
					<td class = "orderHeader">ORDER PRICE</td>
					<td class = "orderHeader">ORDER QUANTITY</td>
					<td class = "orderHeader">ORDER ETA</td>
					<td class = "orderHeader">ORDER SUBTOTAL</td>
				</tr>
				<?php 
					foreach ($controller->getOrders() as $orderInfo){
						ECHO '	<tr class = "orderItem" style= "background-color:' . 
																($orderInfo["order_id"] % 2 ? "#FFFFFF":"#F0F0F0"). '">' .
									'<td class = "orderId">' . $orderInfo["order_id"] . '</td>' .
									'<td class = "orderName">' . $orderInfo["item_name"] . '</td>' .
									'<td class = "orderPrice">' . number_format($orderInfo["item_price"],2) . '</td>' .
									'<td class = "orderQuantity">' . number_format($orderInfo["order_quantity"],2) . '</td>' .
									'<td class = "orderETA">' . $orderInfo["order_eta"] . '</td>' .
									'<td class = "orderSubTotal">' . number_format($controller->getSubTotal($orderInfo["item_price"], $orderInfo["order_quantity"]),2) . '</td>' . 
								'</tr>';
					}
				?>
			
				<tr>
						<td class = "orderFooter"></td>
						<td class = "orderFooter"></td>
						<td class = "orderFooter"></td>
						<td class = "orderFooter"></td>
						<td class = "orderFooter">GRAND TOTAL</td>
						<td class = "orderGtotal"><?php ECHO number_format($controller->getGrandTotal(),2)?></td>
				</tr>	
			</table>
			
		</div>
		
		<div class = "footer">
		
		</div>	
	</body>
</html>