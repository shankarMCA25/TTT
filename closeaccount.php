<!DOCTYPE html>
<!DOCTYPE html>
<html>
	<?php include 'header.php';?>
		<body style=>
			<?php include 'Manager_Index1.php';?>
			<!--main content start-->
      		<section id="main-content">
     		 	<section class ="wrapper" style="width:100%;height:100%">
                   <!--Search account to close -->
     		 	   <div class="ChPassFont" >
                        <form name="closeaccount" id="closeacc" method="post" action="#">
                            <h2>Enter Account holders name/Account Number</h2>
                            <hr>
                            <h4>
                                <table id="clsacctbl" class="table" >
                                    <tr>
                                        <td>Enter Account holders name &nbsp;&nbsp;&nbsp; </td>
                                        <td><input type="text" name"accname" id="accname"></td>
                                    </tr>
                                    <tr>
                                        <td>Enter Account Number &nbsp;&nbsp;&nbsp;</td>
                                        <td><input type="text" name"accno" id=<"accno"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="submit" name="sumbit" value="Search Account"></td>
                                    </tr>
                                </table>
                            </h4>
                       
                        </form>   
     		 	   </div>
                   </section>
                   <!-- emptydiv to show the content-->
                   <div class="ChPassFont tblcenter">
                            Details about the account
                   
                   </div>
     		 	
     		</section>
     	</body>
     	<?php include 'footer.php';?>
</html>
`