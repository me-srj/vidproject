<?php
include('../../config.php');
$call_config = new config();
$call_config->cookiecheck();
?>
<!DOCTYPE html>
<html lang="en"> 
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Askbootstrap">
      <meta name="author" content="Askbootstrap">
      <title>8in Play</title>
      <!-- Favicon Icon -->
      <link rel="icon" type="image/png" href="img/favicon.png">
      <!-- Bootstrap core CSS-->
      <link href="<?php echo $call_config->base_url() ?>app-assets/user/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom fonts for this template-->
      <link href="<?php echo $call_config->base_url() ?>app-assets/user/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <!-- Custom styles for this template-->
      <link href="<?php echo $call_config->base_url() ?>app-assets/user/css/osahan.css" rel="stylesheet">
      <!-- Owl Carousel -->
      <link rel="stylesheet" href="<?php echo $call_config->base_url() ?>app-assets/user/vendor/owl-carousel/owl.carousel.css">
      <link rel="stylesheet" href="<?php echo $call_config->base_url() ?>app-assets/user/vendor/owl-carousel/owl.theme.css">
 <style>
            @media (max-width: 600px) {
  .hide_on_mobile {
    display: none;
  }
.bg-white {
    background: #3494E6;
    background: -webkit-linear-gradient(to right, #EC6EAD, #3494E6);
    background: linear-gradient(to top, #391a2a, #104777);
}
body {
    background: #3494E6;
    background: -webkit-linear-gradient(to right, #EC6EAD, #3494E6);
    background: linear-gradient(to top, #391a2a, #3a1d2c);
    color: #888;
    font-size: 13px;
    height: 100%;
    font-family: 'Poppins', sans-serif;
    padding-bottom:0px !important;
}
.pt-4, .py-4 {
    padding-top: 0.0rem!important;
}

.mb-5, .my-5 {
    margin-bottom: 1rem!important;
}
p {
    margin-top: 0;
    margin-bottom: 1rem;
    color: #fff;
}
a:hover, h1, h2, h3, h4, h5, h6 {
    color: #fff;
}
.btn-outline-primary {
    border-color: #ff0000;
    color: #ff0000;
    background: #A1FFCE;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #FAFFD1, #A1FFCE);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #FAFFD1, #A1FFCE); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}
.btn-outline-primary {
    border-color: #fffafa;
    color: #380000;
    background: #A1FFCE;
    background: -webkit-linear-gradient(to right, #FAFFD1, #A1FFCE);
    background: linear-gradient(to right, #FAFFD1, #A1FFCE);
    box-shadow: 1px 1px 9px 3px #101010;
}
.form-control {
    display: block;
    width: 100%;
    height: calc(1.5em + .75rem + 2px);
    padding: 1.205rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
}
      </style>
   </head>
   <body class="login-main-body">
      <section class="login-main-wrapper">
         <div class="container-fluid pl-0 pr-0">
            <div class="row no-gutters">
               <div class="col-md-5 p-5 bg-white full-height">
                  <div class="login-main-left">
                     <div class="text-center mb-5 login-main-left-header pt-4">
                        <img src="../../img/logo.png" class="img-fluid" alt="LOGO">
                        <h5 class="mt-3 mb-3">Welcome to 8in Play</h5>
                        <p>India's Best Short Video App</p>
                     </div>
                     <form method="POST" action="<?= $call_config->base_url() ?>application/modal/login_page.php">
                        <div class="form-group">
                           <label>Username</label>
                           <input type="text" name="_email" class="form-control" placeholder="Enter E-mail">
                        </div>
                        <div class="form-group">
                           <label>Password</label>
                           <input type="password" name="_password" class="form-control" placeholder="Password">
                        </div>
                        <input type="hidden" readonly="" name="_key" value="4">
                        <div class="mt-4">
                           <div class="row">
                              <div class="col-12">
                                 <button type="submit" name="submit" class="btn btn-outline-primary btn-block btn-lg">Sign In</button>
                              </div>
                           </div>
                        </div>
                     </form>
                     <div class="text-center mt-5">
                        <p class="light-gray">Don’t have an account? <a href="register.php">Sign Up</a></p>
                     </div>
                  </div>
               </div>
               <div class="col-md-7 ">
                  <div class="login-main-right bg-white p-5 mt-5 mb-5 hide_on_mobile">
                     <div class="owl-carousel owl-carousel-login">
                        <div class="item">
                           <div class="carousel-login-card text-center">
                              <img src="../../img/login.png" class="img-fluid" alt="LOGO">
                              <h5 class="mt-5 mb-3">Watch videos offline</h5>
                              <p class="mb-4">when an unknown printer took a galley of type and scrambled<br> it to make a type specimen book. It has survived not <br>only five centuries</p>
                           </div>
                        </div>
                        <div class="item">
                           <div class="carousel-login-card text-center">
                              <img src="../../img/login.png" class="img-fluid" alt="LOGO">
                              <h5 class="mt-5 mb-3">Download videos effortlessly</h5>
                              <p class="mb-4">when an unknown printer took a galley of type and scrambled<br> it to make a type specimen book. It has survived not <br>only five centuries</p>
                           </div>
                        </div>
                        <div class="item">
                           <div class="carousel-login-card text-center">
                              <img src="../../img/login.png" class="img-fluid" alt="LOGO">
                              <h5 class="mt-5 mb-3">Create GIFs</h5>
                              <p class="mb-4">when an unknown printer took a galley of type and scrambled<br> it to make a type specimen book. It has survived not <br>only five centuries</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Bootstrap core JavaScript-->
      <script src="<?php echo $call_config->base_url() ?>app-assets/user/vendor/jquery/jquery.min.js"></script>
      <script src="<?php echo $call_config->base_url() ?>app-assets/user/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <!-- Core plugin JavaScript-->
      <script src="<?php echo $call_config->base_url() ?>app-assets/user/vendor/jquery-easing/jquery.easing.min.js"></script>
      <!-- Owl Carousel -->
      <script src="<?php echo $call_config->base_url() ?>app-assets/user/vendor/owl-carousel/owl.carousel.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="<?php echo $call_config->base_url() ?>app-assets/user/js/custom.js"></script>
   </body>
</html>