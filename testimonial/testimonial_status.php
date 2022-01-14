<?php 
session_start();
    require '../../CLASS 1/db.php';
    $id = $_GET['id'];

$select_banner ="SELECT * FROM banners WHERE id=$id";
$select_banner_result = mysqli_query($db_connect, $select_banner);
$after_assoc = mysqli_fetch_assoc($select_banner_result);

if($after_assoc['status'] == 1){
    $update_status = "UPDATE banners SET status=0 WHERE id=$id";
    $update_status_result=mysqli_query($db_connect, $update_status);
    header ('location:banners.php?');

}
else{
    $update_status1 = "UPDATE banners SET status=0 ";
    $update_status_result1 = mysqli_query($db_connect, $update_status1);

    $update_status = "UPDATE banners SET status=1 WHERE id=$id";
    $update_status_result=mysqli_query($db_connect, $update_status);
    header ('location:banners.php?');
}


    


?>