<?php session_start(); 
if($_SESSION['username']==null){header("Location: log in.html");}
  require_once 'post_queries.php';
  require_once 'follow.php';

  
$u=new user('','','','');
  $pass=$_POST['pwd'];

  $returnedPwd=$u->Select_all($_SESSION['username'])['pwd'];

  if($pass == $returnedPwd){
		
		$p=new post();
		$p->delete_post();

		$f=new following();
		$f->deleteF();

		$u->Delete();

		session_unset();

		session_destroy();

		header("Location: log in.html");
	}
	else
		{echo "wrong";
	header("Location :setting.php");
}
?>