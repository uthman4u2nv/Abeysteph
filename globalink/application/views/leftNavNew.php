<ul class="sidebar-menu">
                        <li class="active">
                            
                                <?php
                                $att=array('class'=>'fa fa-dashboard');
                                ?>
                                <?php echo anchor('welcome/home','<span> Home</span>',$att); ?></span>
                            
                        </li>
                        
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Profile</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li>><?php echo anchor('welcome/profile','Edit Profile'); ?></li>
                                <li><?php echo anchor('welcome/notifications','View Notifications'); ?></li>
                                
                                
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-laptop"></i>
                                <span>Contributions</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><?php echo anchor('welcome/contributions','Pay Contributions'); ?></li>
                                <li><?php echo anchor('welcome/contributionReport','View Contribution History'); ?></li>
                            </ul>
                        </li>
                        
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-table"></i> <span>Mortgage</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><?php echo anchor('welcome/qualification','<i class="fa fa-angle-double-right"></i>Mortgage Qualification'); ?></li>
                                <li><?php echo anchor('welcomeapplyMortgage','<i class="fa fa-angle-double-right"></i>Apply for Mortgage'); ?></li>
                                <li><?php echo anchor('welcome/checkStatus','<i class="fa fa-angle-double-right"></i>Application Status'); ?></li>
                                
                            </ul>
                        </li>
                        
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>