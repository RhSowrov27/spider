<?php

require '../../kufa/sessionCheck.php';
require '../../kufa/dashboard_includes/header.php';

require '../../kufa/db.php';



$select_services = 'SELECT * FROM services';
$select_services_result = mysqli_query ($db_connect, $select_services);
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
                    
                        <h3  class="text-white">Banners</h3>
                        
                    </div>
                        
                    <div class="card-body">
                    
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Status</th>
                            
                            <th scope="col">Actiion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($select_services_result as $key=> $services){ ?>
                            <tr>
                            <th scope="row"><?php echo $key+1 ?></th>
                            <td><?php echo $services['title'] ?></td>
                            <td><?php echo $services['details'] ?></td>
                            <td><img width="300" src="../uploads/services/<?php echo $services['image'] ?>" alt=""> </td>
                            <td>
                                <?php if($services['status']==1){ ?>
                            <a href="service_status.php?id=<?php echo $services['id'] ?>" class="btn btn-success">Active</a>    
                            <?php }  
                            
                             else{ ?>
                            <a href="service_status.php?id=<?php echo $services['id'] ?>" class="btn btn-warning">Dective</a>    
                            <?php }  ?></td>
                            
                            
                            <td><a  href="service_view.php?id=<?php echo $services['id'] ?>" class="btn btn-info" >View</a></td>
                            <?php if($_SESSION['role'] != 3 ){ ?>
                            <td><a  href="service_edit.php?id=<?php echo $services['id'] ?>" class="btn btn-primary" >Edit</a></td>
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
    

