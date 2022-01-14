<?php
// require 'sessionCheck.php';
session_start();
require 'db.php';
require 'dashboard_includes/header.php';


   
    ?>
    
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>

      </nav>

      <div class="sl-pagebody">
    <div class="sl-page-title d-flex justify-content-center ">
        <h1>Welcome to KGF</h1>
          
        </div><!-- sl-page-title -->

      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
    <?php require 'dashboard_includes/footer.php'; ?>
    <?php
    if(isset($_SESSION['login_success'])){  ?>
    <script>
         swal("<?=$_SESSION['login_success']?>", "", "success");
    </script>

    <?php }  ; unset($_SESSION['login_success']);?>
