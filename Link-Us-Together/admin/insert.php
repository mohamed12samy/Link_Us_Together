<?php

$name=$_POST["name"];
$Uname=$_POST["username"];
$email=$_POST["email"];
$pass=$_POST['password'];
$pass = md5($pass);


$con=mysqli_connect("localhost","root","","link-us-together");

        $select="SELECT * FROM users where username='$Uname' or Email='$email';";
        $result = mysqli_query($con,$select);
		$num_of_rows=mysqli_num_rows($result);

if($num_of_rows >0 ){echo "this user already exist...";}
else{
$q=mysqli_query($con,"insert into users (name, username,Email,pwd) values('$name','$Uname','$email','$pass')  ");
if ($q)
{
    echo "Insert done";
}
else
{
	echo "Not Inserted";

}
}
?>