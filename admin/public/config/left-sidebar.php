<nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element open"> <span>
                            <img alt="image" class="img-profile" src="images/<?php echo ($_SESSION["images"]); ?>">
                        </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="true">
                            <!-- User name -->
                            <span class="clear"> <span class="block m-t-xs"> 
                                <strong class="font-bold">
                                    <?php echo ($_SESSION["staffname"]); ?>
                                </strong>
                                <!-- User position -->
                            </span> <span class="text-muted text-xs block">
                                    <?php echo ($_SESSION["category"]); ?> Investor <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li>
                                    Amount Invested: <span style="color:red"><?php echo ($_SESSION["unit_value"]); ?></span>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    Expected ROI: <span style="color:green"><?php echo ($_SESSION["roi"]); ?></span>
                                </li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            <img src="images/logo.png" alt="" style="height:30px;">
                        </div>
                    </li>
                    <li class="active">
                        <a href="dashboard.php">
                            <i class="fa fa-star"></i>
                            <span class="nav-label">Dashboard</span> 
                        </a>
                    </li>
                        <li class="parentd">
                        <a href="#">
                            <i class="fa fa-star"></i>
                            <span class="nav-label">Supply chain management</span></a>
                        </li>
                        <li class="parentd">
                            <a href="#">
                                <i class="fa fa-star"></i>
                                <span class="nav-label">Risk Management</span>
                            </a>
                        </li>
                        
                        <li class="parentd">
                            <a href="#">
                                <i class="fa fa-star"></i>
                                <span class="nav-label">Inventory management</span>
                            </a>
                            <ul class="nav nav-second-level">                                
                                <li><a href="buildinglist.php">Building</a></li>
                                <li><a href="machinerylist.php">Machinery</a></li>
                                <li><a href="vehiclelist.php">Vehicle</a></li>
                                <li><a href="otassetlist.php">Other Tangible Assets</a></li>
                                <li><a href="operationlist.php">Operation</a></li>
                                <li><a href="administrationlist.php">Administration</a></li>
                            </ul>
                        </li>
                        
                        <li class="parentd">
                            <a href="#" class="spec">
                                <i class="fa fa-star"></i>
                                <span class="nav-label">Monitoring and Evaluation</span>
                            </a>
							<ul class="nav nav-second-level">                                
                                <li><a href="employee.php">Employee</a></li>
								<li><a href="employeeappraisal.php">Employee Appraisal</a></li>
                                <li><a href="worker.php">Worker</a></li>
                                <li><a href="workerappraisal.php">Worker Appraisal</a></li>
                                <li><a href="weather.php">Weather</a></li>
                                
                            </ul>
                        </li>
                        

                        <li class='parentd'>
                            <a href="#" class="spec">
                                <i class="fa fa-star"></i>
                                <span class="nav-label">Financial Management</span>
                            </a>
                            <ul class="nav nav-second-level">
                                
								<li><a href="advertlist.php">Advert List</a></li>
								
                               
								<li><a href="assetlist.php">Asset List</a></li> 

                                <li><a href="budget.php">Yearly Budget</a></li> 
                                <li><a href="monthlybudget.php">Monthly Budget</a></li> 
                                <li><a href="planned.php">Monthly Budget</a></li>
								
                               
								<li><a href="expenditurelist.php">Expenditure List</a></li>
								
                                
								<li><a href="grantlist.php">Grant List</a></li>
								
                               
								<li><a href="incomelist.php">Income list</a></li>
								
                                <li><a href="item.php">Item List</a></li>
								
                             
								<li><a href="legallist.php">Legal Fees List</a></li>
								
                               
								<li><a href="liabilitylist.php">Liability List</a></li>
								
                              
								<li><a href="maintenancelist.php">Maintenance List</a></li><!--I stoped here -->
                                
								<li><a href="powerlist.php">Power List</a></li>
								
                                <li><a href="rentlist.php">Rent List</a></li>
								
								<li><a href="salarylist.php">Salary List</a></li>
								
                                
								<li><a href="servicelist.php">Service List</a></li>
								
								<li><a href="utilitieslist.php">Utilities List</a></li>	
                                
								<li><a href="purchaseslist.php">Purchaces List</a></li>
                            </ul>
                        </li>
                        
                        <li>
                            <a href="#">
                                <i class="fa fa-star"></i>
                                <span class="nav-label">Investment Managment</span>
                            </a>
                        </li>
                        
                        <li>
                            <a href="transaction.php">
                                <i class="fa fa-star"></i>
                                <span class="nav-label">Transaction</span>  
                            </a>
                        </li>

                        <li>
                    <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="index-2.html">Dashboard v.1</a></li>
                        <li><a href="dashboard_2.html">Dashboard v.2</a></li>
                        <li><a href="dashboard_3.html">Dashboard v.3</a></li>
                        <li><a href="dashboard_4_1.html">Dashboard v.4</a></li>
                        <li><a href="dashboard_5.html">Dashboard v.5 </a></li>
                    </ul>

                </li> 
               <li class="parentd">
                    <a href="#" class='spec'><i class="fa fa-edit"></i> <span class="nav-label">Notifications</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">

                        <li><a href="notification-dash.php">Notification Dashboard</a></li> 
                        <li><a href="notification.php">Notification</a></li>          
                        <li><a href="complaints.php">Messages</a></li>
                    </ul>
                </li>

                <li class="parentd">
                    <a href="#" class='spec'><i class="fa fa-picture-o"></i> <span class="nav-label">Gallery</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="''"><a href="gallery.php">View Gallery</a></li>

                        <li><a href="addGallery.php">Add Gallery</a></li>

                    </ul>
                </li>


                <li class="parentd">
                    <a href="#" class='spec'><i class="fa fa-files-o"></i> <span class="nav-label">Testimonial</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="''"><a href="testimolist.php">View Testimonials</a></li>

                    </ul>
                </li>
                <li class="parentd">
                    <a href="#" class='spec'><i class="fa fa-users"></i> <span class="nav-label">Users</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                      <li><a href="profile.php">My Profile</a></li> 
                      <li><a href="userlist.php">Users list</a></li>                        
                      <li><a href="deleteduser.php">Deleted Users</a></li> 

                    </ul>
                </li>
                       
                        <li>
                            <a href="dashboard.php">
                                <i class="fa fa-star"></i>
                                <span class="nav-label">DUFMA General Dashboard</span>
                            </a>
                        </li>
                       
                    </ul>
                    
                </div>

            </nav>

            <script>
                let parentds = document.querySelectorAll(".parentd");
                let links = document.querySelectorAll(".parentd > a");

                links.forEach((one) => {
                    one.addEventListener("click",() => {
                        one.parentElement.classList.toggle("opened");
                    })
                })
            </script>
