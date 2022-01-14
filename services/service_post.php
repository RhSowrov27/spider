<?php
session_start();
require'../db.php';



$title = $_POST['title'];
$details = $_POST['details'];


$uploaded_file = $_FILES['image'];
$after_explode = explode('.', $uploaded_file['name']);
$extention = end($after_explode);
$allowed_extention = array('jpg','png', 'jpeg','gif','PNG','JPEG' );

if(in_array($extention, $allowed_extention)){
    if($uploaded_file['size']<= 10000000){
        $insert_services = "INSERT INTO `services`( `title`, `details`) VALUES ('$title','$details') ";
        $insert_services_result = mysqli_query($db_connect,$insert_services);

        $id = mysqli_insert_id($db_connect);
         $file_name = $id.'.'.$extention;
         $new_location = '../uploads/services/'.$file_name;
         move_uploaded_file($uploaded_file['tmp_name'], $new_location);

         $update_image = "UPDATE `services` SET `image`='$file_name' WHERE id='$id'";
         $update_image_result = mysqli_query($db_connect, $update_image);
        
         $_SESSION ['success'] = 'Banner addedd Success';
            header('location:add_service.php');
    }
    else{
        $_SESSION ['file_size'] = 'Maximum File size is 1mb';
            header('location:add_service.php');
    }
}
else{

    $_SESSION ['invalid_extention'] = 'Invalid extention';
            header('location:add_service.php');
}
?>