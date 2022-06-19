<div id="content-wrapper">
            <div class="container-fluid pb-0">
               <div class="top-category section-padding mb-4">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="main-title">
                        <h6>Change Password</h6>
                        </div>
                     </div>
                  </div>
               </div>
               <hr>
               <div class="row"> 
                 <div class="col-md-4">  </div>
           <div class="col-md-4">
             <form method="post" action="<?php echo $call_config->base_url() ?>application/modal/user/change_password.php">
                        <div class="form-group">
                           <label>Enter old Password</label>
                           <input type="password" class="form-control" name="old" placeholder="Enter Old Password" required >

                        </div>
                         <div class="form-group">
                           <label>Enter New Password</label>
                           <input type="password" class="form-control" id="pass" name="new" placeholder="Enter New Password" required >
                        </div>
                         <div class="form-group">
                           <label>Re-enter New Password</label>
                           <input type="password" class="form-control" id="cpass" placeholder="Enter Confirm Password" required>
                           <span style="color:red;font-weight: bolder;font-size:12px;" id="error">Password and Confirm Password must be same</span>
                        </div>
                         <div class="row">
                     <div class="col-sm-12 text-right">
                        <a href="<?php echo $call_config->base_url() ?>application/view/user/dashboard" class="btn btn-danger text-white border-none"> Cancel </a>
                        <button type="submit" name="submit" class="btn btn-success border-none"> Change Password </button>
                     </div>
                  </div>
                        
                    

             </div>
            <div class="col-md-4">  </div>
            </div>
           
                 
               </form>
            </div>
            <!-- /.container-fluid -->z
<script type="">
   $(document).ready(function(){
       $('#error').hide();

      $('.btn').click(function(){
         var pass=$('#pass').val();
       var cpass=$('#cpass').val();
        
        if(pass!==cpass)
        {
         $('#error').show();
         $('#pass').val(null);
         $('#cpass').val(null);
        }
        else
        {
         $('#error').hide();
        }

      })
       


   });
</script>
            </div>
            <!-- /.container-fluid -->