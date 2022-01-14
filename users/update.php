<?php
session_start();
 require '../db.php';

 $id = $_POST['id'];
 $fName = $_POST['fName'];
 $lName= $_POST['lName'];
 $email = $_POST['email'];
 $date = $_POST['date'];
 $password = $_POST['password'];
 $after_hash = password_hash ($password,PASSWORD_DEFAULT);
 $uploader_file_name = $_FILES['profile_photo']['name'];


if( $uploader_file_name != '' ){

    $uploader_file = $_FILES['profile_photo'];
    $after_explode = explode('.',$uploader_file['name']);
    $extention = end($after_explode);
    $allowed_extention = array ('jpg','jpeg','png');

    if(in_array($extention, $allowed_extention)){
        if($uploader_file['size']<300000){
         
    $select_img = "SELECT * FROM users WHERE id=$id";
    $select_img_result = mysqli_query ($db_connect, $select_img);
    $after_assoc = mysqli_fetch_assoc ($select_img_result);
   
    $delete_form = '../uploads/users/'.$after_assoc['profile_photo'];
   unlink($delete_form);
   
           $update_user = "UPDATE users SET fName='$fName', lName='$lName', email='$email', date_of_birth='$date', password= '$after_hash'  WHERE id=$id ";
           $update_user_result = mysqli_query($db_connect, $update_user);
   
           $file_name = $id. '.'.$extention;
           $new_location = '../uploads/users/'.$file_name;
           move_uploaded_file($uploader_file['tmp_name'],$new_location);
           
           $update_image = "UPDATE users SET profile_photo = '$file_name'   WHERE id=$id ";
           $update_image_result = mysqli_query($db_connect, $update_image);
   
           $_SESSION['update_user'] = 'User updated!';
           header ('location:edit.php?id='.$id);
   
        }
        else{
           $_SESSION['file_size'] = 'File size too large!';
           header ('location:edit.php?id='.$id);
        }
    }
    else {
       $_SESSION['extention'] = 'Invalid Extention!';
       header ('location:edit.php?id='.$id);
    }
}



else{
    
$update_user = "UPDATE users SET fName='$fName', lName='$lName', email='$email', date_of_birth='$date', password= '$after_hash'  WHERE id=$id ";
$update_user_result = mysqli_query($db_connect, $update_user);

$_SESSION['update_user'] = 'User updated!';
header ('location:edit.php?id='.$id);
}

 
 










?>