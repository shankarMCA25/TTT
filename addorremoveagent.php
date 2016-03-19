<!DOCTYPE html>
<html>
	<?php 
	
	include 'header.php';
	$database=new dbconn();
	?>
		<body style=>
			<?php include 'Manager_Index1.php';?>
			<!--main content start-->
      		<section id="main-content">
     		 	<section class ="wrapper" style="width:100%;height:100%">
     		 		<div> 
     		 			<!-- change password title-->
     		 			<h2 class="lite">Add or Remove Employee</h2>
     		 			</br></br>
						<!--tab nav start-->
	                      	<section class="panel">  
	                        	<header class="panel-heading tab-bg-primary ">
		                            <ul class="nav nav-tabs">
		                                <li <?php if(isset($_POST["submit"]) || !(isset($_POST["rmvagentsrch"]) || isset($_POST["submit"]))) echo "class='active'";?> >
		                                    <a data-toggle="tab" href="#Add_Agent">Add Employee</a>
		                                </li>
		                                <li <?php if(isset($_POST["rmvagentsrch"])) echo "class='active'";?> >
		                                    <a data-toggle="tab" href="#Remove_Agent">Remove Employee</a>
		                                </li>
		                            </ul>
	                          	</header>
	                   	<!-- tab nav ends -->
	                          	<div class="panel-body">
	                            	 <div class="tab-content ChPassFont">
	                            		<!--ADD AGENT DIV CONTENTS BEGIN -->
	                                	<div id="Add_Agent" class="tab-pane ChPassFont <?php if(isset($_POST["submit"]) || !(isset($_POST["rmvagentsrch"]) || isset($_POST["submit"]))) echo "active";?>">
	                                		<h2>Enter Agent Details</h2>
	                                		<hr></br>
	                                		<!-- ADD AGENT FORM BEGINS-->
	                                		<form name="Add_emp" id="Add_emp" method="post">
	                                		<!-- table begins-->
		     		 							<table class="ChPassFont" cellpadding="10" >
						     		 				<tr>
													<td>Select Branch id</td>
													<td>
													  <select name="branch_id" id="branch_id">
												<?php
													$db = new dbconn();
													$branches=$db->select("branch","Branch_Id");
													foreach($branches as $row)
													{
														  echo '<option value='.$row['Branch_Id'].'> '.$row['Branch_Id'].' </option>' ;

													}
												?>
													
													
													
													</td>
													</tr>
													<tr>
						     		 					<td>Enter Employee ID</td>
						     		 					<td><input type="text" name="Emp_id" id="Emp_id" required></td>
						     		 				</tr>

						     		 				<tr>
						     		 					<td>Employee Name&nbsp;&nbsp;&nbsp;</td>
						     		 					<td><input type="text" name="Emp_name" id="Emp_name" required></td>
						     		 					
						     		 				</tr>
						     		 				<tr>
						     		 					<td>Primary/Moblie Number</td>
						     		 					<td><input type="text" name="Emp_contact" id="Emp_contact" maxlength=10></td>
						     		 				</tr>
						     		 				<tr>
						     		 						<td>Address&nbsp;&nbsp;&nbsp;</td>
						     		 						<td>
						     		 							<textarea name="Emp_address" id="Emp_address" rows="4" cols="47"  max-width="50%" required></textarea>
						     		 						</td>
						     		 				</tr>
						     		 				<tr>
						     		 					<td>Enter Employee Email</td>
						     		 					<td><input type="email" name="Emp_email" id="Emp_email"required></td>
						     		 				</tr>
						     		 				<tr>
						     		 					<td>Enter Employee type</td>
						     		 					<td> <select name="Emp_type" id="Emp_type" required>
																  <option value="1">Agent</option>
																  <option value="2">Cashier</option>															  
																</select>
														</td>
						     		 				</tr>
						     		 				<tr >
						     		 					<td><input type="submit" name="submit" id="submit" value="Add Agent">
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
	                                  	<div id="Remove_Agent" class="tab-pane ChPassFont <?php if(isset($_POST["rmvagentsrch"])) echo "active";?>">
										
	                                  		<h2>Remove agent</h2>
	                                  		<hr></br>
	                                  		<form name="revagntfrm" id="rmvagntfrm" method="post" >
		                                  		Search By Agent Id &nbsp;<input type="text" name="agentid" id="agentid">&nbsp;&nbsp;
		                                  		Search By Agent name &nbsp;<input type="text" name="agentname" id="agentname">
		                                  		<hr>	
		                                  		</br><input type="submit" value="Search" name="rmvagentsrch" id="rmvagentsrch"></br>

		       	                           	</form>
											
											<hr>
										<div><?php
										if(isset($_POST["rmvagentsrch"])){
											
											$emp_id=$_POST['agentid']; 
											$emp_name=$_POST['agentname'];
											if(!(($emp_id || $emp_name) ===true))
											{
												
												echo"<script>alert('Insert Agent ID or Agent Name')</script>";
											}
											else{
											$res=$database->select("Employee","Emp_id,Emp_name","Emp_name='$emp_name'");	
											echo '<center><table class="tblcenter">
												<tr>
													<th>Employee Id</th>
													<th>Employee Name</th>
													<th></th>
												</tr>';
											//	count($res);
											 
											 foreach($res as $result)
												echo
													'<tr>
														<td>'.$result['Emp_id'].
														'</td>'.
														'<td>'.$result['Emp_name'].
														'</td><td><input type="submit" <!--href="dlete.php?id=".$result['Emp_id'].-->"></input><td>
														
													</tr>';
												
											
											
										}
										}
										
										?></div>
	                                  	</div>
										
									</div>
								</div>
								
	                      	</section>
	                </div>

     		 	</section>
     		 	<?php include 'footer.php';?>
			

			<?php	


			function generatePassword($length = 16) {
				$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*_-=+)(\}{;".,';
			$count = mb_strlen($chars);

			for ($i = 0, $result = ''; $i<$length; $i++) 
			{
				$index = rand(0, $count - 1);
			    $result .= mb_substr($chars, $index, 1);
			    }
			return $result;
			
			}
