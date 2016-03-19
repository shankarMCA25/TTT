<!DOCTYPE html>
<!DOCTYPE html>
<html>
	<?php include 'header.php';?>
		<body>
			<?php include 'Cashier_Index1.php';?>
			<!--main content start-->
      		<section id="main-content">
     		 	<section class ="wrapper" style="width:100%;height:100%">
                   <!--Date wise report generation -->
                   <div class="ChPassFont">
     		 	   <h3>Welcome to date wise report generation</h3></br>
                        <h4 class="tblcenter">
                            Select range for date wise report
                            <hr>
                            <form action="#" name="datewisereport" id="dwreport">
                                <table class="table">
                                <tr>
                                    <td>Enter account number</td>
                                    <td><input type="text" name="accno" id="accno"></td>
                                    <td>Select Start date</td>
                                    <td><input type="date" name="sdate" id="startdate"></td>
                                    <td>Select End date</td>
                                    <td><input type="date" name="edate" id="enddate"></td>
                                    <td><input type="submit" name="dtrptgen" id="dtrptgen"></td>
                                </tr>
                                </table>
                            </form>
                            <hr>
                        </h4>
                    </div>
                        <!--Div to display report results-->
                        <div>
                        </div>

     		 	</section>
     		</section>
     	</body>
     	<?php include 'footer.php';?>
</html>
