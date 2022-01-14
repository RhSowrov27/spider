<?php
session_start();
require'../db.php';



$title = $_POST['title'];
$category = $_POST['category'];


$uploaded_file = $_FILES['image'];
$after_explode = explode('.', $uploaded_file['name']);
$extention = end($after_explode);
$allowed_extention = array('jpg','png', 'jpeg','gif','PNG','JPEG' );

if(in_array($extention, $allowed_extention)){
    if($uploaded_file['size']<= 10000000){
        $insert_works = "INSERT INTO `works`( `title`, `category`) VALUES ('$title','$category') ";
        $insert_works_result = mysqli_query($db_connect,$insert_works);

        $id = mysqli_insert_id($db_connect);
         $file_name = $id.'.'.$extention;
         $new_location = '../uploads/works/'.$file_name;
         move_uploaded_file($uploaded_file['tmp_name'], $new_location);

         $update_image = "UPDATE `works` SET `image`='$file_name' WHERE id='$id'";
         $update_image_result = mysqli_query($db_connect, $update_image);
        
         $_SESSION ['success'] = 'Banner addedd Success';
            header('location:add_work.php');
    }
    else{
        $_SESSION ['file_size'] = 'Maximum File size is 1mb';
            header('location:add_work.php');
    }
}
else{

    $_SESSION ['invalid_extention'] = 'Invalid extention';
            header('location:add_work.php');
}
?>