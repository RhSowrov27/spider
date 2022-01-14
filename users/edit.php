<?php 
require '../sessionCheck.php';
require '../dashboard_includes/header.php';


require '../db.php';


$id = $_GET['id'];


$select_user = "SELECT * FROM users WHERE id=$id";
$select_user_result = mysqli_query ($db_connect, $select_user);

$after_assoc = mysqli_fetch_assoc($select_user_result);

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
                        <?php if(isset($_SESSION ['update_user'])){ ?>
                    <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading"><?= $_SESSION ['update_user'] ?></h4>
                    </div>
                    <?php unset($_SESSION ['update_user']); } ?>
                        <form action="update.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <input  type="hidden" name="id" value="<?= $after_assoc['id'] ?>">
                                        <label for="fName" class="form-label">First Name</label>
                                        <input value="<?= $after_assoc['fName'] ?>" name="fName" type="text" class="form-control" id="fName" aria-describedby="emailHelp">
                   
                                      </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="lName" class="form-label">Last Name</label>
                                        <input value="<?= $after_assoc['lName'] ?>" name="lName" type="text" class="form-control" id="lName" aria-describedby="emailHelp">
                                        
                                      </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input value="<?= $after_assoc['email'] ?>" name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp">
                                
                              </div>
                              <div class="mb-3">
                                <img  width="100" src="../uploads/users/<?= $after_assoc['profile_photo'] ?>" alt="">
                                
                              </div>

                              
                              <div class="mb-3">
                                <label for="profile_photo" class="form-label">Profile Photo</label>
                                <input  name="profile_photo" type="file" class="form-control" id="email" aria-describedby="emailHelp">
                                
                              </div>
                              <div class="mb-3">
                                <label for="country" class="form-label">Country</label>
                                <select name="Country" id="">
                                  <option value="">Select your country</option>
                                <option value="<?= ($after_assoc['country'] == 'BD'? 'selected':'') ?>">BD</option>
                                <option value="<?= ($after_assoc['country'] == 'IND'? 'selected':'') ?>">IND</option>
                                <option value="PAK<?= ($after_assoc['country'] == 'PAK '? 'selected':'') ?>">PAK</option>
                                </select>
                                
                               
                              </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Date of brith</label>
                                <input value="<?= $after_assoc['date_of_birth'] ?>"
                                 name="date" type="date" class="form-control" id="email" aria-describedby="emailHelp">
                                
                              </div>

                              <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input value="<?= $after_assoc['password'] ?>" name="password" type="password" class="form-control" id="password">
                                
                              </div>

                              <?php if(isset($_SESSION ['extention'])){ ?>
                    <div class="alert alert-warning" role="alert">
                    <h4 class="alert-heading"><?=$_SESSION ['extention'] ?></h4>
                    </div>
                    <?php unset($_SESSION ['extention']); } ?>

                    <?php if(isset($_SESSION ['file_size'])){ ?>
                    <div class="alert alert-warning" role="alert">
                    <h4 class="alert-heading"><?=$_SESSION ['file_size'] ?></h4>
                    </div>
                    <?php unset($_SESSION ['file_size']); } ?>


                              <div class="form_btn">
                                <button type="submit" class="btn btn-primary">Save</button>
                                
                              </div>
                              
                        </form>
                    </div>
                </div>
            </div>
           <?php require '../dashboard_includes/footer.php'; ?>
           