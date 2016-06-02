<!DOCTYPE html>
	<?php 
	include 'header.php';
		
		if ($ses_Emp_type==1)
			$title ='Manager Homepage';
		if ($ses_Emp_type==2)
			$title ='Cashier Homepage';
		
		$day_of_week=array();
		$deposit_of_week=array();
		$withdraw_of_week=array();
		echo '<script>alert("'.$ses_Emp_type.'")</script>';
		echo '<script>alert("'.$ses_Emp_id.'")</script>';
		
		
		for($x = 6; $x > 0; $x--)
		{
			$date[$x]=date('Y-m-d',strtotime("-$x days"));
			$s=$date[$x];
			//$res_day=$db->select('','DAYNAME('.$s.')','');
			//echo $date[$x];			
		}
		$deposit= "[";
		$withdraw= "[";
		$graph_date= "[";
		for($x = 6; $x > 0; $x--)
		{
			$graph_data[$x][1]=$db->select("graph","deposit","graph_date BETWEEN '$date[$x] 00:00:00.00' AND '$date[$x] 23:59:59.999'")[0]['deposit'];
			$graph_data[$x][2]=$db->select("graph","withdraw","graph_date BETWEEN '$date[$x] 00:00:00.00' AND '$date[$x] 23:59:59.999'")[0]['withdraw'];
			
			if($x==6){
			$deposit.=$graph_data[$x][1]==""?0:$graph_data[$x][1];
			$withdraw.=$graph_data[$x][2]==""?0:$graph_data[$x][2];
			$graph_date.='"'.$date[$x].'"';
			}else{
			$deposit.=", ";
			$deposit .=$graph_data[$x][1]==""?0:$graph_data[$x][1];
			$withdraw.=", ";
			$withdraw.=$graph_data[$x][2]==""?0:$graph_data[$x][2];
			$graph_date.=',"'.$date[$x].'"';
			}
		}
	$deposit.= "]";
	$withdraw.= "]";
	$graph_date.= "]";
	
?>
	
	
	<body>
		<?php include 'Manager_Index11.php';
		$sessionvalue=$ses_Emp_type;
		
	?>
			<!--main content start-->
			<section id="main-content" >
				<h2 class="lite tblcenter">Welcome <?php echo ($ses_Emp_type==1)?"Manager ":"Cashier "; ?> General info</h2>
	
      			<section class="">
				<!-- Line  cahart start-->
					<section class="wrapper">
                      
						
							<div class="tab-pane" id="chartjs">
								<div class="row">
                          
									  <div class="wrapper">
										  <section class="panel">
											  <header class="panel-heading">
												  WeekLy Graph of deposit and withdraw
											  </header>
											  <div class="panel-body text-center">
												  <canvas id="line" height="300" width="450"></canvas>
											  </div>
										  </section>
									  </div>   
								</div>
							</div>
						
					</section>
              
              <!-- chart end -->
	      			<section>
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
							
							<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
								<div class="info-box dark-bg">
									<i class="fa fa-inr"></i>
									<div class="count">
									<?php $res=$db->select("Transaction","Sum(amount) deposit_amount","Transaction_date BETWEEN '$yest 00:00:00.00' AND '$yest 23:59:59.999' And Transaction_type=0 ");
										echo $res[0]['deposit_amount']?></div>
									<div class="title">Yesterday's Deposit</div>						
								</div><!--/.info-box-->			
							</div><!--/.col-->
							
							<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
								<div class="info-box dark-bg">
									<i class="fa fa-cubes"></i>
									<div class="count">
									<?php $res=$res=$db->select("Transaction","Sum(amount) withdraw_amount","Transaction_date BETWEEN '$yest 00:00:00.00' AND '$yest 23:59:59.999' And Transaction_type=1 ");
										echo $res[0]['withdraw_amount']?>
										</div>
									<div class="title">Yesterday's Withdrawl</div>						
								</div><!--/.info-box-->			
							</div><!--/.col-->
							</div>
						
						
						
					</section>
			<!--main content end-->
  			</section>
  			<!-- container section start -->
		<?php include 'footer.php';?>
		<!--Form to change the passwords of manager-->
		<script>
	$(document).ready(function(){
var lineChartData={
	labels : <?php echo $graph_date;?>,
	datasets : [
	{
		fillColor : "rgba(220,220,220,0.5)",
		strokeColor:  "rgba(220,220,220,1)",
		pointColor : "rgba(220,220,220,1)",
		poingStrokeColor : "#fff",
		data :<?php echo $deposit;?>
	},
	{
		fillColor : "rgba(151,187,205,0.5)",
		strokeColor : "rgba(151,187,205,1)",
		pointColor : "rgba(151,187,205,1)",
		pointStrokeColor : "#fff",
		data :<?php echo $withdraw;?>
	}
	]
};
new Chart(document.getElementById("line").getContext("2d")).Line(lineChartData);
})
	</script>
	</body>
</html>