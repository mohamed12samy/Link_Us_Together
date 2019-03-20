<?php

$con=mysqli_connect("localhost","root","","link-us-together");
$id=$_GET["id2"];
$q=mysqli_query($con,"select * from comment where c_id=$id");

$row=mysqli_fetch_array($q);

echo "<center>"."comment>>  ".$row["txt"]."<br>"."comment maker id  >>  ".$row["UFK_id"]."Post id  >>  ".$row["PFK_id"]."<br>"."comment published date>>  ".$row["DDate"]."<br>"."comment id>>  ".$row["c_id"]."</center>";

?>