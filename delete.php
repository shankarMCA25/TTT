<?php
  include 'header.php';
  $database=new dbconn();
  $var = $_GET['Emp_id'];
  $res=$database->update_emp_status("Employee","Emp_Status='0'","Emp_id='$var'");
  if($res)  {
    echo '<script>alert("Employee successfully disabled"); window.location.href="addorremoveagent.php";</script>';
  } 
 else
 { 
   echo '<script>alert("Failed to disable employee"); window.location.href="addorremoveagent.php"; </script>';

}
    //test this page
	//header('Location: addorremoveagent.php');
?>