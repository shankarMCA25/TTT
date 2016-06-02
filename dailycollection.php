<!DOCTYPE html>

	<?php
	$title ='Daily collection page';
	include 'header.php';?>
	<body>
		<?php include 'Manager_Index11.php';
		
		$count=1;
		$agent_collection=$db->select("Accounts","Distinct(Emp_id) as Employee_id,SUM(Daily_amt) as Daily_collection","1");
		?>
		 <!-- page start-->
		<section id="main-content">
			<section class="wrapper">											
				<div class="row">
					<h2 class="lite tblcenter">Daily collection</h2>
						<div class="col-lg-12">
							<table class="table table-bordered">
								<thead>
									<tr>
										<th>#</th>
											<th>Agent ID</th>
											<th>Agent Name</th>
										<th>Daily Collection</th>
									</tr>
								</thead>
								<tbody>
								<?php 
								foreach($agent_collection as $display){
									$agent=$db->select("Employee","Emp_name","Emp_id='".$display['Employee_id']."'");
									echo '
								<tr>
										<td>'.$count.'</td>
										<td>'.$display['Employee_id'].'</td>
										<td>'.$agent[0]['Emp_name'].'</td>
										<td>'.$display['Daily_collection'].'</td>
										
								</tr>';
								$count++;
								}
						
								?>
								</tbody>
							</table>
						</div>
				</div>
			</section>
		</section>
	      <!-- page end-->
			
		<?php include 'footer.php';?>
		<!--Form to change the passwords of manager-->
		
	</body>
</html>