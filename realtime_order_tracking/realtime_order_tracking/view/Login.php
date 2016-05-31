<?php
	require_once '..\\controller\\LoginController.php';
	
	session_start();

	$controller = new LoginController();
	
	if(isset($_GET{'way'}))
	$controller->isLoggingout($_GET{'way'});
	
?>


<html>
	<head>
	
	</head>
	<body>
	
		<form action="OrderTracker.php" method = "post">
		
			<span class = "lbllogin"> LOGIN </span><br/>
			<span class = "lblusername">USERNAME</span>
			<input type="text" name = "txtusername" value = ""><br/>
			<span class = "lblpassword">PASSWORD</span>
			<input type = "password" name ="txtpassword" value = ""><br/>
			<?php
			if (isset($_GET{'way'}))
			{
				if($controller->isWrongPassword($_GET{'way'}))
					ECHO "<span class = 'warning'><BR>Invalid username or Password<BR></span>";
			}
			?>
			<input type ="submit" name = "sumbit">
		</form>
	</body>
</html>