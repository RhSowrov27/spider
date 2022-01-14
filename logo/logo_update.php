<?php
session_start();
 require '../db.php';

 $id = $_POST['id'];
 $title = $_POST['title'];
 $description = $_POST['description'];
 $btn= $_POST['btn'];
 
 $uploader_file_name = $_FILES['banner_img']['name'];


if( $uploader_file_name != '' ){

    $uploader_file = $_FILES['banner_img'];
    $after_explode = explode('.',$uploader_file['name']);
    $extention = end($after_explode);
    $allowed_extention = array ('jpg','jpeg','png');

    if(in_array($extention, $allowed_extention)){
        if($uploader_file['size']<300000){
         
    $select_img = "SELECT * FROM banners WHERE id=$id";
    $select_img_result = mysqli_query ($db_connect, $select_img);
    $after_assoc = mysqli_fetch_assoc ($select_img_result);
   
    $delete_form = '../uploads/banners/'.$after_assoc['banner_img	'];
   unlink($delete_form);
   
           $update_user = "UPDATE `banners` SET `id`='$id',`title`='$title',`description`='$description',`btn`='$btn' WHERE id='$id' ";
           $update_user_result = mysqli_query($db_connect, $update_user);
   
           $file_name = $id. '.'.$extention;
           $new_location = '../uploads/banners/'.$file_name;
           move_uploaded_file($uploader_file['tmp_name'],$new_location);
           
           $update_image = "UPDATE banners SET banner_img = '$file_name'   WHERE id=$id ";
           $update_image_result = mysqli_query($db_connect, $update_image);
   
           $_SESSION['update_user'] = 'Banner updated!';
           header ('location:banner_edit.php?id='.$id);
   
        }
        else{
           $_SESSION['file_size'] = 'File size too large!';
           header ('location:banner_edit.php?id='.$id);
        }
    }
    else {
       $_SESSION['extention'] = 'Invalid Extention!';
       header ('location:banner_edit.php?id='.$id);
    }
}



else{
    
$update_user = "UPDATE `banners` SET `id`='$id',`title`='$title',`description`='$description',`btn`='$btn' WHERE id='$id'";
$update_user_result = mysqli_query($db_connect, $update_user);

$_SESSION['update_user'] = 'Bannerr updated!';
header ('location:banner_edit.php?id='.$id);
}

 
 










?>