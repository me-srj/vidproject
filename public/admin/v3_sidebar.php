    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true" data-img="<?php echo $call_config->base_url(); ?>app-assets/admin/images/backgrounds/02.jpg">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto">
<a class="navbar-brand" href="#"><!-- <img class="brand-logo" alt="Chameleon admin logo" src="<?php echo $call_config->base_url(); ?>app-assets/images/logo/logo.png"/> -->
                        <h3 class="brand-text">Vidoe</h3></a>
                </li>
                <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
            </ul>
        </div>
        <div class="navigation-background"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item"><a href="<?php echo $call_config->base_url() ?>application/view/admin/dashboard/"><i class="ft-grid"></i><span class="menu-title" data-i18n="">Dashboard</a>
                </li>
                <li class=" nav-item"><a href="<?php echo $call_config->base_url() ?>application/view/admin/customer/"><i class="ft-users"></i><span class="menu-title" data-i18n="">Customers</span></a>
                </li>
                <li class=" nav-item"><a href="<?php echo $call_config->base_url() ?>application/view/admin/video/"><i class="icon-home"></i><span class="menu-title" data-i18n="">Videos</span></a>
                   
                </li>
                <li class=" nav-item"><a href="#"><i class="ft-user-check"></i><span class="menu-title" data-i18n="">Manage Staffs</span></a>
                    <ul class="menu-content">
                        <li><a class="menu-item" href="<?php echo $call_config->base_url() ?>application\view\admin\a_manager/">Account Manager</a>
                         </li> 
                        <li><a class="menu-item" href="<?php echo $call_config->base_url() ?>application\view\admin\c_manager/">Content Manager</a> 
                        </li>
                       
                    </ul>
                </li>
                <li class=" nav-item"><a href="<?php echo $call_config->base_url() ?>application\view\admin\contest/"><i class="ft-bar-chart-2"></i><span class="menu-title" data-i18n="">Contest</span></a>
                </li>
                <li class=" nav-item"><a href="#"><i class="ft-settings"></i><span class="menu-title" data-i18n="">Manage</span></a>
                    <ul class="menu-content">
                        <li><a class="menu-item" href="<?php echo $call_config->base_url() ?>application\view\admin\Subscription_Plans/">Subscription Plans</a>
                         </li> 
                        <li><a class="menu-item" href="<?php echo $call_config->base_url() ?>application\view\admin\category/">Category</a>
                         </li> 
                        <li><a class="menu-item" href="<?php echo $call_config->base_url() ?>application\view\admin\scategory/">Sub Category</a> 
                        </li>
                       
                    </ul>
                </li>
                <li class=" nav-item"><a href="<?php echo $call_config->base_url() ?>application\view\admin\manage_ads/"><i class="ft-trending-up"></i><span class="menu-title" data-i18n="">Manage Ads</span></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->