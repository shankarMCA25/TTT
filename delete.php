<?php
  include 'header.php';
  $database=new dbconn();
  $var = $_GET['Emp_id'];
  $res=$database->update_emp_status("Employee","Emp_Status","Emp_id='$var'");
  if($res)  
    return true;
  else
    return false;
    //test this page
?>