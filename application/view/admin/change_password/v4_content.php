<!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-wrapper-before"></div>
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- form begin -->
                <<div class="row">
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
<form class="form form-horizontal needs-validation" method="POST" enctype="multipart/form-data" action="<?php echo $call_config->base_url()."application/modal/admin/update_admin_password.php"; ?>" novalidate>
                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-lock"></i> Change Password</h4>
                                <div class="form-group row">
                                    <label class="col-md-4 label-control" for="validationTooltip01">Old Password</label>
                                    <div class="col-md-4">
                                        <div class="position-relative has-icon-left">
                                        <input type="password" id="validationTooltip01" class="form-control" placeholder="Old Password" name="oldpassword" required>
                                        <div class="form-control-position">
                                        <i class="ft-lock"></i>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 label-control" for="validationTooltip02">New Password</label>
                                    <div class="col-md-4">
                                        <div class="position-relative has-icon-left">
                                        <input type="password" id="validationTooltip02" class="form-control Password" placeholder="New Password" name="newpassword" required>
                                        <div class="form-control-position">
                                        <i class="ft-lock"></i>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 label-control" for="validationTooltip03">Re-New Password</label>
                                    <div class="col-md-4">
                                        <div class="position-relative has-icon-left">
                                        <input type="password" id="validationTooltip03" class="form-control Re-Password" placeholder="Re-Password" name="repassword" required="">
                                        <div class="form-control-position">
                                        <i class="ft-lock"></i>
                                        </div>
                                        <p class="text-danger" id="msg">Password doesn't match!</p>
                                    </div>
                                    </div>
                                </div>
                            <div class="form-actions center">
                                <button type="button" class="btn btn-danger mr-1">
                                    <i class="ft-x"></i> Cancel
                                </button>
                                <button type="submit" class="btn btn-primary" name="submit">
                                    <i class="la la-check-square-o"></i> Save
                                </button>
                            </div>
                            </div>
                        </form>
                <!--/ form end -->
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>

<!-- BEGIN: Page JS-->
    <script src="<?php echo $admin_base_url ?>app-assets/js/scripts/forms/validation/form-validation.js" type="text/javascript"></script>
<!-- END: Page JS-->

<script>
    $(document).ready(function(){
        $('#msg').hide();
    $(".Re-Password").keyup(function(){
        if($(".Re-Password").val() != $(".Password").val())
        {
            $('#msg').show();
            // alert('j');
            // $("#validationTooltip03").val('')
        }
        else{
            $('#msg').hide();
        }
    })
});
</script>
