<!DOCTYPE HTML>

<?php
require_once 'scripts/DatabaseHandler.php';

$dbHandler = new DatabaseHandler();

?>


<html>
	<head>
	
	<link rel = "stylesheet"  type="text/css" href="styles/basic_style.css"/>
	
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
					<td class = "orderHeader">ORDER SUBTOTAL</td>
				</tr>
				<?php 
					foreach ($dbHandler->getOrders() as $orderId => $orderInfo){
						ECHO '	<tr class = "orderItem" style= "background-color:' . 
																($orderId % 2 ? "#FFFFFF":"#F0F0F0"). '">' .
									'<td class = "orderId">' . $orderId . '</td>' .
									'<td class = "orderName">' . $orderInfo["name"] . '</td>' .
									'<td class = "orderPrice">' . number_format($orderInfo["price"],2) . '</td>' .
									'<td class = "orderQuantity">' . number_format($orderInfo["quantity"],2) . '</td>' .
									'<td class = "orderSubTotal">' . number_format($dbHandler->getSubTotal($orderId),2) . '</td>' . 
								'</tr>';
					}
				?>
			
				<tr>
						<td class = "orderFooter"></td>
						<td class = "orderFooter"></td>
						<td class = "orderFooter"></td>
						<td class = "orderFooter">GRAND TOTAL</td>
						<td class = "orderGtotal"><?php ECHO number_format($dbHandler->getGrandTotal(),2)?></td>
				</tr>	
			</table>
			
		</div>
		
		<div class = "footer">
		
		</div>	
	</body>
</html>