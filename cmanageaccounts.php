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
     		 			<h2 class="lite">Edit accounts</h2>
     		 			</br></br>
						<!--tab nav start-->
	                      	<section class="panel">
	                        	<header class="panel-heading tab-bg-primary ">
		                            <ul class="nav nav-tabs">
		                                <li class="active">
		                                    <a data-toggle="tab" href="#Edit_Account">Edit Account</a>
		                                </li>
		                                <li class="">
		                                    <a data-toggle="tab" href="#Remove_Agent">Remove Agent</a>
		                                </li>
		                            </ul>
	                          	</header>
	                   	<!-- tab nav ends -->
	                          	<div class="panel-body">
	                            	<div class="tab-content ChPassFont">
	                            		<!--ADD AGENT DIV CONTENTS BEGIN -->
	                                	<div id="Edit_Account" class="tab-pane active" >
	                                		<h2>Enter Account Number</h2>
	                                		<hr></br>
	                                		<!-- ADD AGENT FORM BEGINS-->
	                                		<form name="accsearch" id="accsearch" action="Edit_Account_cx.php">
	                                		<!-- table begins-->
		     		 							<table class="ChPassFont" cellpadding="10" >
						     		 				<tr>
						     		 					<td>Enter Bank ID</td>
						     		 					<td><input type="text" name="Bankid" id="Bankid" required></td>
						     		 				</tr>
						     		 				<tr>
						     		 					<td>Enter Branch ID</td>
						     		 					<td><input type="text" name="Branchid" id="Branchid" required></td>
						     		 				</tr>
						     		 				<tr>
						     		 					<td>Enter Account Number</td>
						     		 					<td><input type="text" name="Accnumber" id="Accnumber" required></td>
						     		 				</tr>
						     		 				
						     		 					<tr >
						     		 						<td><input type="submit" name="submit" value="Search">
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
	                                  	<div id="Remove_Agent" class="tab-pane ChPassFont">
	                                  		<h2>Remove agent</h2>
	                                  		<hr></br>
	                                  		<table class="ChPassFont" cellpadding="10" >
	                                  		<form name="revagntfrm" id="rmvagntfrm">
		                                  		
		                                  			<tr><td>Bank Id &nbsp;</td><td><input type="text" name="bankid" id="bankid">&nbsp;&nbsp;</td></tr>
			                                  		<tr><td>Branch Id </td><td><input type="text" name="branchid" id="branchid">&nbsp;&nbsp;</td></tr>
			                                  		<tr><td>Search By Agent Id</td><td> &nbsp;<input type="text" name="agentid" id="agentid">&nbsp;&nbsp;</td></tr>
			                                  		<tr><td>Search By Agent name</td> <td>&nbsp;<input type="text" name="agentname" id="agentname"></td></tr>
		                                  		
		                                  		
		                                  		<tr><td></br><input type="submit" value="Search "name="rmvagentsrch" id="rmvagentsrch"></br><td><tr>
		                                  	</table>

		       	                           	</form>

	                                  	</div>
	                                  	
	                                  	<!--REMOVE AGENT DIV CONTENTS END -->

									</div>
								</div>
	                      	</section>
	                </div>

     		 	</section>
     		 	<?php include 'footer.php';?>
			</body>
	</html>