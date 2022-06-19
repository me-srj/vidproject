 <div class="single-channel-page" id="content-wrapper">
            <div class="single-channel-image" >
               <?php if($customer2['cover_photo'] !='' || $customer2['cover_photo'] != null)
               {
                  $cover_image=$customer2['cover_photo'];
               }
               else{
                  $cover_image='cover.png';
               }?>
               <img class="img-fluid" alt="" src="<?php echo $call_config->base_url() ?>app-assets/user/cover_img/<?= $cover_image?>" style="height: 340px;width: 1300px;">
               <div class="channel-profile">
                  <img class="channel-profile-img" alt="" src="<?php echo $call_config->base_url() ?>app-assets\user\user_image/<?= $customer2['photo']?>">
                  <div class="social hidden-xs">
                                          <?php if($customer2['facebook'] !='' || $customer2['facebook'] != null)
               {
                  echo '<a class="fb" href="'.$customer2['facebook'].'" target="_blank">Facebook</a>';
               }
               if($customer2['twitter'] !='' || $customer2['twitter'] != null)
               {
                  echo '<a class="tw" href="'.$customer2['twitter'].'" target="_blank">Twitter</a>';
               } 
               if($customer2['instagram'] !='' || $customer2['instagram'] != null)
               {
                  echo '<a class="ig" href="'.$customer2['instagram'].'" target="_blank">Instagram</a>';
               }
               if($customer2['linkedin'] !='' || $customer2['linkedin'] != null)
               {
                  echo '<a class="ld" href="'.$customer2['linkedin'].'" target="_blank">Linkedin</a>';
               } 
               ?>
                  </div>
               </div>
            </div>
            <div class="single-channel-nav">
               <nav class="navbar navbar-expand-lg navbar-light">
                  <a class="channel-brand" href="#"><?=$customer2['username'];?> <span title="" data-placement="top" data-toggle="tooltip" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></span></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                           <a class="nav-link" href="#">Videos <span class="sr-only">(current)</span></a>
                        </li>
                        <!-- <li class="nav-item">
                           <a class="nav-link" href="#">Channels</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#">Discussion</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           Donate
                           </a>
                           <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="#">Action</a>
                              <a class="dropdown-item" href="#">Another action</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">Something else here</a>
                           </div>
                        </li> -->
                     </ul>
                     <form class="form-inline my-2 my-lg-0">
                        <input class="form-control form-control-sm mr-sm-1" type="text" placeholder="Search" aria-label="Search" name="search" id="search_box"><button class="btn btn-outline-success btn-sm my-2 my-sm-0" type="button" id="search_video"><i class="fas fa-search"></i></button> &nbsp;&nbsp;&nbsp; <button class="btn btn-outline-danger btn-sm" type="button">Subscribe <strong><?php
                        $sbs="SELECT FORMAT(COUNT(*),0) AS subscribe FROM `tbl_user_follow_master` WHERE uid='".$id."'";
                        $rsbs=$call_config->get($sbs);
                        echo $rsbs['subscribe'];?></strong></button>
                     </form>
                  </div>
               </nav>
            </div>
            <div class="container-fluid">
               <div class="video-block section-padding">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
                           <div id="results"></div>

 </div>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){

    load_data(1);

    function load_data(page, query = '')
    {
      var id = '<?php echo $id;?>';
      $.ajax({
        url:"fetch.php",
        method:"POST",
        data:{page:page, query:query, id:id},
        success:function(data)
        {
          // alert(data);
          $('#results').html(data);
        }
      });
    }

    $(document).on('click', '.page-link', function(){
      var page = $(this).data('page_number');
      var query = $('#search_box').val();
      load_data(page, query);
    });

    $('#search_box').keyup(function(){
      var query = $('#search_box').val();
      load_data(1, query);
    });
  });
</script>