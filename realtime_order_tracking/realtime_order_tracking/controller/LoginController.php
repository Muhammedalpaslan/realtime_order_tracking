<?php

class LoginController{



	function isLoggingout($wayMessage){
		if (ABS(strcmp($_GET{'way'} , '$wayMessage')))
			session_destroy();
		return;
	}
	
	
	function isWrongPassword($wayMessage){
		return !ABS(strcmp($_GET{'way'} ,'wrongpassword'));
	}


}


?>