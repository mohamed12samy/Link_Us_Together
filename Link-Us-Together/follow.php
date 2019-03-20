<?php 
	
	require_once 'user_queries.php';
	
class following{
		
	var $u;
	function __construct(){
		$this->u = new user('','','','');
	}

	function insertF(){
	$insertQ="insert into follow(U_name , FU_name) values('".$_SESSION['username']."' ,'".$_SESSION['GUN']."');" ;
	mysqli_query($this->u->conn,$insertQ);
	}
	function Select_all($uname , $ufname){//USING TO GET POSTS OF THIS USER
	
        $sql="SELECT * FROM follow where U_name='$uname' and FU_name='$ufname';";
		$result = mysqli_query($this->u->conn,$sql);
		$row=mysqli_fetch_array($result);
		
		return $row;
	}

	function deleteF(){
		$un=$_SESSION['username'];
		//$fun=$_SESSION['GUN'];
		$DeleteQ="DELETE FROM follow WHERE U_name='$un' ;";
		mysqli_query($this->u->conn,$DeleteQ);
	}
}
?>