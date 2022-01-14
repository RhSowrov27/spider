<?php 
require '../sessionCheck.php';
require '../dashboard_includes/header.php';




require '../db.php';


$id = $_GET['id'];

$select_banners = "SELECT * FROM banners WHERE id=$id";
$select_banners_result = mysqli_query ($db_connect, $select_banners);
$after_assoc = mysqli_fetch_assoc($select_banners_result);
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
                        
                        <h3  class="text-white">Banner Information</h3>
                    </div>
                        
                    <div class="card-body">
                    <table class="table table-striped">
                      <tbody>
                          <tr>
                            <td class="table-success">Title</td>
                            <td class="table-info"><?= $after_assoc['title'] ?></td>
                          </tr>
                          <tr>
                            <td class="table-info">Description</td>
                            <td class="table-success"><?= $after_assoc['description'] ?></td>
                          </tr>
                          <tr>
                            <td class="table-success">Button</td>
                            <td class="table-info"><?= $after_assoc['btn'] ?></td>
                          </tr>
                          <tr>
                            <td class="table-info">Banner Immage</td>
                            <td class="table-success"><img width="100" src="../uploads/banners/<?php echo $after_assoc['banner_img'] ?>" alt=""></td>
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