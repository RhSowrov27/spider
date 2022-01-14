<?php
session_start();
require'../db.php';


$name = $_POST['name'];
$company = $_POST['company'];
$quotes = $_POST['quotes'];


$uploaded_file = $_FILES['image'];
$after_explode = explode('.', $uploaded_file['name']);
$extention = end($after_explode);
$allowed_extention = array('jpg','png', 'jpeg','gif','PNG','JPEG' );

if(in_array($extention, $allowed_extention)){
    if($uploaded_file['size']<= 10000000){
        $insert_testimonial = "INSERT INTO `testimonial`(`name`, `company`, `quotes`) VALUES ('$name','$company','$quotes') ";
        $insert_testimonial_result = mysqli_query($db_connect,$insert_testimonial);

        $id = mysqli_insert_id($db_connect);
         $file_name = $id.'.'.$extention;
         $new_location = '../uploads/testimonials/'.$file_name;
         move_uploaded_file($uploaded_file['tmp_name'], $new_location);

         $update_image = "UPDATE `testimonial` SET `image`='$file_name' WHERE id='$id'";
         $update_image_result = mysqli_query($db_connect, $update_image);
        
         $_SESSION ['success'] = 'Testimonial addedd Success';
            header('location:add_testimonial.php');
    }
    else{
        $_SESSION ['file_size'] = 'Maximum File size is 1mb';
            header('location:add_testimonial.php');
    }
}
else{

    $_SESSION ['invalid_extention'] = 'Invalid extention';
            header('location:add_testimonial.php');
}
?>