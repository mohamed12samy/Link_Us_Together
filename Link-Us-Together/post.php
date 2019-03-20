<?php 
	session_start();
if($_SESSION['username']==null){header("Location: log in.html");}

	require_once 'post_queries.php';

	$p=new post();
	$p->insert_post();
	//$p->Select_post();
	header("Location: first.php?postAdded");
?>