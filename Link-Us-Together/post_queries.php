<?php 
	require_once 'user_queries.php';
	
	class post {
		var $U ;
		var $conn ;

		private $paragraph;
		private $Ddate;
		private $U_id;

		function __construct(){
			$this->conn = mysqli_connect("localhost" , "root" , "" , "link-us-together");
			if ($this->conn->connect_errno) {
    		printf("Connect failed: %s\n", $this->conn->connect_error);
    		exit();}
    		//$text= $_POST['textPost'] ;
    		$this->U= new user('','','','');
    		$this->U_id=$this->U->Select_all($_SESSION['username'])['id'];

			
		}

		function insert_post(){
			$this->paragraph=$_POST['textPost'];
			$insertQ = "insert into post(paragraph,Ufk_id) values('".$this->paragraph."','".$this->U_id."');";
			mysqli_query($this->conn,$insertQ);
		}

		function Select_post($id){
			
			$sql="SELECT paragraph , Ddate FROM post where Ufk_id='$id' order by Ddate desc;";
			$result = mysqli_query($this->conn,$sql);
			$num_of_rows=mysqli_num_rows($result);
			$arr=array();
			for($i=0;$i<$num_of_rows;$i++)
			{
				$row=mysqli_fetch_array($result);
				$arr[$i][0]=$row["paragraph"/*id*/];
				$arr[$i][1]=$row["Ddate"/*id*/];
				//echo "<br>paragraph->>  ".$arr[$i][0]."<br> Ddate->>  ".$arr[$i][1];
			}
			
			//$this->disconnect();
			return $arr;
		}

		function Select_all_posts(){
			
			$sql="SELECT * FROM post where 1 order by Ddate desc;";
			$result = mysqli_query($this->conn,$sql);
			$num_of_rows=mysqli_num_rows($result);
			$arr=array();
			$U=new user('','','','');
			for($i=0;$i<$num_of_rows;$i++)
			{
				$row=mysqli_fetch_array($result);
				$arr[$i][0]=$row["paragraph"];
				$arr[$i][1]=$row["Ddate"];
				$arr[$i][2]=$row['Ufk_id'];
				$arr[$i][2]=$U->Select_allBYID($arr[$i][2])['username'];
				$arr[$i][3]=$U->Select_all($arr[$i][2])['imgpath'];
				$arr[$i][4]=$row['likeCounter'];
				$arr[$i][5]=$row['id'];
			}
			
			return $arr;
		}
        
		function update_counter($id,$s){
			$updateQ="UPDATE post SET likeCounter = likeCounter+$s WHERE id =$id;";
			mysqli_query($this->conn,$updateQ);
		}
		function delete_post(){
			$U=new user('','','','');
			$usname=$U->Select_all($_SESSION['username'])['id'];
			$DeleteQ="delete from post where Ufk_id ='$usname';";
			mysqli_query($this->conn,$DeleteQ);
		
		}
        
        function select_liked($un,$id){
			$selectQ="select * from likedpost WHERE P_id ='$id' and username='$un';";
			$res=mysqli_query($this->conn,$selectQ);
            $rows = mysqli_num_rows($res);
            return $rows;
		}
        function insert_liked($un,$id){
			$insertQ="insert into likedpost (username , P_id) values ('$un','$id') ;";
			mysqli_query($this->conn,$insertQ);
		}
        function delete_liked($un,$id){
			$DeleteQ="delete from likedpost WHERE P_id ='$id' and username='$un';";
			mysqli_query($this->conn,$DeleteQ);
		}
	
	}

?>