 <div class="single-channel-page" id="content-wrapper">
            <div class="single-channel-image" >
               <?php if($customer['cover_photo'] !='' || $customer['cover_photo'] != null)
               {
                  $cover_image=$customer['cover_photo'];
               }
               else{
                  $cover_image='cover.png';
               }?>
               <img class="img-fluid" alt="" src="<?php echo $call_config->base_url() ?>app-assets/user/cover_img/<?= $cover_image?>" style="height: 340px;width: 1300px;">
               <div class="channel-profile">
                  <img class="channel-profile-img" alt="" src="<?php echo $call_config->base_url() ?>app-assets\user\user_image/<?= $customer['photo']?>">
                  <div class="social hidden-xs">
                     <button data-toggle="modal" data-target="#myModal"><i class="fa fa-camera"></i></button>
                     Social &nbsp;
                     <?php if($customer['facebook'] !='' || $customer['facebook'] != null)
               {
                  echo '<a class="fb" href="'.$customer['facebook'].'" target="_blank">Facebook</a>';
               }
               if($customer['twitter'] !='' || $customer['twitter'] != null)
               {
                  echo '<a class="tw" href="'.$customer['twitter'].'" target="_blank">Twitter</a>';
               } 
               if($customer['instagram'] !='' || $customer['instagram'] != null)
               {
                  echo '<a class="ig" href="'.$customer['instagram'].'" target="_blank">Instagram</a>';
               }
               if($customer['linkedin'] !='' || $customer['linkedin'] != null)
               {
                  echo '<a class="ld" href="'.$customer['linkedin'].'" target="_blank">Linkedin</a>';
               } 
               ?>
                  </div>
               </div>
            </div>
            <div class="single-channel-nav">
               <nav class="navbar navbar-expand-lg navbar-light">
                  <a class="channel-brand" href="#"><?=$customer['username'];?> <span title="" data-placement="top" data-toggle="tooltip" data-original-title="Verified"><i class="fas fa-check-circle text-success"></i></span></a>
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
                      <a onclick="show_edit()" class="btn btn-sm text-danger" type="button">Edit Profile</a>&nbsp;&nbsp;&nbsp;
                        <input class="form-control form-control-sm mr-sm-1" type="text" placeholder="Search" aria-label="Search" name="search" id="search_box"><button class="btn btn-outline-success btn-sm my-2 my-sm-0" type="button" id="search_video"><i class="fas fa-search"></i></button> &nbsp;&nbsp;&nbsp; <button class="btn btn-outline-danger btn-sm" type="button">Subscribe <strong><?php
                        $sbs="SELECT FORMAT(COUNT(*),0) AS subscribe FROM `tbl_user_follow_master` WHERE uid='".$user_sess_data['sess_user_id']."'";
                        $rsbs=$call_config->get($sbs);
                        echo $rsbs['subscribe'];?></strong></button>
                     </form>
<script type="text/javascript">
  function show_edit()
  {
$("#edit_profile_div").show();
$("#results").hide();
  }
  function hide_edit()
  {
$("#edit_profile_div").hide();
$("#results").show();
  }
</script>
                  </div>
               </nav>
            </div>
            <div class="container-fluid">
               <div class="video-block section-padding">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
                           <div id="results"></div>
                           <div style="display: none;" id="edit_profile_div">
                               <form method="POST" action="<?php echo $call_config->base_url() ?>application/modal/user/profile/edit_profile.php" enctype="multipart/form-data" id="form">
