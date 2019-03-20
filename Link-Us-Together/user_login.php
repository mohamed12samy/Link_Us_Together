<?php
session_start();


	require_once 'user_queries.php';

	class login extends user{

		function __construct($username,$password){
		$username= $_POST['username'] ;
		$password = $_POST['password'];
		$password = md5($password);
		//$rememberme = $_POST['Remember_me'];

		parent::Construct($username,$password);
		$this->Select_pwd_UN();	
	}

	function Select_pwd_UN(){
     $rows=parent::Select_pwd_UN();
		if($rows<=0 && !is_string($rows)){
			header("Location: log in.html?usernamenotExists");
			exit();
    }
    $_SESSION['username']=$_POST['username'];
    $_SESSION['name']=$rows;

  //  if(isset($_POST['Remember_me']){
    //	setcookie(name)
    //}
    
    if (strpos($_POST['username'], 'admin') !== false) {
        header("Location: admin.php");
    }
        else{header("Location: first.php");}
}
}
	$ll = new login('','');
?>