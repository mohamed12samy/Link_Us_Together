<?php

$id=$_POST["id3"];
$name=$_POST["name"];
$uname=$_POST["username"];
$email=$_POST["email"];


$con=mysqli_connect("localhost","root","","link-us-together");


$q=mysqli_query($con,"update users set name='$name',username='$uname',Email='$email' where id='$id' ");

if ($q)
{
    echo "update done";
}
else
{
	echo "Not Inserted";

}
?>