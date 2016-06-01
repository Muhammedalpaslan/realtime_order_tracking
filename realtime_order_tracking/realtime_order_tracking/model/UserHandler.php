<?php
	require_once '..\\model\\DatabaseHandler.php';
	class UserHandler{		
		function checkUser(){
			if(!isset($_SESSION['nickname'])){
				if(!isset($_POST['txtusername']) || !isset($_POST['txtpassword'])){
					header("Location:..\\view\\Login.php");
					exit;
			
				}
				else{
					$this->login();
				}
			}
		}
		
		function login(){
			
			if($this->validateUser()){
				$_SESSION['nickname'] = $this->validateUser();
			}else{
				header("Location:..\\view\\Login.php?way=wrongpassword");
				exit;
			}
		}
		
		function validateUser(){
			$dbHandler = new DatabaseHandler();
			
			return $dbHandler->check_login($_POST['txtusername'], $_POST['txtpassword']);
		}
		
	}

?>