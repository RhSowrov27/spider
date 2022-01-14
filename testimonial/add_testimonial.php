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
                        <h5>Add Testimonial</h5>
                    </div>
                    
                    <div class="card-body">
                        <form action="testimonial_post.php" method="POST" enctype="multipart/form-data" >
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name">
                            </div>

                            <div class="form-group">
                            <label for="">Company</label>
                            <textarea class="form-control" name="company"></textarea>
                            </div>
                            <div class="form-group">
                            <label for=""> Quotes</label>
                            <textarea name="quotes" id="" cols="30" rows="10"></textarea>
                            </div>
                           <div class="form-group">
                            <label for=""> Image</label>
                            <input type="file" class="form-control" name="image">
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Add Testimonial</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

      </div>
</div>

<?php require '../../kufa/dashboard_includes/footer.php';?>

<?php if(isset($_SESSION ['invalid_extention'])){ ?>
    <script>
        Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '<?=$_SESSION ['invalid_extention']?>',
                            
                  })
    </script>
<?php } unset($_SESSION ['invalid_extention']); ?>
<?php if(isset($_SESSION ['file_size'])){ ?>
    <script>
        Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '<?=$_SESSION ['file_size']?>',
                            
                  })
    </script>
<?php } unset($_SESSION ['file_size']); ?>
<?php if(isset($_SESSION ['success'])){ ?>
    <script>
        Swal.fire({
        position: 'top-center',
        icon: 'success',
        title: '<?=$_SESSION ['success']?>',
        showConfirmButton: false,
        timer: 1500
        })
        
    </script>
<?php } unset($_SESSION ['success']); ?>