<?php

require '../../kufa/sessionCheck.php';
require '../../kufa/dashboard_includes/header.php';

require '../../kufa/db.php';



$select_users = 'SELECT * FROM users WHERE status=0';
$select_users_result = mysqli_query ($db_connect, $select_users);
?>

<?php if($_SESSION['role'] != 0){ ?>
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
          
        <a class="breadcrumb-item" href="index.html">Dashboard</a>

      </nav>

      <div class="sl-pagebody">
    <div class="sl-page-title d-flex justify-content-center ">
    <div class="row">
        <title>Form users</title>
            <div class="col-lg-15 m-auto">
                <div class="card">
                    <div class="card-header bg-warning text-center">
                    
                        <h3  class="text-white">User Information</h3>
                        
                    </div>
                        
                    <div class="card-body">
                    
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Date of Birth</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Actiion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($select_users_result as $key=> $users){ ?>
                            <tr>
                            <th scope="row"><?php echo $key+1 ?></th>
                            <td><?php echo $users['fName'] ?></td>
                            <td><?php echo $users['lName'] ?></td>
                            <td><?php echo $users['date_of_birth'] ?></td>
                            <td><?php echo $users['email'] ?></td>
                            <td>
                                <?php if($users['role'] ==1){ ?>
                                    <span class="badge badge-pill badge-warning">Admin</span>

                                    <?php }
                                     elseif($users['role'] ==2){ ?>
                                    <span class="badge badge-pill badge-primary">Modaretor</span>

                                    <?php } 
                                     elseif($users['role'] ==3){ ?>
                                    <span class="badge badge-pill badge-success">Editor</span>

                                    <?php } 
                                     elseif($users['role'] ==0){ ?>
                                    <span class="badge badge-pill badge-info">Viewer</span>

                                    <?php } ?>
                            </td>
                            <td> <img width="50" src="../uploads/users/<?php echo $users['profile_photo'] ?>" alt=""> </td>
                            
                            <td><?php echo $users['created_at'] ?></td>
                            <td><a  href="view.php?id=<?php echo $users['id'] ?>" class="btn btn-info" >View</a></td>
                            <?php if($_SESSION['role'] != 3 ){ ?>
                            <td><a  href="edit.php?id=<?php echo $users['id'] ?>" class="btn btn-primary" >Edit</a></td>
                            <?php } ?>
                            <?php if($_SESSION['role'] == 1 ){ ?>
                            <td><a id="soft_delete.php?id=<?php echo $users['id'] ?>"  class="btn btn-danger delete_btn" >Delete</a></td>
                            <?php } ?>
                            </tr>
                            
                                </div>
                                </div>
                            <?php } ?>
                            
                        </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
          
        </div><!-- sl-page-title -->

      </div><!-- sl-pagebody -->
    </div>
<?php } ?>
    
    


       


   <?php require '../dashboard_includes/footer.php'; ?>

   
      

            <script>
                $('.delete_btn').click(function(){
                    Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                window.location.href=$(this).attr('id');
                }
                })
                });
                
            </script>
     <?php if(isset($_SESSION['trash_user'])){?>
        <script>
            Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
        </script>

   <?php } unset($_SESSION['trash_user']); ?>
    

