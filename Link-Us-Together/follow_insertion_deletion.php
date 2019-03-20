<?php
session_start();
if($_SESSION['username']==null){header("Location: log in.html");}

	require_once 'follow.php';

	$_SESSION['prevloc'] = "follow_insertion_deletion";

	$f = new following();

	if($f->Select_all($_SESSION["username"] ,$_SESSION['GUN'])){
		$f->deleteF();
		header("Location: guest_profile.php");
	}
	
	elseif(!$f->Select_all($uname , $ufname)){
	$f->insertF();
	header("Location: guest_profile.php");
	}
?>