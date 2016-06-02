<!DOCTYPE html>
<html>
	<?php 
	
	include 'header.php';
	$database=new dbconn();
	$accno="123987";
	?>
		<body style=>
			<?php include 'Manager_Index1.php';
			?>
			<!--main content start-->
			

			
			
			<script>
				function hide(){
				$('#Account_details').hide();
				$('#closeaccount').submit(function(){
						 $('#Account_details').show();   
				});
				}
			
			</script>
      		<section id="main-content">
     		 	<section class ="wrapper" style="width:100%;height:100%">
			 <br>
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
							$res=$database->select("Accounts","Account_no,Name,Address,Phone_no,Email,Start_date,Emp_id,Daily_amt","Account_no='$accno' AND Status='1'");
							if(!$res)
								echo "<script>alert ('No such Active account found OR invalid Account number!') </script>";
							else{
								$yest=date('d.m.Y',strtotime("-1 days"));
								echo $yest;
								echo '<form name="closeacc" id="closeacc" method="post" action="#">
								<table class="table table-hover">
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
												<td class="tblcenter">
												<input  name="closeacc" id="closeacc" value="Remove account"  type="submit" onclick="return confirm(\'Are you sure you want to close the account number '.$res[0]['Account_no'].'?\');"></input>
												</td>
												<input type="hidden" name="accno1" id="accno" value="'.$res[0]['Account_no'].'"></input>
											</tr>
											</table>
											</form>';
								
							}
						}
							if(isset($_POST["closeacc"])){
								$accno1=$_POST['accno1'];
								$closedate=date('Y-m-d');
								$yest=date('d.m.Y',strtotime("-1 days"));
								echo $yest;
								$res=$database->update_emp_status("Accounts","Status='0',End_date='$closedate'","Account_no='$accno1'");
								
								if($res){
									echo "<script>alert ('Account successfully closed') </script>";
									return true;
									}
								else
								{
									echo "<script>alert ('Account Could not be closed Check the account number and try again') </script>";
								}
						
						}				
						?>
                   
                   </div>
     		 	
     		</section>
		<?php include 'footer.php'?>	
		
		<script>

			
			
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


