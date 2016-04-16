<!DOCTYPE html>

	<?php
	$title ='Detail Agent Report';
	include 'header.php';
	include 'Cashier_Index1.php';
	require_once 'dbconn.php';
	?>
	<body>
			<?php 	$agent_id=$_POST['Agentid'];
					$agent_sdate=$_POST['Agent_sdate'];
					$agent_edate=$_POST['Agent_edate']; 
					if(isset($_POST["Agent_date_wise_report"])){
				$res=$db->select("Employee","*","Emp_id = $agent_id And Emp_type=3");
				if($res)
				{	
						
					echo '<script>alert("Agent ID"); </script>';	
				}
				else
					{
						echo '<script>alert("Invalid Agent ID"); window.location.href="cashierdatewisereport.php";</script>';
					}
				}
			?>
			<!--main content start-->
      		<section id="main-content">
				<h2 class="page-header">Welcome to date wise report generation</h2>
				<?php
					$agent_name=$res[0]['Emp_name'];
					$agent_address=$res[0]['Emp_address'];
					$agent_email=$res[0]['Emp_email'];
					$agent_contact_no=$res[0]['Emp_contact'];
					$agent_type=$res[0]['Emp_type'];
					$agent_status=$res[0]['Emp_Status'];
				?>
                    <!--Div to display report results-->
					<section class="wrapper-no-margin">
						<div class="row">
						<!-- profile-widget -->
							<div class="col-lg-12">
								<div class="profile-widget profile-widget-info">
									<div class="panel-body">
										<div class="col-lg-2 col-sm-2">
											<!--Name above image-->
											<h4><?php echo $agent_name; ?></h4>               
											<div class="follow-ava">
												<img src="img/profile-widget-avatar.jpg" alt="">
											</div>
											<!--Agent type-->
											<h6>Agent type : Collection Agent </h6>
										</div>
										<div class="col-lg-4 col-sm-4 follow-info">
										<!--Agent ID-->
											<p>Agent Id : <?php echo $agent_id?></p>
											<!--Agent Email-->
											<p>Agent email : <?php echo $agent_email?></p>
											<h6>
												<span><i class="icon_calendar"></i>Joining date 25.10.13</span><p></p><p>
												<span><i class="icon_pin_alt"></i>Address : <?php echo $agent_address?></span></p>
											<h6>
										</div>
										<div class="col-lg-2 col-sm-6 follow-info weather-category">
											<ul>
												<li class="active">
													<i class="fa fa-comments fa-2x"> </i>
													<br><br>
													Agent Status :: <?php if($agent_status){
													echo 'Currently Active';
													}
													else
													{
													echo 'Currently Inactive';}?>
												</li>

											</ul>
										</div>
											<div class="col-lg-2 col-sm-6 follow-info weather-category">
												<ul>
													<li class="active">
														<i class="fa fa-bell fa-2x"> </i><br>
														No of Active Accounts Assigned<br><?php if($agent_status){
														$acc_ass=$db->select("Accounts","Count(Account_no) as acc_assign","emp_id=$agent_id");
													echo $acc_ass[0]['acc_assign'];
													}
													else
													{
													echo '0';}?>
													</li>
												</ul>
											</div>
											<div class="col-lg-2 col-sm-6 follow-info weather-category">
													  <ul>
														  <li class="active">
															  
															  <i class="fa fa-tachometer fa-2x"> </i><br>
																Current daily Assigned Collection: <?php $tot_daily_coll=$db->select("Accounts","SUM(Daily_amt) as total_coll","Emp_id=$agent_id");
																echo $tot_daily_coll[0]['total_coll'];?>
														  </li>
														   
													  </ul>
											</div>
									</div>
								</div>
									</div>
									<!--Panel-body end-->
								</div>
								<!--Profile-widget profile widget info end-->
							</div>
							<!--col-lg-l2 end-->
							
						</div>
						<!--div Row end-->

							  <!-- page start-->
						<div class="row">
								<div class="col-lg-12">
									<section class="panel">
										<header class="panel-heading tab-bg-info">
											<ul class="nav nav-tabs">
												<li class="active">
													<a data-toggle="tab" href="#recent-activity">
														<i class="icon-home"></i>
																Daily Activity
													</a>
												</li>
											</ul>
										</header>
										<div class="panel-body">
											<div class="tab-content">
												<div id="recent-activity" class="tab-pane active">
												<!--Date wise report goes here
												
												Collapsable divs come here-->
												<!--collapse start-->
												<?php
												$acc_detail=$db->select("Transaction","DISTINCT(Account_no)","Emp_id=$agent_id and date(Transaction_date) between '$agent_sdate' and '$agent_edate'");
												
												if($acc_detail===false){
													echo '<script>alert("Invalid date or the agent has not performed any transaction during the specified dates \n \n Try again");</script>';
												}
												
												?>
													<div class="panel-group m-bot20" id="accordion">
														<div class="panel panel-default">
														<?php
														$count=1;
														foreach($acc_detail as $d)
															{
																
																$acc_no=$d['Account_no'];
																$acc_status=$db->select("accounts","status","Account_no=$acc_no");
																$acc_det=$db->select("Transaction","Transaction_date,Transaction_type,amount","Account_no=$acc_no");
																//$acc_date=$acc_details['transaction_date'];
																//$acc_transaction=$acc_details['transaction_type'];
																//$acc_amount=$acc_details['amount'];

																echo '
																<div class="panel-heading">
																	<h4 class="panel-title">
																	<!--Create Account numbers and status for all the accounts handled by the agent-->
																		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
																			Account Number :'.$acc_no.'<a class="pull-right">Status:
																			'.(($acc_status[0]["status"]=='0')?"Inactive":"Active").'
																			</a>
																		</a>
																	</h4>
																</div>
																<div id="collapseOne" class="panel-collapse collapse in">
																	<div class="panel-body">
																		<table class="table table-hover">
																			<thead>
																				<tr>
																					<th>#</th>
																					<th>Date</th>
																					<th>Amount</th>
																					<th>Transacion type</th>
																				</tr>
																			</thead>
																			';
																			foreach($acc_det as $account_info_detail)
																			{	
																				$transaction_date=$account_info_detail['Transaction_date'];
																				$transaction_type=$account_info_detail['Transaction_type'];
																				$amt=$account_info_detail['amount'];
																			echo '
																			<tbody>
																				<tr>
																					<td>'.$count.'</td>
																					<td>'.$transaction_date.'</td>
																					<td>'.$amt.'</td>
												
																					<td>'.(($account_info_detail['Transaction_type']=='0')?"Withdraw":"Deposit").'</td>
																				</tr>
																			</tbody>';
																			$count++;
																			}echo'
																		</table>
																	</div>
																</div>
																';
															}
															?>
														</div>
														<!--Panel panel-default end-->
													</div>
												  <!--collapse end-->
												</div><!--Div class recent -activity end-->
											</div><!--Div class tab-contents end-->
										</div><!--Div class panel-body end-->
									</section><!--Section class panelend-->
								</div><!--Div class col lg -12end-->
							</div>
							<!--Div class row end-->
							  <!-- page end-->
					</section>
					<!--section wrapper-no-margin end-->
						
			</section>
			<!--Section main-content end-->
			
					
					<!--Div to display report results ends here -->
		<?php include 'footer.php';?>	
    </body>
	<!--Body end-->
     	
</html>