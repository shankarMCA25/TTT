<?php
	//Start session
	include "header.php"; 
	//session_start();	//Include database connection details
	//include "dbconn.php";
	include "email.php";


$title = "login";

//head($title); 
?>


<script>
$( document ).ready(function() {
    $.validator.methods.email = function( value, element ) {
  		return this.optional( element ) || /[a-z]+@[a-z]+\.[a-z]+/.test( value );
	},"Enter Valid email address";

$("#forgotpassform").validate({
rules: {
      	email: {
				required: true,
				email: true
		}
},
 messages: {
       		email: "Please enter valid email address",
 },
 });

});
</script>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    
      <div class="modal-body";>
        <h3 align="center">Invalid Email Address!!</h3>
      </div>
      <div class="modal-footer">
        <a class="btn btn-primary" data-dismiss="modal" href="forgotpass.php?email='.$email.'">Close</a>
        <!-- <a class="btn btn-primary" href="login.php">Login</a> -->
      </div>
    </div>
  </div>
</div>

<?php
if(isset($_POST["login-form-submit"]))
{ 
	$email=$_POST["email"];

	$database= new dbconn();
	$res = $database->select("register","id,name,email","email='$email'");
	if($res === false)
	{
		echo "<script>$( document ).ready(function() { $('#myModal').modal('show');});</script>";	
		
	}
	else
	{
		$code = rand(100000,999999);
		$hash = md5($res[0]['id']+$code);
		$result = $database->update("register","code='$code' ,expiry_date=DATE_ADD(now(),INTERVAL 30 MINUTE) ","email='$email'");
		if(count($res)==1)
        {
           // PREPARE THE BODY OF THE MESSAGE
			$message = mail_func($res[0]['name'],$code,$hash);
	        //   CHANGE THE BELOW VARIABLES TO YOUR NEEDS
			$to = 'akshay@w3effects.com';
			$subject = 'FurbStreet - Password Change Reqest';
			$headers = "From: noreply@furbstreet.com\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	        if (mail($to, $subject, $message, $headers)) 
	        {
	          $message = "The link and the verification code has been sent, please check your mail.";
	        } 
	        else 
	        {
	          $message ="There was a problem sending the email.";
	        }
	          
        }
        else
        {
            $message = "Account not found please signup now!!"; 
        }
        echo "<script>$( document ).ready(function() { $('#myModal1').modal('show');});</script>";
	}
		
}
?>


<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    
      <div class="modal-body">
        <h4 align="center"><?= $message; ?></h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>


<!-- Content
		============================================= -->
		<section >

	



			<div class="section nobg full-screen nopadding nomargin">
					<div class="container vertical-middle divcenter clearfix">

						<div class="panel panel-default divcenter noradius noborder" style="max-width: 400px; background-color: rgba(51, 51, 51, 0.15);">

							<div class="panel-body" style="padding: 40px;">
								<form id="forgotpassform" name="forgotpass-form" class="nobottommargin" action="" method="post">
									<h3>Forget Password</h3><br>

									<div class="col_full">
									<label for="register-form-email">Email Address:</label>
									<input type="email" id="email" name="email" placeholder="Enter valid Email Address" <?php if(isset($_GET['email'])) echo "value='$_GET[email]'"; ?> class="form-control" />
								</div><br>
									<div class="col_full nobottommargin">
									<input type="submit" class="button button-3d button-black nomargin" id="login-form-submit" name="login-form-submit" value="Reset Password">
	
								</form>
							</div>
						</div>
				</div>
	
			</div>
		</div>
	</section>

	<!-- #wrapper end -->
	<section id="footer" class="dark" >
	<?php include "footer.php"; ?>
	
	</body>
</html>
