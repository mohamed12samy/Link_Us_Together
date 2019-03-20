<?php

$id=$_GET["id2"];

$con=mysqli_connect("localhost","root","","link-us-together");



$q=mysqli_query($con,"select * from users where id=$id");

$row=mysqli_fetch_array($q);

?>


<form action="update.php" method="post">

<input type="hidden" name="id3" value="<?php echo $id;?>">
Name
<input type="text" name="name" id="name" value="<?php echo $row["name"];?>">
<br>
username
<input type="text" name="username" id="username" value="<?php echo $row["username"];?>">
<br>
email
<input type="text" name="email" id="uname" value="<?php echo $row["Email"];?>">
<br>

<input type="submit" value="update">
</form>