<div class="row"><span class="msg"></span></div>
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label class="control-label">Name <span class="required">*</span></label>
                           <input name="name" value="<?= $customer['name'] ?>" class="form-control border-form-control"  placeholder="Gurdeep" type="text">
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label class="control-label">Bio <span class="required">*</span></label>
<textarea placeholder="Here is my bio." class="form-control border-form-control" name="bio"><?= $customer['bio'] ?>"</textarea>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label class="control-label">Username <span class="required">*</span></label>
                           <input class="form-control border-form-control"  placeholder="Username" type="text" value="<?= $customer['username'] ?>" name="username" id="username">
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label class="control-label">Photo<span class="required">*</span></label>
                           <input class="form-control border-form-control" type="file" name="image" id="photo">
                           <input class="form-control border-form-control" type="hidden" name="currentimg" value="<?= $customer['photo'] ?>">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label class="control-label">NickName <span class="required"></span></label>
                           <input class="form-control border-form-control "  placeholder="nickname" type="text" value="<?= $customer['nickname'] ?>" name="nickname">
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label class="control-label">Date Of Birth <span class="required">*</span></label>
                           <input class="form-control border-form-control " type="date" name="dob" value="<?= $customer['dob'] ?>">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label class="control-label">Gender <span class="required"></span></label>
                           <select class="form-control border-form-control " name="gender" value="<?= $customer['gender'] ?>">
                              <optgroup>
                                 <option value="Male">Male</option>
                                 <option value="Female">Female</option>
                              </optgroup>
                           </select>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label class="control-label">Address <span class="required">*</span></label>
                           <textarea class="form-control border-form-control "  placeholder="Address" name="address"><?= $customer['address'] ?></textarea>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-4">
                        <div class="form-group">
                           <label class="control-label">Country <span class="required">*</span></label>
                           <input class="form-control border-form-control " type="text" name="country" placeholder="Country" value="<?= $customer['country'] ?>">
                        </div>
                     </div>
                     <div class="col-sm-4">
                        <div class="form-group">
                           <label class="control-label">State <span class="required">*</span></label>
                           <input class="form-control border-form-control "   type="text" name="state" placeholder="State" value="<?= $customer['state'] ?>">
                        </div>
                     </div>
                     <div class="col-sm-4">
                        <div class="form-group">
                           <label class="control-label">City <span class="required">*</span></label>
                           <input class="form-control border-form-control "   type="text" name="city" placeholder="City" value="<?= $customer['city'] ?>">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label class="control-label">Facebook <span class="required">*</span></label>
                           <input class="form-control border-form-control" name="facebook" value="<?= $customer['facebook'] ?>" placeholder="Facebook ID URL" type="url">
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label class="control-label">Twitter <span class="required">*</span></label>
                           <input class="form-control border-form-control" name="twitter" value="<?= $customer['twitter'] ?>" placeholder="Twitter ID URL" type="url">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label class="control-label">Instagram <span class="required">*</span></label>
                           <input class="form-control border-form-control" name="instagram" placeholder="Instagram ID URL" type="url" value="<?= $customer['instagram'] ?>">
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label class="control-label">Linkedin <span class="required">*</span></label>
                           <input class="form-control border-form-control" name="linkedin" placeholder="Linkedin ID URL" type="url" value="<?= $customer['linkedin'] ?>">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-12 text-right">
                        <button type="button" onclick="hide_edit()" class="btn btn-danger border-none"> Cancel </button>
                        <input type="submit" class="btn btn-success border-none" value="Save Changes">
                     </div>
                  </div>
               </form>
                           </div>
                        </div>
                     </div>
                  </div>
                  
            </div>
            </div>
<!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Change Cover Image</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div class="rounded image bg-dark" style="height: 340px;width: 1100px;">
             <img class="img-fluid" alt="" src="<?php echo $call_config->base_url() ?>app-assets/user/cover_img/<?= $cover_image?>" style="height: 340px;width: 1100px;" id="up_cover">
          </div>
          <form method="POST" action="<?php echo $call_config->base_url() ?>application/modal/user/cover_img/change_cover_img.php" enctype="multipart/form-data" id="form">
          <label for="cpic">change cover image</label>
          <input type="file" class="form-control" name="image" id="cpic" required>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <button type="submit" class="btn btn-danger" id="Upload"><span class="fa fa-upload"></span> Upload</button>
     </form>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
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
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#up_cover').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#cpic").change(function(){
        readURL(this);
    });
    $(document).ready(function (e) {
 $("#form").on('submit',(function(e) {
  e.preventDefault();
  $.ajax({
         url: "<?php echo $call_config->base_url() ?>application/modal/user/cover_img/change_cover_img.php",
   type: "POST",
   data:  new FormData(this),
   contentType: false,
         cache: false,
   processData:false,
   beforeSend : function()
   {
    $("#err").fadeOut();
   },
   success: function(data)
      {
    if(data=='invalid')
    {
     // invalid file format.
     alert('invalid');
    }
    else
    {
      location.reload(true);
      // alert(data);
     // view uploaded file.
      //$(".msg").html("<div class='alert alert-success'><strong>Successfully</strong> Updated..</div>");
     // $("#form")[0].reset(); 
    }
      },
     error: function(e) 
      {
    $("#err").html(e).fadeIn();
      }          
    });
 }));
});
</script>
<script type="text/javascript">
  $(document).ready(function(){

    load_data(1);

    function load_data(page, query = '')
    {
      $.ajax({
        url:"fetch.php",
        method:"POST",
        data:{page:page, query:query},
        success:function(data)
        {
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
 <!--<link href="css/style.css" rel="stylesheet" type="text/css"> -->
             <script type="text/javascript">
               $(document).ready(function (e) {
 $("#form").on('submit',(function(e) {
  e.preventDefault();
  $.ajax({
         url: "<?php echo $call_config->base_url() ?>application/modal/user/profile/edit_profile.php",
   type: "POST",
   data:  new FormData(this),
   contentType: false,
         cache: false,
   processData:false,
   beforeSend : function()
   {
    //$("#preview").fadeOut();
    $("#err").fadeOut();
   },
   success: function(data)
      {
    if(data=='invalid')
    {
     // invalid file format.
     $(".msg").html("<div class='alert alert-danger'><strong>Sorry.</strong> There are some problem to Update..</div>");
    }
    else
    {
     // alert(data);
     // view uploaded file.
      $(".msg").html("<div class='alert alert-success'><strong>Successfully</strong> Updated..</div>");
     // $("#form")[0].reset(); 
    }
      },
     error: function(e) 
      {
    $("#err").html(e).fadeIn();
      }          
    });
 }));
});
            </script>
            <script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#photo").change(function(){
        readURL(this);
    });
</script>