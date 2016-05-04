
<!DOCTYPE html>
<!--weekly Graph---->
	<?php
		require_once 'dbconn.php';
		$db = new dbconn();
		
		$today_date=getdate();
		$date=array();
		$graph_data=array();
		for($x = 6; $x > 0; $x--)
		{
			$date[$x]=date('Y-m-d',strtotime("-$x days"));
		}
	/*	for($x = 6; $x > 0; $x--)
		{
			echo $date[$x].'\n';
		}*/
		for($x = 6; $x > 0; $x--)
		{
			$graph_data[$x][1]=$db->select("Transaction","Sum(Amount)","transaction_type=1 and transaction_date BETWEEN '$date[$x] 00:00:00.00' AND '$date[$x] 23:59:59.999'")[0]['Sum(Amount)'];
			$graph_data[$x][2]=$db->select("Transaction","Sum(Amount)","transaction_type=0 and transaction_date BETWEEN '$date[$x] 00:00:00.00' AND '$date[$x] 23:59:59.999'")[0]['Sum(Amount)'];
			echo 'Deposit: -';
			echo $graph_data[$x][1]==""?0:$graph_data[$x][1];
			echo ' withdraw:- ';
			echo $graph_data[$x][2]==""?0:$graph_data[$x][2];
			echo '<br>';
			
		}
		
		
	?>
		<body>
			<!--main content start-->
      		<section id="main-content">
     		 	<section class ="wrapper" style="width:100%;height:100%">
     		 		<div> 
     			</div>
				</section>
			</section>
     		 	<?php include 'footer.php';?>
			</body>
	</html>