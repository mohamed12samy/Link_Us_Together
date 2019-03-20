<?php
session_start();
if($_SESSION['username']==null){header("Location: log in.html");}
require_once 'user_queries.php';

	$u = new user('','','','');
	
	$returnedPwd=$u->Select_all($_SESSION['username'])['pwd'];

	$curPwd=$_POST['pwd'];
$curPwd = md5($curPwd);

	if($curPwd == $returnedPwd){
		echo "Updated successfully ";

		$name=$_POST['name'];
		$email=$_POST['email'];
		$newPwd=$_POST['newpwd'];
		if($newPwd === ''){
			$newPwd=$curPwd;
		}
		$u->Update($name ,$email ,$newPwd);
		$_SESSION['name']=$name;
		header("Location: profile.php");
	}
	else
		echo "Update failed WRONG PASS ";

?>