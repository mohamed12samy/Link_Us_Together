<?php 
session_start();
require_once 'user_queries.php';

class signup extends user {
	
	private $name;
	private $username;
	private $email;
	private $password;

	function __construct(){

			$_SESSION['username']=$_POST['username'];
			$_SESSION['name']=$_POST['Fusername'] ." ". $_POST['Lusername'];

			$pass=$_POST['password'];
			$pass=md5($pass);

			parent::__construct($_POST['Fusername'] . $_POST['Lusername'],$_POST['username'],$_POST['email'],$pass); 
			$this->Select_username(); 
			$this->Insert();
	}
		////////////////////////////////////////////////////////////////////////
	function Insert(){
     	parent::Insert();
     	header("Location: first.php");
	}
	
	function Select_username(){
		$rows=parent::Select_username();
		if($rows > 0){
				header("Location: Sign up.html?usernameOREmailExists");
				exit();
			}
		}	
}

$u = new signup();
?>