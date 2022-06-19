<style>
@media (max-width: 575.98px) {
.hide_on_mobile {
    display: none;
  }
 .mobile-menu {
     background: #4B79A1;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #283E51, #4B79A1);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #283E51, #4B79A1); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
 }
 .bottom-nav-item span {
    color: #fff;
    display: list-item;
    overflow: hidden;
    text-overflow: ellipsis;
}
.bottom-nav-link .fas {
    color: #fff;
    font-size: 15px;
}
.osahan-right-navbar .nav-link {
    font-size: 0;
    padding: 22px 5px !important;
    color: #fff !important;
} 
    .navbar-brand img {
    vertical-align: top;
    height: 56px;
}
.bg-white {
    background: #42275a;
    background: -webkit-linear-gradient(to right, #734b6d, #42275a);
    background: linear-gradient(to right, #734b6d, #42275a);
    box-shadow: 1px 1px 6px 0px #1d1d1d;
    border-bottom: 1px solid rgb(255 255 255);
}
.input-group>.custom-select:not(:last-child), .input-group>.form-control:not(:last-child) {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    height: 38px;
}
.user-dropdown-link img {
    border-radius: 50px;
    height: 33px;
    margin: -9px 2px -6px 0;
    width: 33px;
    border: 0px solid #fff;
    box-shadow: 0px 0px 12px 2px #000;
}
.mobile-menu {
    background: #4B79A1;
    background: -webkit-linear-gradient(to right, #283E51, #4B79A1);
    background: linear-gradient(to right, rgb(40 62 81 / 60%), rgb(40 62 81 / 60%));
}
.modal-footer {
    display:none;
}
.modal-header .close {
    padding: 1rem 1rem;
    margin: -1rem -1rem -1rem auto;
    position: absolute;
    right: 9px;
    top: 27px;
}
.modal-header {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-align: start;
    align-items: flex-start;
    -ms-flex-pack: justify;
    justify-content: space-between;
    padding: 2px;
    border-bottom: 1px solid #dee2e6;
    border-top-left-radius: calc(.3rem - 1px);
    background: #CDDC39;
    border-top-right-radius: calc(.3rem - 1px);
}
}
</style>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" style="font-size:15px;padding:5px;">More in 8in Play</h4>
      </div>
      <div class="modal-body">
        <p><div style="font-size:15px;"><a href="">Join Contest</a><hr>
        <a href="">Get Premium</a></p></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<body id="page-top">
      <div class="mobile-menu">
         <ul class="bottom-navbar-nav">
            <li class="bottom-nav-item active">
               <a href="<?= $call_config->base_url() ?>application/view/user/home/" class="bottom-nav-link">
               <i class="fas fa-fw fa-home"></i>
               <span>Home</span>
               </a>
            </li>
            <li class="bottom-nav-item">
               <a href="#" onclick="alert('Coming soon...')" class="bottom-nav-link">
               <i class="fas fa-fw fa-users"></i>
               <span>Memes</span>
               </a>
            </li>
           <li class="bottom-nav-item">
               <a href="<?= $call_config->base_url() ?>application/view/user/upload/" class="bottom-nav-link">
               <!--i class="fas fa-fw fa-user-alt"></i-->
               <span><img src="/vidproject/img/buttons-01.png" width="55"></span>
               </a>
            </li>
            <li class="bottom-nav-item">
               <a href="<?= $call_config->base_url() ?>application/view/user/my_subscription/" class="bottom-nav-link">
               <i class="fas fa-fw fa-video"></i>
               <span>Premium</span>
               </a>
            </li>
            <li class="bottom-nav-item">
               <a href="" class="bottom-nav-link" data-toggle="modal" data-target="#myModal">
               <i class="fas fa-fw fa-cloud-upload-alt"></i>
               <span>More</span>
               </a>
            </li>
         </ul>
      </div>
      <nav class="navbar navbar-expand navbar-light bg-white static-top osahan-nav sticky-top">
         &nbsp;&nbsp; 
         <button class="btn btn-link btn-sm text-secondary order-1 order-sm-0" id="sidebarToggle">
         <i class="fas fa-bars"></i>
         </button> &nbsp;&nbsp;
         <a class="navbar-brand mr-1" href="<?= $call_config->base_url() ?>application/view/user/home/"><img class="img-fluid" alt="" src="<?= $call_config->base_url() ?>img/logo.png"></a>
         <!-- Navbar -->
         <ul class="navbar-nav ml-auto ml-md-0 osahan-right-navbar">
            <li class="nav-item mx-1">
               <a class="nav-link" data-toggle="modal" data-target="#search_modal" href="#">
               <i style="font-size: 20px;" class="fas fa-search fa-fw"></i>
               Upload Video
               </a>
            </li>
<?php
$notification=$call_config->get_all("SELECT * FROM `tbl_notification_master` WHERE `uid`='".$_SESSION['sess_user_id']."'");
$number=sizeof($notification);
?>
            <li class="nav-item dropdown no-arrow mx-1">
               <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i style="font-size: 20px;" class="fas fa-bell fa-fw"></i>
               <span class="badge badge-danger"><?php
if ($number>0) {
   echo $number;
}
               ?></span>
               </a>
<?php
if ($number>0) {
   ?>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
               <h6 class="dropdown-header m-0"><span class="grey darken-2">Notifications</span></h6>
                <?php foreach($notification as $noti){?>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">
                  <h6 class="dropdown-header ml-0"><span class="grey darken-2"><?=$noti['notihead'];?></span></h6>
                     <i><?=$noti['notimess'];?></i></a>
                  <?php }?>
                  <div class="dropdown-menu-footer"><a class="dropdown-item info text-right pr-1" href="#" id="clear_notification">Read all</a></div>
               </div>
   <?php
}
else
{
   ?>
               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
               <h6 class="dropdown-header m-0"><span class="grey darken-2">It's Empty Here!!</span></h6>
               </div>
   <?php
}
?>
            </li>
            <li class="nav-item dropdown no-arrow osahan-right-navbar-user">
               <a class="nav-link dropdown-toggle user-dropdown-link" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <img alt="Avatar" src="<?= $call_config->base_url() ?>app-assets\user\user_image/<?= $customer['photo'] ?>">
               <?= $customer['name'] ?> 
               </a>
               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="<?= $call_config->base_url() ?>application/view/user/my_account/"><i class="fas fa-fw fa-user-circle"></i> &nbsp; My Videos</a>
                  <a class="dropdown-item" href="<?= $call_config->base_url() ?>application/view/user/txn/"><i class="fas fa-fw fa-video"></i> &nbsp; My Txn</a>
                  <a class="dropdown-item" href="<?php echo $call_config->base_url() ?>application/view/user/mychannel/"><i class="fas fa-fw fa-user-cog"></i> &nbsp; My Profile</a>
                  <a class="dropdown-item" href="<?php echo $call_config->base_url() ?>application/view/user/favourites/"><i class="fas fa-fw fa-heart text-danger"></i> &nbsp; My Favourites</a>
                  <a class="dropdown-item" href="<?php echo $call_config->base_url() ?>application/view/user/follow/"><i class="fas fa-fw fa-user-check"></i> &nbsp; Followers/Following</a>
                  <a class="dropdown-item" href="<?php echo $call_config->base_url() ?>application/view/user/change_password/"><i class="fas fa-fw fa-lock"></i> &nbsp; Change Password</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-fw fa-sign-out-alt"></i> &nbsp; Logout</a>
               </div>
            </li>
         </ul>
      </nav>
      <script type="text/javascript">
         $(document).on("click","#clear_notification",function(){
            $.ajax({
  url:'<?php echo $call_config->base_url().'application/modal/user/clear_notification/d_noti.php' ?>',
  type:'POST',
  success:function(data){
if(data="success"){
   location.reload(true);
  }
}
})
         })      
</script>
     <!-- booststrap modal -->
<div class="modal fade" id="search_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <!-- Navbar Search -->
         <form action="<?= $call_config->base_url() ?>application/view/user/search_video/" method="POST" class="form-inline row">
            <div class="input-group col-md-12">
               <input type="text" class="form-control" name="search" placeholder="Search for video...">
               <div class="input-group-append">
                  <button class="btn btn-light" type="submit">
                  <i class="fas fa-search"></i> 
                  </button>
               </div>
            </div>
         </form>
      </div>
    </div>
  </div>
</div>