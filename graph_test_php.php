<!DOCTYPE html>
<?php 
	$title='Weekly Graph';
	include 'header.php';
	include 'Manager_Index11.php';
	require_once 'dbconn.php';
	
		$db = new dbconn();
		$day_of_week=array();
		$deposit_of_week=array();
		$withdraw_of_week=array();
		
		
		
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
			/*echo 'Deposit: -';
			echo $graph_data[$x][1]==""?0:$graph_data[$x][1];
			echo ' withdraw:- ';
			echo $graph_data[$x][2]==""?0:$graph_data[$x][2];
			echo '<br>'; */
			//echo "<script>alert('$x');</script>";
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
			//echo "<script>alert('$deposit');</script>";
			/*echo "deposit of 4deposit is :".$deposit."<br>";
			echo "withdraw of 4withdraw is :".$withdraw."<br>";
			echo "value of date is :".$graph_date."<br><br>";*/
			
		}
	$deposit.= "]";
	$withdraw.= "]";
	$graph_date.= "]";
	
?>
	
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Charts | Creative - Bootstrap 3 Responsive Admin Template</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />    
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
      <!--header start-->
      
        
      <!--header end-->

     
      <!--main content start-->      
      <section id="main-content">
        <section class="wrapper">
		<div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="icon_piechart"></i> Chart</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
						<li><i class="icon_piechart"></i>Chart</li>
						
					</ol>
				</div>
			</div>
            <div class="row">
              <!-- chart morris start -->
              
                  <section class="panel">
                      
						<div class="panel-body">
							<div class="tab-pane" id="chartjs">
								<div class="row">
                          <!-- Line -->
									  <div class="col-lg-6">
										  <section class="panel">
											  <header class="panel-heading">
												  Line
											  </header>
											  <div class="panel-body text-center">
												  <canvas id="line" height="300" width="450"></canvas>
											  </div>
										  </section>
									  </div>   
								</div>
                      </div>
                  </div>
            </section>
              
              <!-- chart morris start -->
            </div>
      </section>
      <!--main content end-->
    </section>
    <!-- container section end -->
    <!-- javascripts -->
	
    <script src="js/jquery.js"></script>
    <script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- chartjs -->
    <script src="assets/chart-master/Chart.js"></script>
    <!-- custom chart script for this page only-->
    
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
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
