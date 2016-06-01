<?php
require_once '../model/DatabaseHandler.php';

	$dbHandler = new DatabaseHandler();
	
	if ($dbHandler->check_login($_POST{'txtusername'}, $_POST{'txtpassword'}))
	{
		session_start();
		$_SESSION['username'] = $_POST{'txtusername'};
		
		//header("Location:http://localhost/PHP_Workplaces/small_projects/realtime_order_tracking/order_tracker.php"); /* Redirect browser */
		header("Location:http://localhost/realtime_order_tracking/order_tracker.php"); /* Redirect browser */
		exit();
	}
	else 
	{
		
		//header("Location:http://localhost/PHP_Workplaces/small_projects/realtime_order_tracking/Login.php?way=wrongpassword"); /* Redirect browser */
		header("Location:http://localhost/realtime_order_tracking/Login.php?way=wrongpassword"); /* Redirect browser */
		
		exit();
	}

?>