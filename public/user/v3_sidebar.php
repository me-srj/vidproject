<div id="wrapper">
         <!-- Sidebar -->
         <ul class="sidebar navbar-nav">
            <li class="nav-item active">
               <a class="nav-link" href="<?= $call_config->base_url() ?>application/view/user/dashboard/">
               <i class="fas fa-fw fa-home"></i>
               <span>Home</span>
               </a>
            </li>
<!--             <li class="nav-item">
               <a class="nav-link" href="#">
               <i class="fas fa-fw fa-users"></i>
               <span>Channels</span>
               </a>
            </li> -->
            <li class="nav-item">
               <a class="nav-link" href="<?= $call_config->base_url() ?>application/view/user/contest/">
               <i class="fas fa-fw fa-user-alt"></i>
               <span>Contest</span>
               </a>
            </li>
<!--             <li class="nav-item">
               <a class="nav-link" href="#">
               <i class="fas fa-fw fa-video"></i>
               <span>Video Page</span>
               </a>
            </li> -->
            <li class="nav-item">
               <a class="nav-link" href="<?= $call_config->base_url() ?>application/view/user/upload/">
               <i class="fas fa-fw fa-cloud-upload-alt"></i>
               <span>Upload Video</span>
               </a>
            </li>
<!--             <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-fw fa-folder"></i>
               <span>Pages</span>
               </a>
               <div class="dropdown-menu">
                  <h6 class="dropdown-header">Login Screens:</h6>
                  <a class="dropdown-item" href="#">Login</a>
                  <a class="dropdown-item" href="#">Register</a>
                  <a class="dropdown-item" href="#">Forgot Password</a>
                  <div class="dropdown-divider"></div>
                  <h6 class="dropdown-header">Other Pages:</h6>
                  <a class="dropdown-item" href="#">404 Page</a>
                  <a class="dropdown-item" href="#">Blank Page</a>
               </div>
            </li> -->
<!--             <li class="nav-item">
               <a class="nav-link" href="#">
               <i class="fas fa-fw fa-history"></i>
               <span>History Page</span>
               </a>
            </li> -->
<!--             <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-fw fa-list-alt"></i>
               <span>Categories</span>
               </a>
               <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">Movie</a>
                  <a class="dropdown-item" href="#">Music</a>
                  <a class="dropdown-item" href="#">Television</a>
               </div>
            </li> -->
            <li class="nav-item channel-sidebar-list">
               <h6>SUBSCRIPTIONS</h6>
               <ul>
                  <?php $subs=$call_config->get_all("SELECT a.`id`,a.`name`,a.`photo`  FROM `tbl_user_master` AS a LEFT JOIN `tbl_user_follow_master` as b ON a.`id`=b.`fuid` WHERE b.`uid`='".$user_sess_data['sess_user_id']."'");
                  foreach($subs as $subs){?>
                  <li>
                     <a href="<?php echo $call_config->base_url()?>application\view\user\userchannel/index.php?id=<?= base64_encode($subs['id']);?>">
                     <img class="img-fluid" alt="" src="<?php echo $call_config->base_url() ?>app-assets\user\user_image/<?= $subs['photo']?>"> <?=$subs['name'];?> 
                     </a>
                  </li>
                  <?php }?>
               </ul>
            </li>
         </ul>
         <div id="content-wrapper">