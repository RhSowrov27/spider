<?php
require '../sessionCheck.php';
require '../dashboard_includes/header.php'; 

require '../db.php';

$select_trash_users = 'SELECT * FROM users WHERE status=1';
$select_trash_users_result = mysqli_query ($db_connect, $select_trash_users);
    ?>
    
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>

      </nav>

      <div class="sl-pagebody">
    <div class="sl-page-title d-flex justify-content-center ">
    <div class="row">
            <div class="col-lg-12 m-auto">
                <div class="card">
                    <div class="card-header bg-warning text-center">
                        
                        <h3  class="text-white">Trash</h3>
                    </div>
                    <?php if(isset($_SESSION ['restore'])){ ?>
                    <div class="alert alert-success" role="alert">
                    <h4 class="alert-heading"><?= $_SESSION ['restore'] ?></h4>
                    </div>
                    <?php unset($_SESSION ['restore']); } ?>
                    <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Date of Birth</th>
                            <th scope="col">Email</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Actiion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($select_trash_users_result as $key=> $trash_users){ ?>
                            <tr>
                            <th scope="row"><?php echo $key+1 ?></th>
                            <td><?php echo $trash_users['fName'] ?></td>
                            <td><?php echo $trash_users['lName'] ?></td>
                            <td><?php echo $trash_users['date_of_birth'] ?></td>
                            <td><?php echo $trash_users['email'] ?></td>
                            
                            
                            <td class="table-light"><img width="100" src="../uploads/users/<?php echo $trash_users['profile_photo'] ?>" alt=""></td>
                          
                            <td><?php echo $trash_users['created_at'] ?></td>
                            
                            <td><a  href="restore.php?id=<?php echo $trash_users['id'] ?>" class="btn btn-primary" >Restore</a></td>
                            
                            <td><a href="delete.php?id=<?php echo $trash_users['id'] ?>"  class="btn btn-primary"  class="btn btn-danger" >Permanent Delete</a></td>
                            
                            </tr>
                            
                            <?php } ?>
                            
                        </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
          
        </div><!-- sl-page-title -->

      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->
    <?php require '../dashboard_includes/footer.php'; ?>
<?php if(isset($_SESSION ['delete_user'])) {?>
<script>
    Swal.fire({
  position: 'center',
  icon: 'success',
  title: 'User deleted permanently',
  showConfirmButton: false,
  timer: 1500
})
</script>
    <?php } unset($_SESSION ['delete_user']);?>