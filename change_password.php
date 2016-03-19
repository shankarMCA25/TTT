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
	     		 			<form name="changepassword" id="changepassword" method="post">
	     		 			<!-- table begins-->
		     		 			<table class="ChPassFont" cellpadding="10" >
		     		 				<tr>
		     		 					<td>Enter previous password</td>
		     		 					<td><input type="password" name="curpass" id="curpass" required></td>
		     		 				</tr>
		     		 				<tr>
		     		 					<td>Enter new password</td>
		     		 					<td><input type="password"  name="newpass" id ="newpass" minlength="6" required></td>
		     		 				</tr>
		     		 				<tr>
		     		 					<td>Re-Enter the new password</td>
		     		 					<td><input type="password" name="repassword" id="repassword" required></td>
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
		<script>
			// just for the demos, avoids form submit
			$(document).ready(function()
			{
			jQuery.validator.setDefaults({
			  debug: true,
			  success: "valid"
			});
			
			$("#changepassword").validate({
				rules:{
					curpass:"required",
					newpass:{
						required: true,
						minlength:6
					},
					repassword:{
						required: true,
						minlength:6,
						equalTo:"#newpass"
					}
				},
				messages:{
					curpass:"please enter current password",
					newpass:
					{
						minlength:"Password has to be minimum 6 characters in length",
						required:"Please enter current password"
					},
						
					repassword:{
						minlength:"Password has to be minimum 6 characters in length",
						equalTo:"please re-enter correct password",
						required:"Please enter new password again"
					}
				}
			});
			});
</script>
		
	</body>
</html>