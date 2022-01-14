<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>R h Sowrov</title>

    <!-- vendor css -->
    <link href="dashboard_assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="dashboard_assets/lib/Ionicons/css/ionicons.css" rel="stylesheet">


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="dashboard_assets/css/starlight.css">
  </head>

  <body>

    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

      <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">R h Sowrov <span class="tx-info tx-normal">admin</span></div>
        <div class="tx-center mg-b-60">Admin Login</div>
<form action="login_post.php"method="POST">
        <div class="form-group">
          <input type="email" class="form-control" name="email" placeholder="Enter your email">
        </div><!-- form-group -->
        <div class="form-group">
          <input type="password" class="form-control" name="password" placeholder="Enter your password">
          <a href="" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
        </div><!-- form-group -->
        <button type="submit" class="btn btn-info btn-block">Sign In</button>

        <div class="mg-t-60 tx-center">Not yet a member? <a href="users/register.php" class="tx-info">Sign Up</a></div>
      </div><!-- login-wrapper -->
    </div><!-- d-flex -->
 </form>
    <script src="dashboard_assets/lib/jquery/jquery.js"></script>
    <script src="dashboard_assets/lib/popper.js/popper.js"></script>
    <script src="dashboard_assets/lib/bootstrap/bootstrap.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    
<?php
    if(isset($_SESSION['logout_success'])){  ?>
    <script>
         swal("<?=$_SESSION['logout_success']?>", "", "info");
    </script>

    <?php } unset($_SESSION['logout_success']); ?>
  </body>
</html>



    

 

