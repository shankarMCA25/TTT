<!DOCTYPE html>

	<?php 
		$title='Change Account details';
		include 'header.php';
		include 'Cashier_Index1.php';
		require_once 'dbconn.php';
		if(isset($_POST["Edit_Account_cx"]))
		{
			$branch_id=$_POST['Branchid'];
			$account_no=$_POST['Accnumber'];
			$Account_details=$db->select("Accounts","*","Account_no=$account_no");
			$acc_name=$Account_details[0]['Name'];
			$acc_address=$Account_details[0]['Address'];
			$acc_email=$Account_details[0]['Email'];
			$acc_contact=$Account_details[0]['Phone_no'];
			$acc_address=$Account_details[0]['Address'];
			$agent_list=$db->select("Employee","Emp_name,Emp_id","Emp_type=3");
			
		}
	
		
	?>
		<body>
			<!--main content start-->
      		<section id="main-content">
     		 	<section class ="wrapper" style="width:100%;height:100%">
     		 		<div> 
     		 			<!-- change password title-->
     		 			<h2 class="lite tblcenter">Account details</h2>
     		 			
						<!--tab nav start-->
	                      	<section class="panel">
	                        	<header class="panel-heading tab-bg-primary ">
		                            <ul class="nav nav-tabs">
		                                <li class="active">
		                                    <a data-toggle="tab" href="Edit_Account_cx.php">Edit Account</a>
		                                </li>
		                                <!-- <li class="">
		                       cashieragentreport             <a data-toggle="tab" href="#Remove_Agent">Remove Agent</a>
		                                </li> -->
		                            </ul>
	                          	</header>
	                   			<!-- tab nav ends -->
	                          	<div class="panel-body">
	                            	<div class="tab-content ChPassFont">
	                            		<!--ADD AGENT DIV CONTENTS BEGIN -->
	                                	<div id="Add_Agent" class="tab-pane active">
	                                		
	                                		<!-- ADD AGENT FORM BEGINS-->
	                                		<form name="Edit_cx_account_update" id="Edit_cx_account_update" action="#" method="post">
											<input type="hidden" name="Edit_Account_cx" value="<?php echo $_POST["Edit_Account_cx"]; ?>">
											<input type="hidden" name="Branchid" value="<?php echo $_POST["Branchid"]; ?>">
											<input type="hidden" name="Accnumber" value="<?php echo $_POST["Accnumber"]; ?>">
	                                		<!-- table begins-->
		     		 							<table class="ChPassFont" cellpadding="10" >
						     		 				<tr>
														<td>Account Number</td>
														<td><input type="text" name="account_no" value="<?php echo $_POST["Accnumber"]; ?>" disabled ></td>
													</tr>
						     		 				<tr>
						     		 					<td>Branch ID</td>
						     		 					<td><input type="text" name="Branchid" value="<?php echo $branch_id;?>" id="Branchid" disabled></td>
						     		 				</tr>
						     		 				<tr>
						     		 					<td>Agent ID</td>
						     		 					<td>
															<select name="Select_agent" >
																<?php 
																	foreach($agent_list as $row){
																		echo '<option value='.$row['Emp_id'].'> '.$row['Emp_id'].' </option>' ;
																}?>
																
															</select>
						     		 				</tr>

						     		 				<tr>
						     		 					<td>Full Name&nbsp;&nbsp;&nbsp;</td>
														<td><input type="text" name="fullname" id="fname" value="<?php echo $acc_name;?>" required></td>
						     		 					
						     		 				</tr>
						     		 				<tr>
						     		 					<td>Upload Image</td>
						     		 					<td><input type="file" name="pic" accept="image/*"></td>
						     		 				</tr>
						     		 				
						     		 				<tr>
						     		 					<td>Primary/Moblie Number</td>
						     		 					<td><input type="number"  name="Pno" maxlength="10" value="<?php echo $acc_contact?>"></td>
						     		 				</tr>
						     		 				<tr>
						     		 					<td>Email Address</td>
						     		 					<td><input type="text" name="Email_id" value="<?php echo $acc_email;?>"></td>
						     		 				</tr>
						     		 				<tr>
						     		 					<td>Moblie updates</td><td> <input type="checkbox" checked="checked" name="message_mob" id="mm"></td>
						     		 				</tr>
													<tr>
						     		 					<td>Email updates</td><td> <input type="checkbox" checked="checked" name="message_email" id="em"></td>
						     		 				</tr>
						     		 				<tr>
						     		 						<td>Address&nbsp;&nbsp;&nbsp;</td>
						     		 						<td>
						     		 							<textarea rows="4" cols="47" name="address" value=""><?php echo $acc_address;?></textarea>
						     		 						</td>
						     		 					</tr>
						     		 					<tr >
						     		 						<td><input type="submit" name="submit" value="Change account details" onclick="return confirm('Are you sure you want to update the changes?')">
						     		 						</td>
							     		 					<td><input type="button" name="pswdcancel" value="Cancel" onclick="history.back();">
							     		 					</td>
							     		 				</tr>
						     		 			</table>
					     		 				<!--table ends -->
	                                		</form>
	                                		<!-- ADD AGENT FORM ENDS-->
	                                	</div>
	                                	<!--ADD AGENT DIV CONTENTS END -->
	                                	

									</div>
								</div>
	                      	</section>
	                </div>

     		 	</section>
<?php 		if(isset($_POST["submit"]))
		{
			
			$branch_id=$_POST['Branchid'];
			$account_no1=$_POST['Accnumber'];
			$acc_name=$_POST['fullname'];
			$acc_email=$_POST['Email_id'];
			$acc_contact=$_POST['Pno'];
			$acc_address=$_POST['address'];
			$agent_no=$_POST['Select_agent'];
			if($_POST['message_mob']=='on')
			{
				$mopt=1;
			}
			else
			{
				$mopt=0;
			}
			
			if($_POST['message_email']=='on')
			{
				$eopt=1;
			}
			else
			{
				$eopt=0;
			}
			
		
			$pic;
			
			$res=$db->update_emp_status("accounts","name='$acc_name',address='$acc_address',phone_no=$acc_contact,email='$acc_email',email_status=$eopt,msg_status=$mopt,Emp_id=$agent_no","Account_no=$account_no1");
			echo "<script type='text/javascript'>alert('Updated successfully'); window.location.replace('cmanageaccounts.php');</script>";
		}
		?>				
     		 	<?php include 'footer.php';?>
			</body>
	</html>