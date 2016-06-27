<!DOCTYPE html>
<html>
	<?php 
	$page="Edit Accounts/agents";
	include 'header.php';
	?>
		<body style=>
			<?php include 'Manager_Index11.php';?>
			<!--main content start-->
      		<section id="main-content">
     		 	<section class ="wrapper" style="width:100%;height:100%">
     		 		<div> 
     		 			<!-- change password title-->
     		 			<h2 class="lite tblcenter">Manage Customer accounts</h2>
     		 			</br></br>
						<!--tab nav start-->
	                      	<section class="panel">
	                        	<header class="panel-heading tab-bg-primary ">
		                            <ul class="nav nav-tabs">

											<li class="active">
											<a data-toggle="tab" href="#Remove_Agent">Add New Customer Agent</a>
										</li>
										<li class="nav-tabs">
		                                    <a data-toggle="tab" href="#Edit_Account">Manage Existing Account</a>
		                                </li>
		                                <li class="nav-tabs">
		                                    <a data-toggle="tab" href="#Close_Account">Close Existing Account</a>
		                                </li>
		                                
		                            </ul>
	                          	</header>
	                   	<!-- tab nav ends -->
	                          	<div class="panel-body">
	                            	<div class="tab-content ChPassFont">
	                            		
	                                	<!--ADD AGENT DIV CONTENTS END -->
	                                	<!--REMOVE AGENT DIV CONTENTS BEGIN -->		
	                                  	<div id="Remove_Agent" class="tab-pane ChPassFont active">
	                                  		<h2>Add New Customer</h2>
	                                  		<hr></br>
	                                  		<table class="table tab-pane active" cellpadding="10" >
	                                  		<form name="add_account" id="add_account" action="#" method="post">
		                                  		
		                                  			
			                                  		<tr><td>Branch Id </td><td><select name="branch_id" id="branch_id">
												<?php
													// $db = new dbconn();
													$branches=$db->select("branch","Branch_Id");
													foreach($branches as $row)
													{
														  echo '<option value='.$row['Branch_Id'].'> '.$row['Branch_Id'].' </option>' ;
													}
												?></td></tr>
												<tr>
													<td>Account Holders name</td>
													<td><input type="text" name="cx_name" id="cx_name" min required></td>
												</tr>
												<tr>
													<td>Account number </td>
													<td><input type="text" name="cx_accno" id="cx_accno" required></td>
												</tr>
												
												
												
												<tr>
													<td>Primary/Moblie Number</td>
													<td><input type="text" name="cx_contact" id="cx_contact" maxlength=10></td>
												</tr>

												<tr>
														<td>Address&nbsp;&nbsp;&nbsp;</td>
														<td>
															<textarea name="cx_address" id="cx_address" rows="4" cols="47"  max-width="50%" required></textarea>
														</td>
												</tr>
												<tr>
													<td>Account holder's Email</td>
													<td><input type="email" name="cx_email" id="cx_email" required></td>
												</tr>
												<tr>
													<td>Upload Account holders form</td>
													<td><input type="file" name="Img_path" id="Img_path" required></td>
												</tr>
												<tr>
													<td>Agent id</td>
													<td>
													<select name="emp_id" id="emp_id">
													<?php
													
													$agentid=$db->select("employee","Emp_name,Emp_id","Emp_type=3");
													foreach($agentid as $row)
													{
														
														  echo '<option value='.$row['Emp_id'].'> '.$row['Emp_name'].' </option>' ;
													}
												?></td>
												</tr>
												<tr>
						     		 					<td>Moblie updates</td><td> <input type="checkbox" checked="checked" name="message_mob" id="mm"></td>
						     		 				</tr>
													<tr>
						     		 					<td>Email updates</td><td> <input type="checkbox" checked="checked" name="message_email" id="em"></td>
						     		 				</tr>
												<tr>
												<tr>
												<td>Daily amount</td>
												<td><input type="text" name="daily_amount" id="daily_amount" required></td></tr>
													<td><input type="submit" name="Add_cx" id="submit" value="Next">
													</td>
													<td><input type="button" name="pswdcancel" value="Cancel">
													</td>
												</tr>
											</table>
					     		 				<!--table ends -->
	                                		</form>


	                                  	</div>
										<!--ADD AGENT DIV CONTENTS BEGIN -->
	                                	<div id="Edit_Account" class="tab-pane" >
	                                		<h2>Enter Account Number</h2>
	                                		<hr></br>
	                                		<!-- ADD AGENT FORM BEGINS-->
	                                		<form name="accsearch" id="accsearch" action="Edit_Account_cx.php" method="post">
	                                		<!-- table begins-->
		     		 							<table class="ChPassFont" cellpadding="10" >
						     		 				
						     		 				<tr>
						     		 					<td>Enter Branch ID</td>
						     		 					<td><input type="text" name="Branchid" id="Branchid" required></td>
						     		 				</tr>
						     		 				<tr>
						     		 					<td>Enter Account Number</td>
						     		 					<td><input type="text" name="Accnumber" id="Accnumber" required></td>
						     		 				</tr>
						     		 				
						     		 					<tr >
						     		 						<td><input type="submit" name="Edit_Account_cx" value="Search">
						     		 						</td>
							     		 					<td><input type="button" name="pswdcancel" value="Cancel">
							     		 					</td>
							     		 				</tr>
						     		 			</table>
					     		 				<!--table ends -->
	                                		</form>
	                                		<!-- ADD AGENT FORM ENDS-->
	                                	</div>
	                                  	
	                                  	<!--REMOVE AGENT DIV CONTENTS END -->
										<!--CLOSE ACCOUNT DIV CONTENTS BEGIN -->
	                                	<div id="Close_Account" class="tab-pane" >
	                                		<h2>Enter Account Number</h2>
	                                		<hr></br>
	                                		<!-- ADD AGENT FORM BEGINS-->
	                                		<form name="accsearch" id="accsearch" action="Edit_Account_cx.php" method="post">
	                                		<!-- table begins-->
		     		 							<table class="table" cellpadding="10" >
						     		 				
						     		 				<tr>
						     		 					<th>Enter Branch ID</th>
						     		 					<td><input type="text" name="Branchid" id="Branchid" required></td>
						     		 				</tr>
						     		 				<tr>
						     		 					<th>Enter Account Number</th>
						     		 					<td><input type="text" name="Accnumber" id="Accnumber" required></td>
						     		 				</tr>
						     		 				
						     		 					<tr >
						     		 						<td><input type="submit" name="Edit_Account_cx" value="Search">
						     		 						</td>
							     		 					<td><input type="button" name="pswdcancel" value="Cancel">
							     		 					</td>
							     		 				</tr>
						     		 			</table>
					     		 				<!--TABLE ends -->
	                                		</form>
	                                		<!-- ADD AGENT FORM ENDS-->
	                                	</div>
	                                  	
	                                  	<!--CLOSE ACCOUNT DIV CONTENTS END -->

									</div>
								</div>
	                      	</section>
	                </div>

     		 	</section>
				</section>
				<?php
				if(isset($_POST['Add_cx'])){
					$message_mob=$_POST['message_mob'];
					$message_email=$_POST['message_email'];
					if($message_email=='on'){
						$message_email=1;
					}
					else{
						$message_email=0;
					}
					if($message_mob=='on'){
						$message_mob=1;
					}
					else{
						$message_mob=0;
					}
					$branch_id=$_POST['branch_id'];
					$cx_name=$_POST['cx_name'];
					$cx_accno=$_POST['cx_accno'];
					$cx_contact=$_POST['cx_contact'];
					$cx_address=$_POST['cx_address'];
					$cx_email=$_POST['cx_email'];
					$Img_path=$_POST['Img_path'];
					$emp_id=$_POST['emp_id'];
					$daily_amount=$_POST['daily_amount'];
					$Img_path1="Profile_image";
					$res=$db->insert("accounts","branch_id,Name,Account_no,address,phone_no,Email,Pass,Email_status,msg_status,daily_amt,Start_date,End_date,Status,Emp_id,Prof_img","'$branch_id','$cx_name','$cx_accno','$cx_address','$cx_contact','$cx_email','PASS','$message_email','$message_mob','$daily_amount',CURRENT_DATE,'9999-12-31',1,'$emp_id','Profile_image/$Img_path'");
					if(move_uploaded_file($Img_path,"$Img_path1/$cx_accno"))
					{
						echo'<script>alert("Couldnot move")</script>';
					}

				}
				?>
		
     		 	<?php include 'footer.php';?>
			</body>
	</html>