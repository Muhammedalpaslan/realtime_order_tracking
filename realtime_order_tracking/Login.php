<?php 
	session_start();

	if (isset($_GET{'way'}))
	{
		if (ABS(strcmp($_GET{'way'} , 'logout')))
		{
			session_destroy();
		}
	}
?>


<html>
	<head>
	
	</head>
	<body>

	
		<form action="scripts/validator.php" method = "post">
		
			<span class = "lbllogin"> LOGIN </span><br/>
			<span class = "lblusername">USERNAME</span>
			<input type="text" name = "txtusername" value = ""><br/>
			<span class = "lblpassword">PASSWORD</span>
			<input type = "password" name ="txtpassword" value = ""><br/>
			<?php
			if (isset($_GET{'way'}))
			{
			if(!ABS(strcmp($_GET{'way'} ,'wrongpassword'))){
				ECHO "		<span class = 'warning'>
							<BR>Invalid username or Password<BR>
							</span>";
				}
			}
			?>
			<input type ="submit" name = "sumbit">
		</form>
	</body>
</html>