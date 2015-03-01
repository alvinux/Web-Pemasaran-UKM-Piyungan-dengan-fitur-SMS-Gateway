  <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo base_url(); ?>doc/themes/admin/img/avatar3.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, Jane</p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class=" <?php if ($this->uri->segment(2)==='home') {
                                            echo 'active';

                                            }else if (!empty($this->uri->segment(2))){
                                                echo '';
                                           
                                            } else {
                                               echo 'active'; 
                                            }
                                             ?>
                                           <?php ?>">
                            <a href="<?php echo base_url(); ?>admin/home">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li class=" <?php if ($this->uri->segment(2)==='sms') {
                                            echo 'active';                                           
                                            } else {
                                               echo ''; 
                                            }
                                             ?>">
                            <a href="<?php echo base_url(); ?>admin/sms">
                                <i class="fa fa-envelope"></i> <span>SMS</span> <small class="badge pull-right bg-green">new</small>
                            </a>
                        </li>
                        <li class=" <?php if ($this->uri->segment(2)==='list_penjual') {
                                            echo 'active';                                           
                                            } else {
                                               echo ''; 
                                            }
                                             ?>">
                            <a href="<?php echo base_url(); ?>admin/list_penjual">
                                <i class="fa fa-user"></i> <span>Penjual</span> <small class="badge pull-right bg-green">new</small>
                            </a>
                        </li>
                        <li  class=" <?php if ($this->uri->segment(2)==='list_transaksi') {
                                            echo 'active';                                           
                                            } else {
                                               echo ''; 
                                            }
                                             ?>">
                            <a href="<?php echo base_url(); ?>admin/list_transaksi">
                                <i class="fa fa-bar-chart-o"></i> <span>Transaksi</span> <small class="badge pull-right bg-green">new</small>
                            </a>
                        </li>
                       
                        <li class="treeview <?php if ($this->uri->segment(2)==='pengaturan_bank' || $this->uri->segment(2)==='pengaturan_admin'|| $this->uri->segment(2)==='format_sms' || $this->uri->segment(2)==='content_page' ) {
                                            echo 'active';                                           
                                            } else {
                                               echo ''; 
                                            }
                                             ?>">
                            <a href="#">
                                <i class="fa fa-wrench"></i>
                                <span>Pengaturan</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class=" <?php if ($this->uri->segment(2)==='pengaturan_admin') {
                                            echo 'active';                                           
                                            } else {
                                               echo ''; 
                                            }
                                             ?>"><a href="<?php echo base_url(); ?>admin/pengaturan_admin"><i class="fa fa-angle-double-right"></i> Akun Admin</a></li>
                               
                                <li class=" <?php if ($this->uri->segment(2)==='pengaturan_bank') {
                                            echo 'active';                                           
                                            } else {
                                               echo ''; 
                                            }
                                             ?>">
                                             <a href="<?php echo base_url(); ?>admin/pengaturan_bank"><i class="fa fa-angle-double-right"></i> Bank</a>
                                </li>

                                <li class=" <?php if ($this->uri->segment(2)==='format_sms') {
                                            echo 'active';                                           
                                            } else {
                                               echo ''; 
                                            }
                                             ?>"><a href="<?php echo base_url(); ?>admin/format_sms"><i class="fa fa-angle-double-right"></i> Format SMS</a></li>
                                
                                <li class=" <?php if ($this->uri->segment(2)==='content_page') {
                                            echo 'active';                                           
                                            } else {
                                               echo ''; 
                                            }
                                             ?>"><a href="<?php echo base_url(); ?>admin/content_page"><i class="fa fa-angle-double-right"></i> Content Page</a></li>
                            </ul>
                        </li>
                        <li class=" <?php if ($this->uri->segment(2)==='testimonial') {
                                            echo 'active';                                           
                                            } else {
                                               echo ''; 
                                            }
                                             ?>">
                            <a href="<?php echo base_url(); ?>admin/testimonial">
                                <i class="fa fa-edit"></i> <span>Testimonial</span> <small class="badge pull-right bg-green">new</small>
                            </a>
                        </li>
                      <!--  <li class="treeview">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>Charts</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="pages/charts/morris.html"><i class="fa fa-angle-double-right"></i> Morris</a></li>
                                <li><a href="pages/charts/flot.html"><i class="fa fa-angle-double-right"></i> Flot</a></li>
                                <li><a href="pages/charts/inline.html"><i class="fa fa-angle-double-right"></i> Inline charts</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-laptop"></i>
                                <span>UI Elements</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="pages/UI/general.html"><i class="fa fa-angle-double-right"></i> General</a></li>
                                <li><a href="pages/UI/icons.html"><i class="fa fa-angle-double-right"></i> Icons</a></li>
                                <li><a href="pages/UI/buttons.html"><i class="fa fa-angle-double-right"></i> Buttons</a></li>
                                <li><a href="pages/UI/sliders.html"><i class="fa fa-angle-double-right"></i> Sliders</a></li>
                                <li><a href="pages/UI/timeline.html"><i class="fa fa-angle-double-right"></i> Timeline</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-edit"></i> <span>Forms</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="pages/forms/general.html"><i class="fa fa-angle-double-right"></i> General Elements</a></li>
                                <li><a href="pages/forms/advanced.html"><i class="fa fa-angle-double-right"></i> Advanced Elements</a></li>
                                <li><a href="pages/forms/editors.html"><i class="fa fa-angle-double-right"></i> Editors</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-table"></i> <span>Tables</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="pages/tables/simple.html"><i class="fa fa-angle-double-right"></i> Simple tables</a></li>
                                <li><a href="pages/tables/data.html"><i class="fa fa-angle-double-right"></i> Data tables</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="pages/calendar.html">
                                <i class="fa fa-calendar"></i> <span>Calendar</span>
                                <small class="badge pull-right bg-red">3</small>
                            </a>
                        </li>
                        <li>
                            <a href="pages/mailbox.html">
                                <i class="fa fa-envelope"></i> <span>Mailbox</span>
                                <small class="badge pull-right bg-yellow">12</small>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-folder"></i> <span>Examples</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="pages/examples/invoice.html"><i class="fa fa-angle-double-right"></i> Invoice</a></li>
                                <li><a href="pages/examples/login.html"><i class="fa fa-angle-double-right"></i> Login</a></li>
                                <li><a href="pages/examples/register.html"><i class="fa fa-angle-double-right"></i> Register</a></li>
                                <li><a href="pages/examples/lockscreen.html"><i class="fa fa-angle-double-right"></i> Lockscreen</a></li>
                                <li><a href="pages/examples/404.html"><i class="fa fa-angle-double-right"></i> 404 Error</a></li>
                                <li><a href="pages/examples/500.html"><i class="fa fa-angle-double-right"></i> 500 Error</a></li>
                                <li><a href="pages/examples/blank.html"><i class="fa fa-angle-double-right"></i> Blank Page</a></li>
                            </ul>
                        </li> !-->
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>