<!DOCTYPE html>
<!DOCTYPE html>
<html>
	<?php include 'header.php';?>
		<body style=>
			<?php include 'Cashier_Index1.php';?>
			<!--main content start-->
      		<section id="main-content">
     		 	<section class ="wrapper" style="width:100%;height:100%">
                   <!--Date wise report generation -->
                   <div class="ChPassFont">
     		 	   <h3>Welcome to Agent report generation</h3>
                    <div id="Remove_Agent" class="tab-pane ChPassFont">
                        <hr><h4>
                                <form name="revagntfrm" id="rmvagntfrm">
                                    <table class="table">
                                        <tr>
                                            <td>Search By Agent Id</td>
                                            <td><input type="text" name="agentid" id="agentid"></td>
                                            <td>Search By Agent name</td>
                                            <td><input type="text" name="agentname" id="agentname"></td>
                                        </tr>
                                        <tr>
                                            <td><input type="submit" value="Search "name="rmvagentsrch" id="rmvagentsrch"></td>
                                        </tr>
                                    </table>
                                </form>
                            </h4>
                    </div>
                        <!--Div to display report results of Agent-->
                        <div>
                        </div>

     		 	</section>
     		</section>
     	</body>
     	<?php include 'footer.php';?>
</html>
