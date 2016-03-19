<!DOCTYPE html>

	<?php include 'header.php';?>
	<body>
		<?php include 'Manager_Index1.php';?>
			<!--main content start-->
      		<section id="main-content">
     		 	<section class ="wrapper" style="width:100%;height:100%">
     		 		<div> <!-- change password title-->
     		 			<h2 class="lite">Change password</h2>
     		 			<center>
     		 				<!-- Form begins -->
	     		 			<form name="changepassword" method="get">
	     		 			<!-- table begins-->
		     		 			<table class="ChPassFont" cellpadding="10" >
		     		 				<tr>
		     		 					<td>Enter previous password</td>
		     		 					<td><input type="password" name="prvpass"></td>
		     		 				</tr>
		     		 				<tr>
		     		 					<td>Enter new password</td>
		     		 					<td><input type="password" name="curpass"></td>
		     		 				</tr>
		     		 				<tr>
		     		 					<td>Re-Enter the new password</td>
		     		 					<td><input type="password" name="reenter"></td>
		     		 				</tr>
		     		 				<tr class="tblcenter">
		     		 					<td><input type="submit" name="chpswd" value="Change Password">
		     		 					</td>
		     		 					<td><input type="button" name="pswdcancel" value="Cancel">
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