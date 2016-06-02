<?php 
	

	$yest=date('Y-m-d',strtotime("-1 days"));
	
	$res=$db->select("transaction","Count(account_no) as deposits","transaction_date BETWEEN '$yest 00:00:00.00' AND '$yest 23:59:59.999'");
	$notify['deposits'] = $res[0]['deposits'];
	$res1=$db->select("transaction","Count(Distinct(Emp_id)) as depositno","transaction_type=1 and transaction_date BETWEEN '$yest 00:00:00.00' AND '$yest 23:59:59.999'");
	$prof_emp_id=$_SESSION["Emp_id"];
	$notify1['depositno']=$res1[0]['depositno'];
	$res2=$db->select("Employee","Emp_name as name,Emp_img as profile","Emp_id=$prof_emp_id");
	$profile_image=$res2[0]['profile'];
	$profile_name=$res2[0]['name'];
	?>
  <!-- container section start -->
  <section id="container" class="">
     
      
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i>
                </div>
            </div>
		<?php $who=explode(" ",$title,2);?>
            <!--logo start-->
            <a href="#" class="logo">
				<a href="#" class="logo"><?php echo $who[0];?> <span class="lite">Homepage</span></a>
            <!--logo end-->
            
            

            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                   
                    <!-- alert notification start-->
                    <li id="alert_notificatoin_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                            <i class="icon-bell-l"></i>
                            
                        </a>
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-blue"></div>
                            <li>
                                <p class="blue">You have  new notifications</p>
                            </li>
                            <li>
                                <a href="notifications.php">
                                    <span class="label label-primary"><i class="icon_profile"></i></span> 
										<?php echo $notify['deposits']; ?> Transaction By <?php echo $notify1['depositno']; ?> Agents
									
                                    <span class="small italic pull-right"></span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-warning"><i class="icon_pin"></i></span>  
                                    1 Withdrawals By  1 agents
                                </a>
                            </li>
                                             
                            
                        </ul>
                    </li>
                    <!-- alert notification end-->
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="<?php echo $profile_image;?>">
                            </span>
                            <span class="username">	<?php echo $profile_name;?>	</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="profile.php"><i class="icon_profile"></i> My Profile</a>
                            </li>
                            <li>
                                <a href="change_password.php"><i class="glyphicon glyphicon-lock"></i> Change Password</a>
                            </li>
                           
                            <li>
                                <a href="index.php"><i class="icon_key_alt"></i> Log Out</a>
                            </li>
                            
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>      
      <!--header end-->

      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
             <ul class="sidebar-menu">                
                  <li class="active">
                      <a href="Manager_homepage.php">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  
                  <li class="sub-menu">
                        <a href="dailycollection.php" class="">
                            <span class="fa fa-inr"></span> Daily Collection
                        </a>
                  </li>
                  <li class="sub-menu">
                      <li>
                            <a href="cmanageaccounts.php" class="" href="">
                                <span class="fa fa-user"></span> Manage Customer accounts
                            </a>
                  </li>    
				  <li class="sub-menu">
                      <li>
                            <a href="addorremoveagent.php" class="" href="">
                                <span class="fa fa-user"></span> Manage Employees
							</a>
                  </li>     
                  <li class="sub-menu">                     
                      <a class="" href="javascript:;">
                          <i class="icon_piechart"></i>
                          <span>Reports</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                          
                      </a>
                      <ul class="sub">
                        <li><a class="" href="cashierdatewisereport.php">Date wise report</a></li>

                        <li><a class="" href="cashieragentreport.php">Agent wise report</a></li>
                        <li><a class="" href="notifications.php">View Notifications</a></li>

                      </ul>
                                         
                  </li>
               </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      <!--main content start-->
      <section id="main-content">
      <section class ="wrapper" style="width:100%;height:100%"><div> 
    </div>
</section>
      
      <!--main content end-->
  </section>
  <!-- container section start -->
