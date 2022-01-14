<?php 
require '../dashboard_includes/header.php';


require '../sessionCheck.php';

require '../db.php';


$id = $_GET['id'];

$select_users = "SELECT * FROM users WHERE id=$id";
$select_users_result = mysqli_query ($db_connect, $select_users);
$after_assoc = mysqli_fetch_assoc($select_users_result);
?>
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>

      </nav>

      <div class="sl-pagebody">
    <div class="sl-page-title d-flex justify-content-center ">
        
        <title>User View</title>
            <div class="col-lg-12 m-auto">
                <div class="card">
                    <div class="card-header bg-warning text-center">
                        
                        <h3  class="text-white">User Information</h3>
                    </div>
                        
                    <div class="card-body">
                    <table class="table table-striped">
                      <tbody>
                          <tr>
                            <td class="table-success">First Name</td>
                            <td class="table-info"><?= $after_assoc['fName'] ?></td>
                          </tr>
                          <tr>
                            <td class="table-info">Last Name</td>
                            <td class="table-success"><?= $after_assoc['lName'] ?></td>
                          </tr>
                          <tr>
                            <td class="table-success">Email</td>
                            <td class="table-info"><?= $after_assoc['email'] ?></td>
                          </tr>
                          <tr>
                            <td class="table-info">Profile Photo</td>
                            <td class="table-success"><img width="100" src="../uploads/users/<?php echo $after_assoc['profile_photo'] ?>" alt=""></td>
                          </tr>
                          <tr>
                            <td class="table-success">Date of Birth</td>
                            <td class="table-info"><?php echo $after_assoc['date_of_birth'] ?></td>
                          </tr>
                          <tr>
                            <td class="table-info">Created at</td>
                            <td class="table-success"><?=$after_assoc['created_at'] ?></td>
                          </tr>
                      </tbody>
                    </table>
                    </div>
                    
                </div>
            </div>

        </div>
          
        </div><!-- sl-page-title -->

      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->

    

 

    <?php require '../dashboard_includes/footer.php'; ?>