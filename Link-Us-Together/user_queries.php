<?php

class user 
{
		var $conn ;
		
		private $name;
		private $username;
		private $email;
		private $passWord;
		private $Bio;
		private $pic;

		 function __construct($name , $username,$email , $pwd){//FOR SIGNING UP
			
			$this->conn = mysqli_connect("localhost" , "root" , "" , "link-us-together");
			if ($this->conn->connect_errno) {
    		die("connection error");
    		exit();}

    		$this->name=$name;
    		$this->username=$username;
    		$this->email=$email;
    		$this->passWord=$pwd;
    		
		}
		function Construct($username  , $pwd){//FOR LOG IN
			$this->conn = mysqli_connect("localhost" , "root" , "" , "link-us-together");
			if ($this->conn->connect_errno) {
			printf("Connect failed: %s\n", $this->conn->connect_error);
			exit();}
			$this->username=$username;
			$this->passWord=$pwd;
		}
/*******************************FUNCTIONS QUERIES**************************************/
    
	function Select_username(){//CHECK IF THE USERNAME OR THE EMAIL ARE ALLREADY EXISTS FOR SIGN UP
		
		$select="SELECT * FROM users where username='".$this->username."' or Email='".$this->email."';";
        $result = mysqli_query($this->conn,$select);
		$num_of_rows=mysqli_num_rows($result);
	
		return $num_of_rows;
	}

	function Select_pwd_UN(){//CHECK  IF THE USERNAME AND PASSOWRD FIT OR NOT EXIST TO LOG IN
		$sql="select * from users where username='".$this->username."' and pwd='".$this->passWord."';";
		$result = mysqli_query($this->conn,$sql);
		
        
        $num_of_rows=mysqli_num_rows($result);
		if($num_of_rows<=0)return $num_of_rows;
		$row=mysqli_fetch_array($result);
		$name=$row['name'];
		
		return $name;		
	}

	function Select_all($username){//USING TO GET POSTS OF THIS USER
		$sql="SELECT * FROM users where username='$username';";
			$result = mysqli_query($this->conn,$sql);
			$row=mysqli_fetch_array($result);
			
			return $row;
		}
	function Select_allBYID($U_id){//USING TO GET POSTS OF THIS USER
		$sql="SELECT * FROM users where id='$U_id';";
			$result = mysqli_query($this->conn,$sql);
			$row=mysqli_fetch_array($result);
			
			return $row;
		}
	function Insert(){
		//$insertQ="insert into users(name , username,Email , pwd) values('". $this->name."','".$this->username."','".$this->email."','".$this->passWord."');";
		//mysqli_query($this->conn,$insertQ);
		//$this->disconnect();
        $stmt="insert into users(name , username,Email , pwd) values(?,?,?,?);";
        $insertQ=$this->conn->prepare($stmt);
        $insertQ->bind_param("ssss",$this->name,$this->username,$this->email,$this->passWord);
        $insertQ->execute();
	}

	function Update($Name  ,$email, $pass){
		//$updateQ="UPDATE users SET  name='$Name' , username='".$_SESSION['username']."' , Email='$email' ,pwd='$pass' WHERE username ='".$_SESSION['username']."';";
		//mysqli_query($this->conn,$updateQ);
        $tmt="UPDATE users SET  name=? , Email=? ,pwd=? WHERE username ='".$_SESSION['username']."';";
        $updateQ=$this->conn->prepare($tmt);
        $updateQ->bind_param("sss",$Name,$email,$pass);
        $updateQ->execute();
	}
	function Update_bio($Bio){
		//$updateQ="UPDATE users SET Bio='$Bio' WHERE username ='".$_SESSION['username']."';";
		//mysqli_query($this->conn,$updateQ);
        $tmt="UPDATE users SET  Bio=? WHERE username ='".$_SESSION['username']."';";
        $updateQ=$this->conn->prepare($tmt);
        $updateQ->bind_param("s",$Bio);
        $updateQ->execute();
	}
	function Update_img($imgPath){
		//$updateQ="UPDATE users SET imgpath='$imgPath' WHERE username ='".$_SESSION['username']."';";
		//mysqli_query($this->conn,$updateQ);
		$tmt="UPDATE users SET  imgpath=? WHERE username ='".$_SESSION['username']."';";
        $updateQ=$this->conn->prepare($tmt);
        $updateQ->bind_param("s",$imgPath);
        $updateQ->execute();
	}

	function Delete(){
		$usname=$_SESSION['username'];
		$DeleteQ="delete from users where username ='$usname';";
		mysqli_query($this->conn,$DeleteQ);
	}
}
?>