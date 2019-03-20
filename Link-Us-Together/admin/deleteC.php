<?php

$id=$_GET["id2"];

$con=mysqli_connect("localhost","root","","link-us-together");


$q=mysqli_query($con,"delete from comment where c_id=$id");

if ($q)
{
	echo "Comment Deleted";
}
else
{
	echo "Not Deleted";

}


?>