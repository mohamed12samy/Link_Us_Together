<?php 
session_start();
if($_SESSION['username']==null){header("Location: log in.html");}
require_once 'user_queries.php'; 

$conn = mysqli_connect("localhost" , "root" , "" , "link-us-together");

$bio=$_POST['textbio'];
$bio = mysqli_real_escape_string($conn, $bio);
echo $bio."<br>";

$u = new user('','','','');
$u->Update_bio($bio);
header("Location: profile.php");
echo "<script>alert('Bio updated')</script>";
?>