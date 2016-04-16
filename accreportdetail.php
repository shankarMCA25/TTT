<!DOCTYPE html>

	<?php
	$title ='Detail Agent Report';
	include 'header.php';
	include 'Cashier_Index1.php';
	require_once 'dbconn.php';
	?>
	<body>
			<?php 	$acc_no=$_POST['Accno'];
					$acc_sdate=$_POST['Acc_sdate'];
					$acc_edate=$_POST['Acc_edate']; 
					if(isset($_POST["Account_date_wise_report"]))
					{
				$res=$db->select("Transacion","*","Account_no=$acc_no and date(Transaction_date) between '$acc_sdate' and '$acc_edate'");
				if($res)
					{
						echo '<script>alert("Invalid Agent ID"); window.location.href="cashierdatewisereport.php";</script>';
					
					}
				}
			?>
			<!--main content start-->
      		<section id="main-content">
				<h2 class="page-header">Welcome to date wise report generation</h2>
				<?php
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
											Account Holders Name:<h4><?php echo $acc_name; ?></h4>               
											<!--<div class="follow-ava">
												<img src="img/profile-widget-avatar.jpg" alt="">
											</div> -->
											<!--Agent type-->
											
										</div>
										<div class="col-lg-4 col-sm-4 follow-info">
										<!--Agent ID-->
											<p>Acount Number : <?php echo $acc_no?></p>
											<!--Agent Email-->
											<p>Registered Email-id : <?php echo $acc_email?></p>
											<h6>
												<span><i class="icon_calendar"></i>Account Created on <?php echo $acc_start_date;?></span><p></p><p>
												<span><i class="icon_calendar"></i>Account Closed on <?php echo $acc_end_date;?></span><p></p><p>
												<span><i class="icon_pin_alt"></i>Address : <?php echo $acc_address?></span></p>
											<h6>
										</div>
										<div class="col-lg-2 col-sm-6 follow-info weather-category">
											<ul>
												<li class="active">
													<i class="fa fa-comments fa-2x"> </i>
													<br><br>
													Account  Status :: <?php if($acc_status){
													echo 'Currently Active';
													}
													else
													{
													echo 'Account closed';}?>
												</li>

											</ul>
										</div>
											<div class="col-lg-2 col-sm-6 follow-info weather-category">
												<ul>
													<li class="active">
														<i class="fa fa-bell fa-2x"> </i><br>
														Agent Id Of Assigned Agent<br><?php echo $acc_agent_id;?>
													</li>
												</ul>
											</div>
											<div class="col-lg-2 col-sm-6 follow-info weather-category">
													  <ul>
														  <li class="active">
															  
															  <i class="fa fa-tachometer fa-2x"> </i><br>
																Account Balance: <?php $acc_balance=$db->select("Transaction","Account_balance,MAX(Transaction_date)","Account_no=$acc_no");
																echo $acc_balance[0]['Account_balance'];?>
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
												$acc_detail=$db->select("Transaction","*","Account_no=$acc_no and date(Transaction_date) between '$acc_start_date' and '$acc_end_date'");
												
												if($acc_detail===false){
													echo '<script>alert("Invalid date or the agent has not performed any transaction during the specified dates \n \n Try again");</script>';
												}
												
												?>
													<div class="panel-group m-bot20" id="accordion">
														<div class="panel panel-default">

																<div class="panel-heading">
																	<h4 class="panel-title">
																	<!--Create Account numbers and status for all the accounts handled by the agent-->
																		<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
																			Account Number :<?php echo $acc_no;?><a class="pull-right">Status:
																			<?php
																				if($acc_status){
																					echo 'Open';
																					}
																				else {
																					echo 'Account has been closed';
																					}?>
																			
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
																			
																			<?php
																			$count=1;
																			$display_res=$db->select("Transaction","*","Account_no=$acc_no and date(Transaction_date) between '$acc_sdate' and '$acc_edate'" );
																			foreach($display_res as $display){
																				echo '
																			<tbody>
																				<tr>
																					<td>'.$count.'</td>
																					<td>'.$display['Transaction_date'].'<td>
																					<td>'.$display['Amount'].'<td>
																					<td>'.$display['Transaction_type'].'</td>
																				</tr>
																				</tbody>
																			
																			';
																			}
																			?>
																			
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
			<!--Section main-content end-->
			
					
					<!--Div to display report results ends here -->
		<?php include 'footer.php';?>	
    </body>
	<!--Body end-->
     	
</html>