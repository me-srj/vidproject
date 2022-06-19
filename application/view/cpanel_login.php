<?php
include('../../config.php');
$call_config = new config();
// $call_config->slient_session_flash();
?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  
<!-- Mirrored from themeselection.com/demo/chameleon-admin-template/html/ltr/vertical-menu-template/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 28 Jun 2019 18:25:19 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   
    <title>Login </title>
    <link rel="apple-touch-icon" href="<?php echo $call_config->base_url(); ?>app-assets/admin/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="https://themeselection.com/demo/chameleon-admin-template/<?php echo $call_config->base_url(); ?>app-assets/admin/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo $call_config->base_url(); ?>app-assets/admin/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $call_config->base_url(); ?>app-assets/admin/vendors/css/forms/toggle/switchery.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $call_config->base_url(); ?>app-assets/admin/css/plugins/forms/switch.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $call_config->base_url(); ?>app-assets/admin/css/core/colors/palette-switch.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo $call_config->base_url(); ?>app-assets/admin/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $call_config->base_url(); ?>app-assets/admin/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $call_config->base_url(); ?>app-assets/admin/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $call_config->base_url(); ?>app-assets/admin/css/components.min.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo $call_config->base_url(); ?>app-assets/admin/css/core/menu/menu-types/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $call_config->base_url(); ?>app-assets/admin/css/core/colors/palette-gradient.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $call_config->base_url(); ?>app-assets/admin/css/pages/login-register.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo $call_config->base_url(); ?>app-assets/admin/css/style.css"> -->
    <!-- END: Custom CSS-->

  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu 1-column  bg-full-screen-image blank-page blank-page" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="1-column">
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="col-lg-4 col-md-6 col-10 box-shadow-2 p-0">
            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                <div class="card-header border-0">
                    <div  class="text-center mb-1">
                            <img src="<?php echo $call_config->base_url(); ?>app-assets/admin/images/logo/logo.png" alt="branding logo">
                    </div>
                    <div class="font-large-1  text-center">                       
                       Kb Super Market Login
                    </div>
                </div>
                <div class="card-content">
                   
                    <div class="card-body">
 <form class="form-horizontal"  method="post" action="<?php echo $call_config->base_url();?>application/modal/login_page.php" novalidate autocomplete="off"id="loginform">
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="text" class="form-control round" id="phone" placeholder="Username" name="_email" value="pvwebsolution@gmail.com" >
                                <div class="form-control-position">
                                    <i class="ft-phone"></i>
                                </div>
                            </fieldset>
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="password" class="form-control round" id="password" name="_password" placeholder="Enter Password">
                                <div class="form-control-position">
                                    <i class="ft-lock"></i>
                                </div>
                            </fieldset>

                             <select class="form-group  form-control round form-control position-relative has-icon-left" name="_key" id="login"placeholder="Login">
                                <optin value=""></optin>
                                 <option class=" form-control round" value="1">Admin</option>
                                 <option class=" form-control round" value="2">Account Manager</option>                               
                                 <option class=" form-control round" value="3">Content Manager</option>
                                   <div class="form-control-position">
                                   <i class="ft-user"></i>
                                </div>
                            </select>

                            <div class="form-group row">
                                <div class="col-md-6 col-12 text-center text-sm-left">
                                   
                                </div>
                                <div class="col-md-6 col-12 float-sm-left text-center text-sm-right"><a href="forget_password.php" class="card-link">Forgot Password?</a></div>
                            </div>                           
                            <div class="form-group text-center">
                                <button type="submit" class="btn round btn-block btn-glow btn-bg-gradient-x-purple-blue col-12 mr-1 mb-1" name="submit">Login</button>    
                            </div>
                           
                        </form>
                    </div>
                   <!--  <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-2 "><span>OR Sign Up Using</span></p>
                    <div class="text-center">
                        <a href="#" class="btn btn-social-icon round mr-1 mb-1 btn-facebook"><span class="ft-facebook"></span></a>
                        <a href="#" class="btn btn-social-icon round mr-1 mb-1 btn-twitter"><span class="ft-twitter"></span></a>
                        <a href="#" class="btn btn-social-icon round mr-1 mb-1 btn-instagram"><span class="ft-instagram"></span></a>
                    </div>
                    
                    <p class="card-subtitle text-muted text-right font-small-3 mx-2 my-1"><span>Don't have an account ? <a href="register.html" class="card-link">Sign Up</a></span></p>   -->                  
                </div>
            </div>
        </div>
    </div>
</section>

        </div>
      </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="<?php echo $call_config->base_url(); ?>app-assets/admin/vendors/js/vendors.min.js" type="text/javascript"></script>
    <script src="<?php echo $call_config->base_url(); ?>app-assets/admin/vendors/js/forms/toggle/switchery.min.js" type="text/javascript"></script>
    <script src="<?php echo $call_config->base_url(); ?>app-assets/admin/js/scripts/forms/switch.min.js" type="text/javascript"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?php echo $call_config->base_url(); ?>app-assets/admin/vendors/js/forms/validation/jqBootstrapValidation.js" type="text/javascript"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?php echo $call_config->base_url(); ?>app-assets/admin/js/core/app-menu.min.js" type="text/javascript"></script>
    <script src="<?php echo $call_config->base_url(); ?>app-assets/admin/js/core/app.min.js" type="text/javascript"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?php echo $call_config->base_url(); ?>app-assets/admin/js/scripts/forms/form-login-register.min.js" type="text/javascript"></script>
    <script scr="app-assets\js\scripts/jquery.validate.js"></script>
    <!-- END: Page JS-->

  </body>
  <!-- END: Body-->


</html>

           <!--                      <script>
            $(document).ready(function(){

           $("#loginform").validate({
        
            rules: {
                
                phone: {
                    required: true
                    
                },
                password:{
                    required:true
                    
                }
                
                },
            
            messages: {
                
            email: {
                    required: "Please enter your email"
                    
                },
                phone:{
                    required: "Please enter your password"
                    
                }
        },
        erroeElement:"em",
        errorPlacement: function ( error, element ) {
                    // Add the `help-block` class to the error element
                    error.addClass( "help-block" );

                    if ( element.prop( "type" ) === "checkbox" ) {
                        error.insertAfter( element.parent( "label" ) );
                    } else {
                        error.insertAfter( element );
                    }
                }

        });
    });
</script> -->