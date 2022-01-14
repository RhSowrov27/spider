<?php 


require '../../kufa/sessionCheck.php';

require '../../kufa/dashboard_includes/header.php';

?>

<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>

      </nav>

      <div class="sl-pagebody">
    <div class="sl-page-title d-flex justify-content-center ">
  <body>

    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-md-100v">

      <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">starlight <span class="tx-info tx-normal">admin</span></div>
        <div class="tx-center mg-b-60">Professional Admin Template Design</div>
        <form action="post.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
        
        <label for="fName" class="form-label">Fast Name</label>
                                        <input value="<?= (isset($_SESSION['fName']))?$_SESSION['fName']:'' ?>" name="fName" type="text" class="form-control" id="fName" aria-describedby="emailHelp">
                                        <?php if(isset($_SESSION['errors']['fName'])){ ?>
                                            
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                  <?= $_SESSION['errors']['fName']; ?>
                                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                  </div>
                                        <?php } unset($_SESSION['errors']['fName']) ?>
        
        
        </div><!-- form-group -->
        <div class="form-group">
        <label for="lName" class="form-label">Last Name</label>
                                        <input value="<?= (isset($_SESSION['lName']))?$_SESSION['lName']:'' ?>" name="lName" type="text" class="form-control" id="lName" aria-describedby="emailHelp">
                                        <?php if(isset($_SESSION['errors']['lName'])){ ?>
                                            
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                  <?= $_SESSION['errors']['lName']; ?>
                                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                  </div>
                                        <?php } unset($_SESSION['errors']['lName']) ?>
        </div><!-- form-group -->
        
        <div class="form-group">
          
        <label for="email" class="form-label">Email address</label>
                                <input value="<?= (isset($_SESSION['email']))?$_SESSION['email']:'' ?>" name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp">
                                <?php if(isset($_SESSION['errors']['email'])){ ?>
                                            
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                  <?= $_SESSION['errors']['email']; ?>
                                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                  </div>
                                        <?php } unset($_SESSION['errors']['email']) ?>

        </div><!-- form-group -->

        <div class="form-group">
          
        <label for="date" class="form-label">Date of brith</label>
                                <input value="<?= (isset($_SESSION['date']))?$_SESSION['date']:'' ?>"
                                 name="date" type="date" class="form-control" id="email" aria-describedby="emailHelp">
                                <?php if(isset($_SESSION['errors']['date'])){ ?>
                                            
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                  <?= $_SESSION['errors']['date']; ?>
                                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                  </div>
                                        <?php } unset($_SESSION['errors']['date']) ?>

        </div><!-- form-group -->

        <div class="form-group">
          
        <label for="password" class="form-label">Password</label>
                                <input value="<?= (isset($_SESSION['password']))?$_SESSION['password']:'' ?>" name="password" type="password" class="form-control" id="password">
                                <?php if(isset($_SESSION['errors']['password'])){ ?>
                                            
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                  <?= $_SESSION['errors']['password']; ?>
                                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                  </div>
                                        <?php } unset($_SESSION['errors']['password']) ?>

        </div><!-- form-group -->

        <div class="form-group">
        <label for="cpassword" class="form-label">Confirm Password</label>
                                <input value="<?= (isset($_SESSION['cpassword']))?$_SESSION['cpassword']:'' ?>" name="cpassword" type="password" class="form-control" id="cpassword">
                                <?php if(isset($_SESSION['errors']['cpassword'])){ ?>
                                            
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                  <?= $_SESSION['errors']['cpassword']; ?>
                                                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                  </div>
                                        <?php } unset($_SESSION['errors']['cpassword']) ?>


        </div><!-- form-group -->

        <div class="form-group">
          
        <label for="file_attach" class="form-label">Profile Photo</label>
                                <input type="file" name="profile_image" class="form-control">

        </div><!-- form-group -->



        <div class="form-group">
          
        <select name="admin_role"  class="form-label w-100  custom-select">
            <option value="">Select Role</option>
            <option value="1">Admin</option>
            <option value="2">Modaretor</option>
            <option value="3">Editor</option>
            <option value="0">Mamber</option>
          </select>
  
        </div><!-- form-group -->
        

        
        






        <div class="form-group tx-12">By clicking the Sign Up button below, you agreed to our privacy policy and terms of use of our website.</div>
        <button type="submit" class="btn btn-info btn-block">Sign Up</button>

        <div class="mg-t-40 tx-center">Already have an account? <a href="../login.php" class="tx-info">Sign In</a></div>
      </div><!-- login-wrapper -->
    </div><!-- d-flex -->
</form>
</div>
</div>
<?php 




require '../../kufa/dashboard_includes/footer.php';

?>
    
    
<?php if(isset($_SESSION['success'])){?>
        <script>
            Swal.fire(
      'Deleted!',
      '<?=$_SESSION['success']?>',
      'success'
    )
        </script>

   <?php } unset($_SESSION['success']); ?>
   <?php if(isset($_SESSION['file_size'])){?>
        <script>
            Swal.fire(
      'Deleted!',
      '<?=$_SESSION['file_size']?>',
      'success'
    )
        </script>

   <?php } unset($_SESSION['file_size']); ?>
   <?php if(isset($_SESSION['inv_ext'])){?>
        <script>
            Swal.fire(
      'Deleted!',
      '<?=$_SESSION['inv_ext']?>',
      'success'
    )
        </script>

   <?php } unset($_SESSION['inv_ext']); ?>
   <?php if(isset($_SESSION['email_exits'])){?>
        <script>
            Swal.fire(
      'Deleted!',
      '<?=$_SESSION['email_exits']?>',
      'success'
    )
        </script>

   <?php } unset($_SESSION['email_exits']); ?>


  
