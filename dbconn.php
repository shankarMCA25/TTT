<?php
	//In login 1 manager 2 officer 3 agent 4 account holders

	
	$servername = "localhost";
	$username = "root";
	$pass = "";
	$dbname="pigmy";
	class dbconn {
			private $conn;
			private $errno;
			public function __construct()
			{
				global $servername;
				global $username;
				global $pass;
				global $dbname;		
				
				$this->conn = new mysqli($servername, $username, $pass, $dbname);

				// Check connection
				if ($this->conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				} 
				

//				$this->conn = mysqli_connect($servername,$username,$password,$dbname);
//				if($this->conn->mysqli_connect_errno())
//				{
//					echo "Failed to connect to MySQL: " . mysqli_connect_error();
//				}
//			}
			}
			public function insert($table_name="",$col="*",$values="")
			{
				//when a new agent is added get the agent type and insert into loging and employee table
				$sql="INSERT into $table_name($col) values($values)";
				$res=$this->conn->query($sql);
				if($res ===true){
					return true;
				}	
				else{
					return $this->conn->mysqli_connect_error();
				}
			}
			public function select($table_name="",$col="*",$where="1")
			{
				$sql="Select $col from $table_name where $where";
				//echo $sql;
				$res=$this->conn->query($sql);
				if ($res->num_rows >0 )
				{
					$result=array();
					$count=0;
					while($row=$res->fetch_assoc())
						$result[$count++]=$row;
					return $result;
				}
				else{
					return false;
				}
			}
			public function update_emp_status($table_name="",$col="*",$where="1")
			{
				$sql="UPDATE  $table_name SET  $col WHERE  $where";
				
				$res=$this->conn->query($sql);
				if($res)
					return true;
				else 
					return false;
			}
			public function remove_acc($table_name="",$col="*",$where="1")
			{
				$sql="UPDATE  $table_name SET  $col WHERE  $where";
				echo '<script> alert('.$sql.')</script>';
				return true;
				/*$res=$this->conn->query($sql);
				if($res)
					return true;
				else 
					return false;*/
			}
	}

?>