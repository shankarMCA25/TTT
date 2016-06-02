<!DOCTYPE html>
<?php 
	$title ='Login';
	include 'header.php';	
?>
  <body class="login-img3-body">
  <div class="wrapper lite tblcenter"><h1>Welcome to Pigmy Financial Account Management System</h1></div>


    <div class="container">

      <form class="login-form" name="login" action="#" method="POST">        
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="text" name="username" class="form-control placeholder" placeholder="Username" autofocus required>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input type="password" name="passkey" class="form-control" placeholder="Password" required>
            </div>
            <label class="checkbox">
               
                <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
            </label>
            <button name="submit" class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
            
        </div>
      </form>

    </div>


  </body>
</html>
<?php 
	if(isset($_POST['submit'])){
		$db=new dbconn();
		
		$uname=$_POST['username'];
		$passkey=$_POST['passkey'];
		$res=$db->select("login","Emp_id,Emp_type","username='$uname' AND password='$passkey'");
		//echo '<script>alert("'.$res[0]["Emp_id"].'")</script>';
		if($res)
		{
			$role=$res[0]['Emp_type'];
			if($res[0]['Emp_type']=='1')
			{
				$_SESSION["Emp_id"]=$res[0]["Emp_id"];
				$_SESSION["Emp_type"]=1;
				$link = 'manager_homepage.php';
				
				echo "<script>window.location.href='$link';</script>";
				
			}
			if($res[0]['Emp_type']=='2')
			{
				
				$_SESSION['Emp_id']=$res[0]['Emp_id'];
				$_SESSION['Emp_type']='2';
				$link = 'manager_homepage.php';
				echo "<script>window.location.href='$link';</script>";
			}
		}
		else
		{
			echo "<script>alert('Invalid username or password');</script>";
		}
	}
?>