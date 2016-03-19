<!DOCTYPE html>
<html>
	<?php include 'header.php';?>
		<body style=>
			<?php include 'Cashier_Index1.php';?>
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
	                                		<form name="addagent" id="addagent">
	                                		<!-- table begins-->
		     		 							<table class="ChPassFont" cellpadding="10" >
						     		 				<tr>
						     		 					<td>Bank ID</td>
						     		 					<td><input type="text" name="Bankid" id="Bankid" required></td>
						     		 				</tr>
						     		 				<tr>
						     		 					<td>Branch ID</td>
						     		 					<td><input type="text" name="Branchid" id="Branchid" required></td>
						     		 				</tr>
						     		 				<tr>
						     		 					<td>Agent ID</td>
						     		 					<td><input type="text" name="Agentid" id="Agentid" required></td>
						     		 				</tr>

						     		 				<tr>
						     		 					<td>First Name&nbsp;&nbsp;&nbsp;<input type="text" name="fname" id="fname" required></td>
						     		 					<td>Middle Name&nbsp;&nbsp;&nbsp; <input type="text" name="mname" id="mname" required></td>
						     		 					<td>Last Name&nbsp;&nbsp;&nbsp;<input type="text" name="lname" id="lname" required></td>
						     		 				</tr>
						     		 				<tr>
						     		 					<td>Upload Image</td>
						     		 					<td><input type="file" name="pic" accept="image/*"></td>
						     		 				</tr>
						     		 				<tr>
						     		 					<td>QR CODE</td>
						     		 					<td><input type="file" name="pic" accept="image/*">Query to fetch the QR CODE FROM DB</td>
						     		 				</tr>
						     		 				<tr>
						     		 					<td>Primary/Moblie Number</td>
						     		 					<td><input type="number"  name="Pno" maxlength="10" required></td>
						     		 				</tr>
						     		 				<tr>
						     		 					<td>Alternate Number</td>
						     		 					<td><input type="text" name="Altno"></td>
						     		 				</tr>
						     		 				<tr>
						     		 					<td>Moblie updates</td><td> <input type="checkbox" name="message_mob" id="mm"></td>
						     		 				</tr>
						     		 				<tr>
						     		 						<td>Address&nbsp;&nbsp;&nbsp;</td>
						     		 						<td>
						     		 							<textarea rows="4" cols="47"></textarea>
						     		 						</td>
						     		 					</tr>
						     		 					<tr >
						     		 						<td><input type="submit" name="submit" value="Add Agent">
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
	                                	<!--REMOVE AGENT DIV CONTENTS BEGIN -->		
	                                  	<!-- div id="Remove_Agent" class="tab-pane ChPassFont">
	                                  		<h2>Remove agent</h2>
	                                  		<hr></br>
	                                  		<form name="revagntfrm" id="rmvagntfrm">
		                                  		Bank Id &nbsp;<input type="text" name="bankid" id="bankid">&nbsp;&nbsp;
		                                  		Branch Id &nbsp;<input type="text" name="branchid" id="branchid">&nbsp;&nbsp;
		                                  		Search By Agent Id &nbsp;<input type="text" name="agentid" id="agentid">&nbsp;&nbsp;
		                                  		Search By Agent name &nbsp;<input type="text" name="agentname" id="agentname">
		                                  		<hr>	
		                                  		</br><input type="submit" value="Search "name="rmvagentsrch" id="rmvagentsrch"></br>

		       	                           	</form>

	                                  	</div> -->
	                                  	
	                                  	<!--REMOVE AGENT DIV CONTENTS END -->

									</div>
								</div>
	                      	</section>
	                </div>

     		 	</section>
     		 	<?php include 'footer.php';?>
			</body>
	</html>