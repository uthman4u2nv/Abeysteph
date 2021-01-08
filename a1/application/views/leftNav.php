<ul class="sidebar-menu">
                        <li class="active">
                            
                                <?php
                                $att=array('class'=>'fa fa-dashboard');
                                ?>
                                <?php 
								if($_SESSION['role']==4){
								echo anchor('welcome/operator','<span> Home</span>',$att);
								}
								elseif($_SESSION['role']==3){
								echo anchor('welcome/cashier','<span> Home</span>',$att);	
								}
								elseif($_SESSION['role']==5){
								echo anchor('welcome/bf','<span> Home</span>',$att);	
								}
								elseif($_SESSION['role']==2){
								echo anchor('welcome/home','<span> Home</span>',$att);	
								}
								elseif($_SESSION['role']==7){
								echo anchor('welcome/customer','<span> Home</span>',$att);	
								}
elseif($_SESSION['role']==9){
								echo anchor('welcome/auditor','<span> Home</span>',$att);	
								}

								?></span>
                            
                        </li>
                        
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Profile</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><?php echo anchor('welcome/profile','Edit Profile'); ?></li>
                                
                                
                                
                            </ul>
                        </li>
						<?php
						if($_SESSION['role']==2){ ?>
                        
						
                       
						<li class="treeview">
                            <a href="#">
                                <i class="fa fa-laptop"></i>
                                <span>Brought Forward</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
							<li><?php echo anchor('welcome/viewBF','View Brought Forward'); ?></li>
                                
                                                            </ul>
                        </li>
						<li class="treeview">
                            <a href="#">
                                <i class="fa fa-laptop"></i>
                                <span>Manage Staff</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
							<li><?php echo anchor('welcome/staff','Staff'); ?></li>
                                
                                                            </ul>
                        </li>
						<li class="treeview">
                            <a href="#">
                                <i class="fa fa-laptop"></i>
                                <span>Payroll & HR</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
							<li><?php echo anchor('welcome/payrollStaff','Payroll Staff'); ?></li>
							<li><?php echo anchor('welcome/generatePayroll','Generate Payroll'); ?></li>
                                
                                                            </ul>
                        </li>
						<li class="treeview">
                            <a href="#">
                                <i class="fa fa-laptop"></i>
                                <span>Manage Plate Issuance</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
							<li><?php echo anchor('welcome/issuance','Issue Plates'); ?></li>
							
                                
                                                            </ul>
                        </li>

						<li class="treeview">
                            <a href="#">
                                <i class="fa fa-laptop"></i>
                                <span>Settings</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
							<li><?php echo anchor('welcome/manageProduct','Manage Product'); ?></li>
							<li><?php echo anchor('welcome/manageProduct2','Manage Product 2'); ?></li>
							
                                
                                                            </ul>
                        </li>
						<?php } ?>
						              
                        
                        
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>