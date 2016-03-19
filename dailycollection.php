<!DOCTYPE html>

	<?php include 'header.php';?>
	<body>
		<?php include 'Cashier_Index1.php';?>
			<!--main content start-->
      		<section id="main-content">
     		 	<section class ="wrapper" style="width:100%;height:100%">
     		 		<div> <!-- change password title-->
     		 			<h2 class="lite">Daily Collection</h2>
     		 			<center>
     		 				<!-- Form begins -->
	     		 			<form name="changepassword" method="get">
	     		 			<!-- table begins-->
		     		 			<table class="ChPassFont tblcenter"  cellpadding="10" >
		     		 				<tr>
		     		 					<td>Collection Agent Name</td>
										<td>Amount Received</td>
		     		 					
		     		 				</tr>
		     		 			</table>
		     		 			<hr>
		     		 			<table>
		     		 				<tr class="tblcenter">
		     		 					<td>
		     		 						<input type="submit" name="chpswd" value="Submit">
		     		 					</td>
		     		 					<td>
		     		 						<input type="button" name="pswdcancel" value="Cancel">
		     		 					</td>
		     		 				</tr>
		     		 			</table>
	     		 			<!--table ends -->
	     		 			</form>
	     		 			<!--form ends-->
     		 			</center>
   			 		</div>
				</section>
     			<!--main content end-->
  			</section>
  			<!-- container section start -->
		<?php include 'footer.php';?>
		<!--Form to change the passwords of manager-->
		
	</body>
</html>