<?php 
require '../sessionCheck.php';
require '../dashboard_includes/header.php';


require '../db.php';


$id = $_GET['id'];


$select_banner = "SELECT * FROM banners WHERE id=$id";
$select_banner_result = mysqli_query ($db_connect, $select_banner);

$after_assoc = mysqli_fetch_assoc($select_banner_result);

?>

<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>

      </nav>

      <div class="sl-pagebody">
    <div class="sl-page-title d-flex justify-content-center ">
    <div class="row">
                <div class="col-lg-14 m-auto">
                    <div class="">

                        <h1>Edit User Information</h1>
                        
                        <form action="banner_update.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <input  type="hidden" name="id" value="<?= $after_assoc['id'] ?>">
                                        <label for="title" class="form-label">Title</label>
                                        <input value="<?= $after_assoc['title'] ?>" name="title" type="text" class="form-control" id="title" aria-describedby="emailHelp">
                   
                                      </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <input value="<?= $after_assoc['description'] ?>" name="description" type="text" class="form-control" id="description" aria-describedby="emailHelp">
                                        
                                      </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="btn" class="form-label">Button</label>
                                <input value="<?= $after_assoc['btn'] ?>" name="btn" type="text" class="form-control" id="btn" aria-describedby="emailHelp">
                                
                              </div>
                              <div class="mb-3">
                              <label for="banner_img" class="form-label">Banner image</label>
                                <img  width="100" src="../uploads/banners/<?= $after_assoc['banner_img'] ?>" alt="">
                                
                              </div>

                              
                              <div class="mb-3">
                                
                                <input  name="banner_img" type="file" class="form-control" id="email" aria-describedby="emailHelp">
                                
                              </div>


                              <div class="form_btn">
                                <button type="submit" class="btn btn-primary">Save</button>
                                
                              </div>
                              
                        </form>
                    </div>
                </div>
            </div>
           <?php require '../dashboard_includes/footer.php'; ?>
           

           <?php if(isset($_SESSION ['update_user'])){ ?>
                    <script>
                        Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: '<?=$_SESSION ['update_user']?>',
                        showConfirmButton: false,
                        timer: 1500
                        })
                    </script>
                    <?php unset($_SESSION ['update_user']); } ?>

                    <?php if(isset($_SESSION ['extention'])){ ?>
                        <script>
                        Swal.fire({
                        position: 'center',
                        icon: 'warning',
                        title: '<?=$_SESSION ['extention']?>',
                        showConfirmButton: false,
                        timer: 1500
                        })
                    </script>
                    <?php unset($_SESSION ['extention']); } ?>

                    <?php if(isset($_SESSION ['file_size'])){ ?>
                        <script>
                        Swal.fire({
                        position: 'center',
                        icon: 'info',
                        title: '<?=$_SESSION ['file_size']?>',
                        showConfirmButton: false,
                        timer: 1500
                        })
                    </script>
                    <?php unset($_SESSION ['file_size']); } ?>