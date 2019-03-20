<?php

$id=$_GET["id2"];

$con=mysqli_connect("localhost","root","","link-us-together");


$q=mysqli_query($con,"delete from users where id=$id");

if ($q)
{
	echo "Acount Deleted";
}
else
{
	echo "Not Deleted";

}


?>