<?php 
session_start();
if($_SESSION['username']==null){header("Location: log in.html");}
require_once 'user_queries.php'; 


//$imgPath=$GET['imgpath'];

if(isset($_POST["submit"])) {
    $file = $_FILES["file"];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    
    if($fileError === 0 ){
    	if($fileSize < 1000000){
    		$fileNewName = uniqid('',true).".".$fileActualExt;
    		$fileDestination = 'img/uploadsimg/'.$fileNewName;
    		move_uploaded_file($fileTmpName, $fileDestination);
    	}
    }else{ echo "error on uploading";}
}
echo $fileDestination;

$u = new user('','','','');
$u->Update_img($fileDestination);
header("Location: profile.php");
echo "<script>alert('Photo updated')</script>";
?>