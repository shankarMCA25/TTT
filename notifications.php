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
				$Agent_ids=$db->select("Transaction","DISTINCT(Emp_id)","transaction_type=1 and transaction_date BETWEEN '$yest 00:00:00.00' AND '$yest 23:59:59.999'");
				//Check If Any agents have done any kind of transaction on Yesterday's day
				if($Agent_ids)
				{
					//Select Empid and name of agents and show those who have performed transaction
					$Agent_info=$db->Select("Employee","Emp_id,Emp_name","Emp_type=3");
					foreach($Agent_info as $id)
					{
						$Account_info=$db->Select("Transaction","Account_no,Transaction_type,Amount","Emp_id='".$id['Emp_id']."' and transaction_date BETWEEN '$yest 00:00:00.00' AND '$yest 23:59:59.999'");
						if($Account_info)
						{

					$total_deposit=$db->Select("Transaction","SUM(Amount) as Deposit_amt","Emp_id='".$id['Emp_id']."' and transaction_date BETWEEN '$yest 00:00:00.00' AND '$yest 23:59:59.999' and Transaction_type=1");
					$total_withdrawal=$db->Select("Transaction","SUM(Amount) as Withdrawal_amt","Emp_id='".$id['Emp_id']."' and transaction_date BETWEEN '$yest 00:00:00.00' AND '$yest 23:59:59.999' and Transaction_type=0");
					
			//				<!--collapse start-->
								echo '<div class="panel-group" id="accordion">
									<div class="panel panel-default">
										<div class="panel-heading">
											<h4 class="panel-title">
												<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$id["Emp_id"].'">
													<strong>Agent ID : </strong>&nbsp;&nbsp'.$id["Emp_id"].'&nbsp;&nbsp;<strong>Agent Name:</strong>&nbsp;&nbsp;'. $id["Emp_name"].'
												</a>
												<a class="pull-right"><strong>Deposit: </strong>'.$total_deposit[0]['Deposit_amt'].' <strong>Withdrawal:</strong>'.
												$total_withdrawal[0]["Withdrawal_amt"].'</a>
											</h4>

												
										</div>
										<div id="collapse'.$id["Emp_id"].'" class="panel-collapse collapse">
											<div class="panel-body">
												<table class="table table-hover">
													<tr>
														<th>Account Number</th>
														<th>Transaction Amount</th>
														<th>Transaction Type</th>
													</tr>';
													foreach($Account_info as $info)
													echo '<tr>
														<th>'.$info["Account_no"].'</th>
			
														<th>'.$info["Amount"].'</th>
														<th style="'.(($info["Transaction_type"]=='0')?"background-color:#ffe0e6":"background-color:#dff8e3").'">'.
															(($info["Transaction_type"]=='0')?"Withdrawal":"Deposit")
															.'</th>
													</tr>';
													
												echo '</table>
												
											</div>
										</div>
									</div>
								</div>';
						}
							
					}
					
				}
				//If no agents have done any kind of transaction on Yesterday's day
				else
				{
					echo "<script>alert('No agents performed any transaction');</script>
					<center><h1 >No agents performed any transaction</h1></center>
					";
				}					
				
//				<!--collapse end-->
			?>
							  
			</section>


	</body>
	<?php 
		include 'footer.php';
	?>
</html>