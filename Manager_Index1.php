<?php $db = new dbconn();
	$yest=date('Y-m-d',strtotime("-1 days"));
	
	$res=$db->select("transaction","Count(account_no) as deposits","transaction_date BETWEEN '$yest 00:00:00.00' AND '$yest 23:59:59.999'");
	$notify['deposits'] = $res[0]['deposits'];
	$res1=$db->select("transaction","Count(Distinct(Emp_id)) as depositno","transaction_type=1 and transaction_date BETWEEN '$yest 00:00:00.00' AND '$yest 23:59:59.999'");

	$notify1['depositno']=$res1[0]['depositno'];?>
  <!-- container section start -->
  
     <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i>
                </div>
            </div>

            <!--logo start-->
            <a href="#" class="logo">Manager<span class="lite">Homepage</span></a>
            <!--logo end-->
            

            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    
                    <!-- task notificatoin start -->
                    <li id="task_notificatoin_bar" class="dropdown">
                    </li>
                    <!-- task notificatoin end -->
                    
                    <!-- alert notification start-->
                    <li id="alert_notificatoin_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">

                            <i class="icon-bell-l"></i>
                            <span class="badge bg-important"></span>
                        </a>
                        <ul class="dropdown-menu extended notification">
                            <div class="notify-arrow notify-arrow-blue"></div>
                            <li>
                                <p class="blue">You have  new notifications</p>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-primary"><i class="icon_profile"></i></span> 
                                    Friend Request
                                    <span class="small italic pull-right">5 mins</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-warning"><i class="icon_pin"></i></span>  
                                    John location.
                                    <span class="small italic pull-right">50 mins</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-danger"><i class="icon_book_alt"></i></span> 
                                    Project 3 Completed.
                                    <span class="small italic pull-right">1 hr</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="label label-success"><i class="icon_like"></i></span> 
                                    Mick appreciated your work.
                                    <span class="small italic pull-right"> Today</span>
                                </a>
                            </li>                            
                            <li>
                                <a href="#">See all notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- alert notification end-->
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="img/avatar1_small.jpg">
                            </span>
                            <span class="username">Jenifer Smith</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="#"><i class="icon_profile"></i> My Profile</a>
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
                      <a class="" href="Manager_homepage.php">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
				  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Forms</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="addorremoveagent.php">Add/Remove Agent</a></li>                          
                          <li><a class="" href="closeaccount.php">Close customer Account</a></li>
                      </ul>
                  </li>       
                  
                
                  <li class="sub-menu">                     
                      <a class="" href="javascript:;">
                          <i class="icon_piechart"></i>
                          <span>Reports</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                          
                      </a>
                      <ul class="sub">
                        <li><a class="" href="datewisereport.php">Date wise report</a></li>

                        <li><a class="" href="agentreport.php">Agent wise report</a></li>
                        

                      </ul>
                                         
                  </li>
                 
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
      
      