<!DOCTYPE html>
<html>
	<?php
	$title ='Date-wise report Homepage';
	include 'header.php';?>
	<body>
			<?php include 'Cashier_Index1.php';?>
			<!--main content start-->
      		<section id="main-content">
				<h2 class="page-header">Welcome to date wise report generation</h2>
					<!--Date wise report generation -->
						<div class="panel-group" id="accordion">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
											Generate detail account Report
										</a>
									</h4>
								</div>

                              <div id="collapseOne" class="panel-collapse collapse">
                                  <div class="panel-body" >
									<form action="#" name="datewisereport" id="dwreport">
										<section class="row">
											<div class="col-md-3 hidden-xs">Enter account number</div>
													<div class="col-md-3 hidden-xs">Select Start date</div>
													<div class="col-md-3  hidden-xs">Select End date</div>
													
											
											
											</section>
											<section class="row">
											
											
												<div class="col-md-3"><div class="clearfix visible-xs">Ac no </div><input type="text" name="accno" id="accno" class="form-control"></div>
												<div class="col-md-3"><div class="clearfix visible-xs">start date </div><input type="date" name="sdate" id="startdate" class="form-control"></div>
												<div class="col-md-3"><div class="clearfix visible-xs">end date </div><input type="date" name="edate" id="enddate" class="form-control"></div>
												<div class="col-md-3"><input type="submit" name="dtrptgen" id="dtrptgen" class="btn btn-primary"></div>
											
										</section>
										</form>
                                  </div>
                              </div>
							  
                          </div>
                      </div>
                            <hr>
                        

                        <!--Div to display report results-->
                        <div>
                        </div>
			</section>
     	</body>
     	<?php include 'footer.php';?>
</html>
