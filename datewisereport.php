<!DOCTYPE html>
<!DOCTYPE html>
<html>
	<?php include 'header.php';?>
		<body>
			<?php include 'Manager_Index1.php';?>
			<!--main content start-->
      		<section id="main-content">
     		 	<section class ="wrapper" style="width:100%;height:100%">
                   <!--Date wise report generation -->
                   <div class="ChPassFont">
     		 	   <h3>Welcome to date wise report generation</h3></br>
                        <h4 class="tblcenter">
                            Select range for date wise report
                            <hr>
                            <form action="#" name="datewisereport" class="datewisereport" id="dwreport">
                                <table class="table">
                                <tr>
                                    <td>Enter account number</td>
                                    <td><input type="text" name="accno" id="accno" required></td>
                                    <td>Select Start date</td>
                                    <td><input type="text" name="sdate" id="startdate" required placeholder="MM-DD-YYYY"></td>
                                    <td>Select End date</td>
                                    <td><input type="text" name="edate" id="enddate" required placeholder="MM-DD-YYYY"></td>
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
        <script>

        $(document).ready(function()
            {

                 $("#startdate").datepicker({
                        minDate: -900,
                        maxDate: "+60D",
                        numberOfMonths: 2,
                        onSelect: function(selected) {
                          $("#enddate").datepicker("option","minDate", selected)
                        }
                    });
                    $("#enddate").datepicker({ 
                        minDate: 0,
                        maxDate:"+60D",
                        numberOfMonths: 2,
                        onSelect: function(selected) {
                           $("#startdate").datepicker("option","maxDate", selected)
                        }
                    });  




                $(".datewisereport").validate({
                    rules:{
                        accno:"required"

                    },//Rules end

                    messages:{
                        accno:"Please Enter an account number"
                    }//Message end
                   });//#dwreport.validate end 
            });//of Document ready function
            
            // TESTING DATE VALIDATION
       





        </script>

</html>
