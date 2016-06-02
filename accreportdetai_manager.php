<!DOCTYPE html>

	<?php
	$title ='Detail Agent Report';
	include 'header.php';
	
	include 'Manager_Index11.php';
	
			
	require_once 'dbconn.php';
	?>
	<body>
		<!--PHP FOR ACCOUNT HOLDER BEGINS HERE-->
			<?php 	
				
				if(isset($_POST["Account_date_wise_report"]))
				{
					$acc_no=$_POST['Accno'];
					$acc_sdate=$_POST['Acc_sdate'];
					$acc_edate=$_POST['Acc_edate'];
					$res=$db->select("Transaction","*","Account_no=$acc_no and date(Transaction_date) between '$acc_sdate' and '$acc_edate'");
					if(!$res)
					{
						echo '<script>alert("Invalid Account Number "); window.location.href="cashierdatewisereport.php";</script>';
					
					}
					//<!--main content start-->
					echo '<section id="main-content">
					
					<h2 class="lite tblcenter">Welcome to date wise report generation</h2>';
						$res=$db->select("Accounts","*","Account_no=$acc_no");
						$acc_name=$res[0]['Name'];
						$acc_address=$res[0]['Address'];
						$acc_email=$res[0]['Email'];
						$acc_contact_no=$res[0]['Phone_no'];
						$acc_status=$res[0]['Status'];
						$acc_daily_amt=$res[0]['Daily_amt'];
						$acc_start_date=$res[0]['Start_date'];
						$acc_end_date=$res[0]['End_date'];
						$acc_agent_id=$res[0]['Emp_id'];
						$acc_balance=$db->select("Transaction","Account_balance,MAX(Transaction_date)","Account_no=$acc_no");
						$acc_detail=$db->select("Transaction","*","Account_no=$acc_no and date(Transaction_date) between '$acc_start_date' and '$acc_end_date'");												(($acc_detail===false)?"<script>alert('Invalid date or the agent has not performed any transaction during the specified dates \n \n Try again');</script>":"");
					echo '
						<!--Div to display report results-->
						<section class="wrapper-no-margin">
							<div class="row">
							<!-- profile-widget -->
								<div class="col-lg-12">
									<div class="profile-widget profile-widget-info">
										<div class="panel-body">
											<div class="col-lg-2 col-sm-2">
												<!--Name above image-->
												Account Holders Name:<h4>'.$acc_name.'</h4>               
												<!--<div class="follow-ava">
													<img src="img/profile-widget-avatar.jpg" alt="">
												</div> -->
												<!--Agent type-->
												
											</div>
											<div class="col-lg-4 col-sm-4 follow-info">
											<!--Agent ID-->
												<p>Acount Number : '.$acc_no.'</p>
												<!--Agent Email-->
												<p>Registered Email-id :'.$acc_email.'</p>
												<h6>
													<span><i class="icon_calendar"></i>Account Created on '.$acc_start_date.'</span><p></p><p>
													<span><i class="icon_calendar"></i>Account Closed on  '.$acc_end_date.'</span><p></p><p>
													<span><i class="icon_pin_alt"></i>Address : '.$acc_address.'</span></p>
												<h6>
											</div>
											<div class="col-lg-2 col-sm-6 follow-info weather-category">
												<ul>
													<li class="active">
														<i class="fa fa-comments fa-2x"> </i>
														<br><br>
														Account  Status ::'.(($acc_status=='0')?"Currently Active":"Account closed").'
													</li>

												</ul>
											</div>
												<div class="col-lg-2 col-sm-6 follow-info weather-category">
													<ul>
														<li class="active">
															<i class="fa fa-bell fa-2x"> </i><br>
															Agent Id Of Assigned Agent<br>'.$acc_agent_id.'
														</li>
													</ul>
												</div>
												<div class="col-lg-2 col-sm-6 follow-info weather-category">
														  <ul>
															  <li class="active">
																  
																  <i class="fa fa-tachometer fa-2x"> </i><br>
																	Account Balance: '.
																	$acc_balance[0]["Account_balance"].'
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
							';
							echo '
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
														<div class="panel-group m-bot20" id="accordion">
															<div class="panel panel-default">

																	<div class="panel-heading">
																		<h4 class="panel-title">
																		<!--Create Account numbers and status for all the accounts handled by the agent-->
																			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
																				Account Number :'.$acc_no.'<a class="pull-right">Status:
																				'.(($acc_status)?"Open":"Account has been closed").'
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
																						<th>Transaction type</th>
																					</tr>
																				</thead>
																				<tbody>
																				';
																				$count=1;
																				$display_res=$db->select("Transaction","*","Account_no=$acc_no and date(Transaction_date) between '$acc_sdate' and '$acc_edate'" );
																				foreach($display_res as $display){
																					echo '
																				
																					<tr>
																						<td>'.$count.'</td>
																						<td>'.$display['Transaction_date'].'</td>
																						<td>'.$display['Amount'].'</td>
																						<td>'.$display['Transaction_type'].'</td>
																				</tr>';
																				}
																				echo'
																				
																				</tbody>
																			</table>
																		</div>
																	</div>
																	
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
				<!--Section main-content end-->';
				}
				
			?>
		<!--php FOR ACCOUNT Ends here-->
		<!--PHP FOR AGENT DETAILS BEGINS HERE-->
		<?php ?>
		
			<?php
				if(isset($_POST["Agent_date_wise_report"])){
					$agent_id=$_POST['Agentid'];
					$agent_sdate=$_POST['Agent_sdate'];
					$agent_edate=$_POST['Agent_edate']; 
					$res=$db->select("Employee","*","Emp_id = $agent_id And Emp_type=3");
					$acc_ass=$db->select("Accounts","Count(Account_no) as acc_assign","emp_id=$agent_id");
					$tot_daily_coll=$db->select("Accounts","SUM(Daily_amt) as total_coll","Emp_id=$agent_id");
					if(!$res)
					{	
						echo '<script>alert("Invalid Agent ID"); window.location.href="cashierdatewisereport.php";</script>';
					}
					else
					{
						echo'
						<!--main content start-->
						<section id="main-content">
							<h2 class="page-header">Welcome to date wise report generation</h2>';
								$agent_name=$res[0]['Emp_name'];
								$agent_address=$res[0]['Emp_address'];
								$agent_email=$res[0]['Emp_email'];
								$agent_contact_no=$res[0]['Emp_contact'];
								$agent_type=$res[0]['Emp_type'];
								$agent_status=$res[0]['Emp_Status'];
								echo'
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
														<p>Agent Id :'.$agent_id.'</p>
														<!--Agent Email-->
														<p>Agent email :'.$agent_email.'</p>
														<h6>
															<span><i class="icon_calendar"></i>Joining date 25.10.13</span><p></p><p>
															<span><i class="icon_pin_alt"></i>Address :'.$agent_address.'</span></p>
														<h6>
													</div>
													<div class="col-lg-2 col-sm-6 follow-info weather-category">
														<ul>
															<li class="active">
																<i class="fa fa-comments fa-2x"> </i>
																<br><br>
																Agent Status ::'.(($agent_status)=="0"?"Currently Active":"Currently Inactive").'
															</li>

														</ul>
													</div>
														<div class="col-lg-2 col-sm-6 follow-info weather-category">
															<ul>
																<li class="active">
																	<i class="fa fa-bell fa-2x"> </i><br>
																	No of Active Accounts Assigned<br>'.(($agent_status)=="0"?($acc_ass[0]["acc_assign"]):"0").'
																</li>
															</ul>
														</div>
														<div class="col-lg-2 col-sm-6 follow-info weather-category">
																  <ul>
																	  <li class="active">
																		  
																		  <i class="fa fa-tachometer fa-2x"> </i><br>
																			Current daily Assigned Collection: '.$tot_daily_coll[0]['total_coll'].'
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
															<div id="recent-activity" class="tab-pane active">';
															//<!--Date wise report goes here
															
															//Collapsable divs come here-->
															//<!--collapse start-->
															
															$acc_detail=$db->select("Transaction","DISTINCT(Account_no)","Emp_id=$agent_id and date(Transaction_date) between '$agent_sdate' and '$agent_edate'");
															
															if($acc_detail===false){
																echo '<script>alert("Invalid date or the agent has not performed any transaction during the specified dates \n \n Try again");</script>';
															}
															
															echo '
																<div class="panel-group m-bot20" id="accordion">
																	<div class="panel panel-default">
																	';
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
																		
																	echo'</div>
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
						
								
								<!--Div to display report results ends here -->';
					
					}
				}
			?>
			
		<!--PHP FOR AGENT DETAILS ENDS HERE-->
		<?php include 'footer.php';?>	
    </body>
	<!--Body end-->
     	
</html>