<!DOCTYPE html>
	<?php $title ='Cashier Homepage';
	include 'header.php';?>
	<body>
		<?php include 'Manager_Index11.php';?>
			<!--main content start-->
			
      		<section id="main-content" >
				<h2 class="lite tblcenter">Welcome Cashier<hr>General info</h2>
	
      			<section class="wrapper">
	      			
	      			  
			            <div class="row">
							<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
								<div class="info-box dark-bg">
									<i class="fa fa-male"></i>
									<div class="count">
									<?php 
										$db = new dbconn();
										$res=$db->select("Employee","Count(Emp_id) as Active_agent","Emp_type=3 And Emp_Status=1");
										echo $res[0]['Active_agent'];
									?></div>
									<div class="title">Total Active Agents</div>						
								</div><!--/.info-box-->			
							</div><!--/.col-->
							
							<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
								<div class="info-box dark-bg">
									<i class="fa fa-users"></i>
									<div class="count">
									<?php
									$res=$db->select("Accounts","Count(Account_no) as Active_acc","Status=1");
									echo $res[0]['Active_acc'];
									?>
									</div>
									<div class="title">Total Active Accounts</div>						
								</div><!--/.info-box-->			
							</div><!--/.col-->	
							
							<div class="col-lg-3 c ol-md-3 col-sm-12 col-xs-12">
								<div class="info-box dark-bg">
									<i class="fa fa-inr"></i>
									<div class="count"><?php $res=$res=$db->select("Transaction","Sum(amount) deposit_amount","Transaction_date BETWEEN '$yest 00:00:00.00' AND'$yest 23:59:59.999' And Transaction_type=1 ");
										echo $res[0]['deposit_amount'];?>
										</div>
									<div class="title">Yesterday's Deposit</div>						
								</div><!--/.info-box-->			
							</div><!--/.col-->
							
							<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
								<div class="info-box dark-bg">
									<i class="fa fa-cubes"></i>
									<div class="count">
									 <?php $res=$db->select("Transaction","Sum(amount) withdraw_amount","Transaction_date BETWEEN '$yest 00:00:00.00' AND '$yest 23:59:59.999' And Transaction_type=1 ");
										echo $res[0]['withdraw_amount']?>
										</div>
									<div class="title">Yesterday's Deposit</div>						
								</div><!--/.info-box-->			
							</div><!--/.col-->
							
						</div><!--/.row-->
					</section>
			<!--main content end-->
  			</section>
  			<!-- container section start -->
		<?php include 'footer.php';?>
		<!--Form to change the passwords of manager-->
		
	</body>
</html>