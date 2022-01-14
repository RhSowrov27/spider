<?php

require '../../kufa/sessionCheck.php';
require '../../kufa/dashboard_includes/header.php';

require '../../kufa/db.php';



$select_contacts = 'SELECT * FROM contacts';
$select_contacts_result = mysqli_query ($db_connect, $select_contacts);
?>


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
                    
                        <h3  class="text-white">Education</h3>
                        
                    </div>
                        
                    <div class="card-body">
                    
                    <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Contact Information</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Place</th>
                            
                           
                            <th scope="col">Actiion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($select_contacts_result as $key=> $contact){ ?>
                            <tr>
                            <th scope="row"><?php echo $key+1 ?></th>
                            <td><?php echo $contact['contact_information'] ?></td>
                            <td><?php echo $contact['address'] ?></td>
                            <td><?php echo $contact['phone'] ?></td>
                            <td><?php echo $contact['place'] ?></td>
                            <td><?php echo $contact['email'] ?></td>
                            
                            
                            <td><a  href="banner_view.php?id=<?php echo $banners['id'] ?>" class="btn btn-info" >View</a></td>
                           
                            <td><a  href="banner_edit.php?id=<?php echo $banners['id'] ?>" class="btn btn-primary" >Edit</a></td>
                            
                           
                            <td><a id="soft_delete.php?id=<?php echo $users['id'] ?>"  class="btn btn-danger delete_btn" >Delete</a></td>
                           
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
    

