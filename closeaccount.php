<!DOCTYPE html>
<!DOCTYPE html>
<html>
	<?php 
	
	include 'header.php';
	$database=new dbconn();
	?>
		<body style=>
			<?php include 'Manager_Index1.php';?>
			<!--main content start-->
			

			
			<?php/*<script>
		function hide(){
		$('#Account_details').hide();
				$('#closeaccount').submit(function(){
						 $('#Account_details').show();   
				});
				}
			
			</script>*/
      		<section id="main-content">
     		 	<section class ="wrapper" style="width:100%;height:100%">
			 
                   <!--Search account to close -->
     		 	   <div class="ChPassFont"   >
                        <form name="closeaccount" id="closeaccount" method="post" action="#" >
                            <h3>Enter Account Holders Account Number</h3>
                            <hr>
                           
                                <table id="clsacctbl" class="table table-hover" >
                                    
                                    <tr>
                                        <td>Enter Account Number &nbsp;&nbsp;&nbsp;</td>
                                        <td><input type="text" name="accno" id="accno" required></td>
                                    </tr>
                                    <tr>
                                        <td><input type="submit" name="submit" id="submit" value="Search Account"></td>
                                    </tr>
                                </table>
                            
                       
                        </form>   
     		 	   </div>
                   
                   <!-- emptydiv to show the content-->
                   <div class="ChPassFont" name ="Account_details" id="Account_details" >
                           <h3 class="textcenter"> Details about the account</h3>
						   <hr>
							
							
						<?php
						if(isset($_POST["submit"])){
							$accno=$_POST['accno'];
							$res=$database->select("Accounts","Account_no,Name,Address,Phone_no,Email,Start_date,Emp_id,Daily_amt","Account_no='$accno'");
							if(!$res)
								echo "<script>alert ('No such account found OR invalid Account number!') </script>";
							else{

								echo '<table class="table table-hover">
								<tr>
								<th> Details</th>
								<th>Information</th>
								</tr>
											<tr>
												<td>Account number
												</td>
												<td>
													'.$res[0]['Account_no'].'
												</td>
											</tr>
											<tr>
												<td>Account Holders name
												</td>
												<td>
													'.$res[0]['Name'].'
												</td>
											</tr>
											<tr>
												<td>Address
												</td>
												<td>
													'.$res[0]['Address'].'
												</td>
											</tr>
											<tr>
												<td>Contact Number
												</td>
												<td>
													'.$res[0]['Phone_no'].'
												</td>
											</tr>
											<tr>
												<td>Email
												</td>
												<td>
													'.$res[0]['Email'].'
												</td>
											</tr>
											<tr>
												<td>Date of account creation
												</td>
												<td>
													'.$res[0]['Start_date'].'
												</td>
											</tr>
											<tr>
												<td>Associated Agent Id
												</td>
												<td>
													'.$res[0]['Emp_id'].'
												</td>
											</tr>
											<tr>
												<td>Daily Deposit Amount
												</td>
												<td>
													'.$res[0]['Daily_amt'].'
												</td>
											</tr>
												<tr>
												<td>Total Balance Amount
												</td>
												<td>
													'.$accno.'
												</td>
											</tr>
												<tr>
												<td class="tblcenter"><input type="submit" name="removeaccount" value="Remove account" onclick="return checkDelete()" ></input>
												</td>
												
											</tr>
											</table>';
								
							}
						}
						if(isset($_POST['removeaccount'])){
							$res=$database->update_emp_status("Accounts","Status","Account_no='$accno'");
							if($res)
								return true;
							else{
								echo "<script>alert ('Account successfully closed') </script>";
							}
						}
											
						?>
                   
                   </div>
     		 	
     		</section>
		<?php include 'footer.php'?>	
		<script language="JavaScript" type="text/javascript">
		function checkDelete(){
			var $del;
				 $del=confirm('Are you sure you want to close this account?');
				 if($del){
					 $.get("delete.php");
					 return true;
				 }
				 return false;
			}
		</script>
		<script>
/*		function hide(){
		$('#Account_details').hide();
				$('#closeaccount').submit(function(){
						 $('#Account_details').show();   
				});
				}*/
			
			$(document).ready(function()
			{
				

				//Script for validation
				$("#closeaccount").validate({
					rules:{
						accno:"required"
					},//rules end
					
					message:{
						accno:"Please enter Account Number"
					}//Message end
					
				})//.validate
			})//Function ready closes
				//hide();		
		</script>
     			</body>
     	
		
</html>


