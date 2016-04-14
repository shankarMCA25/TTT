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
											<h6>Agent type</h6>
										</div>
										<div class="col-lg-4 col-sm-4 follow-info">
										<!--Agent ID-->
											<p>Agent Id</p>
											<!--Agent Email-->
											<p>Agent email</p>
											<h6>
												<span><i class="icon_calendar"></i>Joining date 25.10.13</span><p></p><p>
												<span><i class="icon_pin_alt"></i>Plot-no 841 vasant vihar coloney rani channamma nagar Beglaum</span></p>
											<h6>
										</div>
										<div class="col-lg-2 col-sm-6 follow-info weather-category">
											<ul>
												<li class="active">
													<i class="fa fa-comments fa-2x"> </i>
													<br><br>
													Agent Status :: Currently Actives
												</li>

											</ul>
											</div>
											<div class="col-lg-2 col-sm-6 follow-info weather-category">
												<ul>
													<li class="active">
														<i class="fa fa-bell fa-2x"> </i><br>
														No of Active Accounts Assigned<br>6
													</li>
												</ul>
											</div>
											<div class="col-lg-2 col-sm-6 follow-info weather-category">
													  <ul>
														  <li class="active">
															  
															  <i class="fa fa-tachometer fa-2x"> </i><br>
															  
															  Current daily Assigned Collection: 5000rs
														  </li>
														   
													  </ul>
											</div>
										  </div>
									</div>
								</div>
							</div>
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
												Date wise report goes here<br>
												Collapsable divs come here-->
												<!--collapse start-->
													<div class="panel-group m-bot20" id="accordion">
														<div class="panel panel-default">
															<div class="panel-heading">
																<h4 class="panel-title">
																<!--Create Account numbers and status for all the accounts handled by the agent-->
																	<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
																		Account Number	<a class="pull-right">Status:</a>
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
																				<th>Transacion type</th>
																				<th>Amount</th>
																			</tr>
																		</thead>
																		<tbody>
																			<tr>
																				<td>1</td>
																				<td>Mark</td>
																				<td>Otto</td>
																				<td>@mdo</td>
																			</tr>
																			<tr>
																				<td>2</td>
																				<td>Jacob</td>
																				<td>Thornton</td>
																				<td>@fat</td>
																			</tr>
																			<tr>
																				<td>3</td>
																				<td colspan="2">Larry the Bird</td>
																				<td>@twitter</td>
																			</tr>
																			<tr>
																				<td>3</td>
																				<td>Sumon</td>
																				<td>Mosa</td>
																				<td>@twitter</td>
																			</tr>
																		</tbody>
																	</table>
																</div>
															</div>
														</div>
													</div>
												  <!--collapse end-->
										</div>
									</section>
								</div>
							</div>

							  <!-- page end-->
						  </section>
					  </section>
					  <!--main content end-->
			
					
					<!--Div to display report results ends here -->
		<?php include 'footer.php';?>	
    </body>
     	
</html>