<?php

$con=mysqli_connect("localhost","root","","link-us-together");
$id=$_GET["id2"];
$q=mysqli_query($con,"select * from users where id=$id");

$row=mysqli_fetch_array($q);

echo "<center>"."name>>  ".$row["name"]."<br>"."username>>  ".$row["username"]."<br>"."email>>  ".$row["Email"]."<br>"."Bio>>  ".$row["Bio"]."</center>";

?>