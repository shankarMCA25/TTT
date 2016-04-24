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
     		 			<h2 class="lite">Account details</h2>
     		 			
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
	                                		<form name="Edit_cx_account" id="Edit_cx_account" action="#">
	                                		<!-- table begins-->
		     		 							<table class="ChPassFont" cellpadding="10" >
						     		 				<tr>
														<td>Account Number</td>
														<td><input type="text" value="<?php echo $account_no;?>" disabled ></td>
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
						     		 							<textarea rows="4" cols="47" value=""><?php echo $acc_address;?></textarea>
						     		 						</td>
						     		 					</tr>
						     		 					<tr >
						     		 						<td><input type="submit" name="submit" value="Change account details">
						     		 						</td>
							     		 					<td><input type="button" name="pswdcancel" value="Cancel">
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
     		 	<?php include 'footer.php';?>
			</body>
	</html>