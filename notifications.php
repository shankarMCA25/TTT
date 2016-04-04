<!DOCTYPE HTML>
<?php 
	$title ='notifications';
	include 'header.php';
	include 'Cashier_Index1.php';
	require_once 'dbconn.php';
?>
<html>
	
	<head><title>Notifcations</title></head>
	<body>
	
		<section id="main-content">
			<?php
			//SELECT DISTINCT (`Emp_id`)FROM  `transaction` WHERE  `Transaction_date` 
				$Agent_ids=$db->select("Transaction","DISTINCT(Emp_id)","transaction_type=1 and transaction_date BETWEEN '$yest 00:00:00.00' AND '$yest 23:59:59.999'");
					
					$Agent_info=$db->Select("Employee","Emp_id,Emp_name","Emp_type=3");
					foreach($Agent_info as $id)
					{
						$Account_info=$db->Select("Transaction","Account_no,Transaction_type,Amount","Emp_id='".$id['Emp_id']."'");
						{

		//				<!--collapse start-->
							echo '<div class="panel-group " id="accordion">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$id["Emp_id"].'">
												Agent ID :'.$id["Emp_id"].'	Agent Name:	'. $id["Emp_name"].' # Deposit
											</a>
										</h4>
									</div>
									<div id="collapse'.$id["Emp_id"].'" class="panel-collapse collapse">
										<div class="panel-body">
											<table class="table table-hover">
												<tr>
													<th>Account Number</th>
													<th>Transaction Type</th>
													<th>Transaction Amount</th>
												</tr>';
												foreach($Account_info as $info)
												echo '<tr>
													<th>'.$info["Account_no"].'</th>
													<th>'.$info["Transaction_type"].'</th>
													<th>'.$info["Amount"].'</th>
												</tr>';
												
											echo '</table>
										</div>
									</div>
								</div>
							</div>';
						}
					}
				//}
//				<!--collapse end-->
			?>
							  
			</section>


	</body>
	<?php 
		include 'footer.php';
	?>
</html>