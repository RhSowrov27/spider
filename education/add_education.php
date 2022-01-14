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
                        <h5>Add Banner</h5>
                    </div>
                    
                    <div class="card-body">
                        <form action="education_post.php" method="POST" enctype="multipart/form-data" >
                        <div class="form-group">
                            <label for="">Year</label>
                            <input type="text" class="form-control" name="year">
                            </div>
                            <div class="form-group">
                            <label for="">percentage</label>
                            <input type="text" class="form-control" name="percentage">
                            </div>
                            <div class="form-group">
                            <label for="">Title</label>
                            <textarea class="form-control" name="title"></textarea>
                            </div>

                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Add Education</button>
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