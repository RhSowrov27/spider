<?php

require '../../kufa/sessionCheck.php';
require '../../kufa/dashboard_includes/header.php';

require '../../kufa/db.php';



$select_testimonial = 'SELECT * FROM testimonial';
$select_testimonial_result = mysqli_query ($db_connect, $select_testimonial);
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
                    
                        <h3  class="text-white">Testimonial</h3>
                        
                    </div>
                        
                    <div class="card-body">
                    
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Company</th>
                            <th scope="col">Quotes</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Status</th>
                            
                            <th scope="col">Actiion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($select_testimonial_result as $key=> $testimonial){ ?>
                            <tr>
                            <th scope="row"><?php echo $key+1 ?></th>
                            <td><?php echo $testimonial['name'] ?></td>
                            <td><?php echo $testimonial['company'] ?></td>
                            <td><?php echo $testimonial['quotes'] ?></td>
                            <td><img width="300" src="../uploads/testimonials/<?php echo $testimonial['image'] ?>" alt=""> </td>
                            <td>
                                <?php if($testimonial['status']==1){ ?>
                            <a href="testimonial_status.php?id=<?php echo $testimonial['id'] ?>" class="btn btn-success">Active</a>    
                            <?php }  
                            
                             else{ ?>
                            <a href="testimonial_status.php?id=<?php echo $testimonial['id'] ?>" class="btn btn-warning">Dective</a>    
                            <?php }  ?></td>
                            
                            
                            <td><a  href="testimonial_view.php?id=<?php echo $testimonial['id'] ?>" class="btn btn-info" >View</a></td>
                            <?php if($_SESSION['role'] != 3 ){ ?>
                            <td><a  href="testimonial_edit.php?id=<?php echo $testimonial['id'] ?>" class="btn btn-primary" >Edit</a></td>
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
    