?>
<?php
			if(isset($_POST["submit"])){
			
					$eid=$_POST['Emp_id'];
					$en=$_POST['Emp_name'];
			 		$ec=$_POST['Emp_contact'];
			 		$ea=$_POST['Emp_address'];
			 		$ee=$_POST['Emp_email'];
			 		$et=$_POST['Emp_type'];
					$password=generatePassword();
				
					$res=$database->insert("Employee","Branch_Id,Emp_id,Emp_name,Emp_address,Emp_contact,Emp_email,Emp_Status,Emp_type","'1','$eid','$en','$ea','$ec','$ee','1','$et'");
					if($res ===true)
						echo "<script>alert('Inserted successfully');</script>";
					else{
						echo "<script>alert('$database->error()');</script>";
					}
					
					
					 
			}
			

			
			?>

			<script>
			// Script for validation begins 
			

			$(document).ready(function()
			{




				$( "#Emp_contact" ).validate({
				  rules: {
				    Emp_contact: {
				      required: true,
				      minlength: 10,
				      maxlength: 10
				    }
				  }
				});//.validate end


				$('#Emp_contact').keypress(function (Emp_contact) {
		        var regex = new RegExp("^[0-9]+$");
		        var str = String.fromCharCode(!Emp_contact.charCode ? Emp_contact.which : Emp_contact.charCode);
		        if (regex.test(str)) {
		            return true;
		        }
		        else
		        {
		        Emp_contact.preventDefault();
		        
		        return false;
		        }
				});
				
				$('#Emp_name').keypress(function (Emp_name) {
		        var regex = new RegExp("^[a-z A-Z]+$");
		        var str = String.fromCharCode(!Emp_name.charCode ? Emp_name.which : Emp_name.charCode);
		        if (regex.test(str)) {
		            return true;
		        }
		        else{
					Emp_name.preventDefault();
		        		return false;
		        }
		    });

				$.validator.methods.Emp_email = function( value, element ) {
			  		return this.optional( element ) || /[a-z]+@[a-z]+\.[a-z]+/.test( value );
				},"Enter Valid email address";

				$.validator.methods.Emp_name = function( value, element ) {
			  		return this.optional( element ) || /[a-zA-Z]/.test( value );
				},"Name cannot have numbers or special symbols";

				$("#Add_emp").validate({
					rules:{
						Emp_id:"required",
						Emp_name:"required",
						Emp_contact:"required",
						Emp_email:"required",
						Emp_address:"required",
						Emp_name:{
							required:true,
							minlength:2
						},	
						Emp_contact:{
							required:true,
							minlength:10,
							maxlength:10
						},
						Emp_email:{
							Emp_email:true,
							required:true
						},
						Emp_address:{
							required:true,
							minlength:10
						},

					},
					// Messages for error message
					messages:{
						// Message for Employee ID
						Emp_id:"Kindly enter the Employee Id",
						// Message for Employee name
						Emp_name:{
							required:"Please Enter the Employee name",
							minlength:"Your Employee name should have atleast 2 characters"
						},
						// Message for Employee contact number
						Emp_contact:{
							required : "Please enter valid value",
							minlength:"Invalid Contact Number, Number must be of 10 Digits",
							maxlength:"Invalid Contact Number, Number must be of 10 Digits"
						},
						// Message for Employee email
						Emp_email: "Please enter valid email address",
						// Message for Employee address
						Emp_address:{
							minlength:"Enter a Vaild Address"

						},//of Emp_address  
					}//Of .message
				})//Of #add_emp validate function
			})//of ready function
			

			</script>
			</body>

	</html>