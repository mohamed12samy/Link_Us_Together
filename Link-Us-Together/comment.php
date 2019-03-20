<?php 
	require_once 'user_queries.php';

	class comment {
       
        //var $U ;
        var $conn ;
        
        private $cer_id;
		private $p_id;
        private $paragraph;
		private $Ddate;
		
    function __construct(){
        $this->conn = mysqli_connect("localhost" , "root" , "" , "link-us-together");
        if ($this->conn->connect_errno) {
        printf("Connect failed: %s\n", $this->conn->connect_error);
        exit();}
        $this->U= new user('','','','');
        $this->cer_id=$this->U->Select_all($_SESSION['username'])['id'];/*commenter id  currentuser*/
    }

		function insert_com(){
			$this->paragraph=$_GET['textcom'];
            $this->p_id=$_GET['PID'];
			$insertQ = "insert into comment(UFK_id ,PFK_id ,txt) values('".$this->cer_id."','".$this->p_id."','".$this->paragraph."');";
			mysqli_query($this->conn,$insertQ);
            header("Location: first.php?insertionDone");
		}

		function Select_all_comms(){
			
			$sql="SELECT * FROM comment where 1 order by Ddate desc;";
			$result = mysqli_query($this->conn,$sql);
			$num_of_rows=mysqli_num_rows($result);
			$arr=array();
			$U=new user('','','','');
			for($i=0;$i<$num_of_rows;$i++)
			{
				$row=mysqli_fetch_array($result);
				$arr[$i][0]=$row["UFK_id"];
                $arr[$i][0]=$U->Select_allBYID($arr[$i][0])['username']; //commer username
                $arr[$i][1]=$U->Select_all($arr[$i][0])['imgpath']; //commer image
				$arr[$i][2]=$row["PFK_id"];
				$arr[$i][3]=$row['txt'];
				$arr[$i][4]=$row['DDate'];
				$arr[$i][5]=$row['c_id'];
			}
            return $arr;
		}
	}

?>