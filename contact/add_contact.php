<?php

require '../../kufa/sessionCheck.php';
require '../../kufa/dashboard_includes/header.php';

require '../../kufa/db.php';
?>
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>

      </nav>

      <div class="sl-pagebody">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h5>Add Contact</h5>
                    </div>
                    
                    <div class="card-body">
                        <form action="contact_post.php" method="POST" enctype="multipart/form-data" >
                        <div class="form-group">
                            <label for="">Contact Information</label>
                            <input type="text" class="form-control" name="contact_information">
                            </div>
                            <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" class="form-control" name="address">
                            </div>
                            <div class="form-group">
                            <label for="">Phone</label>
                            <input type="text" class="form-control" name="phone">
                            </div>
                            <div class="form-group">
                            <label for="">Place</label>
                            <input type="text" class="form-control" name="place">
                            </div>
                            <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email">
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Add Contact</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

      </div>
</div>

<?php require '../../kufa/dashboard_includes/footer.php';?>
<?php if(isset($_SESSION ['education'])){ ?>
    <script>
        Swal.fire({
                    icon: 'success',
                    title: 'Successfuly',
                    text: '<?=$_SESSION ['education']?>',
                            
                  })
    </script>
<?php } unset($_SESSION ['education']); ?>