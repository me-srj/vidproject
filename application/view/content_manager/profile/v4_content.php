<?php 
$session=$cmg_sess_data["sess_cmg_id"];
$sql="SELECT * FROM `tbl_content_manager_master` WHERE `id`='$session'";
$result=$call_config->get($sql);
// print_r($result);
    ?>
<!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- form begin -->
                <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="card-content collpase show">
                    <div class="card-body">
<form class="form form-horizontal needs-validation" method="POST" enctype="multipart/form-data" action="<?php echo $call_config->base_url()."application/modal/content_manager/update_cmg.php"; ?>" novalidate>
    <div class="alert alert-info alert-dismissible mb-2">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                Email and Mobile is not editable</div>
                            <div class="form-body">
                                <h4 class="form-section"><i class="la la-eye"></i> Edit Profile</h4>
                                <div class="col-md-12">
                                <img src="<?php echo $call_config->base_url().'app-assets\c_manager/'.$result['image']; ?>" id="profile-img-tag" style="width:100px; height:100px" class="img-thumbnail" />
                                <br>
                                <br>
                            </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="validationTooltip01">Name</label>
                                            <div class="col-md-9">
                                            <div class="position-relative has-icon-left">
                                                <input type="text" id="validationTooltip01" class="form-control border-primary" placeholder="Name" name="name" value="<?php echo $result['name'];?>" required>
                                                <div class="form-control-position">
                                                <i class="ft-user"></i>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="userinput2">Phone No.</label>
                                            <div class="col-md-9">
                                                <div class="position-relative has-icon-left">
                                                <input type="tel" id="userinput2" class="form-control border-primary" placeholder="Phone Number" readonly="" name="mobile" value="<?php echo $result['mobile'];?>" max="10" min="10" required>
                                                <div class="form-control-position">
                                                <i class="ft-phone"></i>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                            
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                        <label class="col-md-3 label-control" for="userinput8">Image</label>
                                        <div class="col-md-9">
                                        <fieldset class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input image-file" id="photo" name="image" value="<?php echo $result['image']; ?>">
                                <label class="custom-file-label" for="userinput7">Choose file</label>
                            </div>
                                        </fieldset>
                                     </div>
                                        </div>
                                    </div>
                                     <div class="col-md-6">
                                        <div class="form-group row">
                                        <label class="col-md-3 label-control" for="userinput8">E-mail</label>
                                        <div class="col-md-9">
                                        <fieldset class="form-group">
                            <div class="custom-file">
                                <input type="email" readonly="" class="form-control border-primary" name="email" value="<?php echo $result['email']; ?>">
                            </div>
                                        </fieldset>
                                     </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <input type="text" name="currentimg" value="<?php echo $result['image']; ?>" hidden>
                            <div class="form-actions right">
                                <button type="button" class="btn btn-danger mr-1">
                                    <i class="ft-x"></i> Cancel
                                </button>
                                <button type="submit" class="btn btn-primary" name="submit">
                                    <i class="la la-check-square-o"></i> Save
                                </button>
                            </div>
                        </form>
                <!--/ form end -->
            </div>
        </div>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
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


<!-- BEGIN: Page JS-->
    <script src="<?php echo $admin_base_url ?>app-assets/js/scripts/forms/validation/form-validation.js" type="text/javascript"></script>
<!-- END: Page JS-->

