<?php

$con=mysqli_connect("localhost","root","","link-us-together");
$id=$_GET["id2"];
$q=mysqli_query($con,"select * from post where id=$id");

$row=mysqli_fetch_array($q);

echo "<center>"."post>>  ".$row["paragraph"]."<br>"."post maker id  >>  ".$row["Ufk_id"]."<br>"."post published date>>  ".$row["Ddate"]."<br>"."post id>>  ".$row["id"]."</center>";

?>