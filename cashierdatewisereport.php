<!DOCTYPE html>
<html>
	<?php
	$title ='Date-wise Account report Homepage';
	include 'header.php';?>
	<body>
			<?php include 'Cashier_Index1.php';
			?>
			<!--main content start-->
      		<section id="main-content">     		 
				<section class ="wrapper">
				<h2 class="lite tblcenter">Welcome to date wise report generation</h2>
					<!--Date wise report generation -->
					<!-- Collapse Start-->
						<div class="panel-group" id="accordion">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
											Generate Detail account Report
										</a>
									</h4>
								</div>
								<div id="collapseOne" class="panel-collapse collapse in">
									<div class="panel-body">
										<form action="accreportdetail.php" name="Account_date_wise_report" method="post" id="Account_date_wise_report">
										<section class="row">
											<div class="col-md-3 hidden-xs">Enter account number</div>
											<div class="col-md-3 hidden-xs">Select Start date</div>
											<div class="col-md-3  hidden-xs">Select End date</div>
										</section>
										<section class="row">
											<div class="col-md-3"><div class="clearfix visible-xs">Acc no </div><input type="text" name="Accno" id="Accno" class="form-control" required></div>
											<div class="col-md-3"><div class="clearfix visible-xs ">start date </div><input type="text" name="Acc_sdate" id="Acc_startdate" class="form-control datepicker" required></div>
											<div class="col-md-3"><div class="clearfix visible-xs">end date </div><input type="text" name="Acc_edate" id="Acc_enddate" class="form-control" required></div>
											<div class="col-md-3"><input type="submit" name="Account_date_wise_report" id="acc_dtrptgen" class="btn btn-primary" value="Submit"></div>
										</section>
										</form>
									</div>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
											Generate Detail Agent Report
										</a>
									</h4>
								</div>
								<div id="collapseTwo" class="panel-collapse collapse">
                                  <div class="panel-body">
                                    <form action="accreportdetail.php" name="Agent_date_wise_report" method="post" id="Agent_date_wise_report">
										<section class="row">
											<div class="col-md-3 hidden-xs">Enter Agent Id</div>
											<div class="col-md-3 hidden-xs">Select Start date</div>
											<div class="col-md-3  hidden-xs">Select End date</div>
										</section>
										<section class="row">
											<div class="col-md-3"><div class="clearfix visible-xs">Agent Id </div><input type="text" name="Agentid" id="Agentid" class="form-control" required></div>
											<div class="col-md-3"><div class="clearfix visible-xs">Start date </div><input type="text" name="Agent_sdate" id="Agent_startdate" class="form-control" required></div>
											<div class="col-md-3"><div class="clearfix visible-xs">End date </div><input type="text" name="Agent_edate" id="Agent_enddate" class="form-control" required></div>
											<div class="col-md-3"><input type="submit" name="Agent_date_wise_report" id="Agent_dtrptgen" class="btn btn-primary" value="Submit"></div>
										</section>
									</form> 
                                  </div>
                              </div>
							</div>
						</div>
					<!-- Collapse End-->
					<hr>
    		</section>
			</section>
	</body>
	<!--Scripts-->
	     	<?php include 'footer.php';?>
    <script>
	$(function(){
		$("#Acc_startdate").datepicker({
			dateFormat:"yy-mm-dd",
			maxDate:0
			});
		});
	$(function(){
		$("#Agent_startdate").datepicker({
			dateFormat:"yy-mm-dd",
			maxDate:0
			});
		});
		$(function(){
		$("#Acc_enddate").datepicker({
			dateFormat:"yy-mm-dd",
			maxDate:0
			});
		});
		$(function(){
		$("#Agent_enddate").datepicker({
			dateFormat:"yy-mm-dd",
			maxDate:0
			});
		});
	$(document).ready(function()
	{
		$( "#Account_date_wise_report" ).validate({
				rules: {
				Accno:"required",
				Acc_sdate:"required",
				Acc_edate:"required"
				},
				messages : {
					Accno : "Kindly Enter Account Number",
					Acc_sdate:"kindly Enter Start date",
					Acc_edate:"kindly Enter End date"
				}
			});
		$( "#Agent_date_wise_report" ).validate({
				rules: {
				Agentid : "required",
				Agent_sdate:"required",
				Agent_edate:"required"
				},
				messages:{
					Agentid : "Kindly Enter Agent ID",
					Agent_sdate:"kindly Enter Start date",
					Agent_edate:"Kindly Select End date"
				}
				});
	});
	</script>
</html>
