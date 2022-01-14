<?php

require '../sessionCheck.php';
require '../db.php';

$errors=[];
$filed_names =['fName'=>'First name requred','lName'=>'Last name requred','email'=>'Email requred','date'=>'Date of Birth requred','password'=>'Type your password','cpassword'=>'Password is not matched'];

foreach($filed_names as $filed_name=>$massage){
    if(empty($_POST[$filed_name])){
        $errors[$filed_name] = $massage; 
    }
    elseif(empty ($_POST[$filed_name])){
        $errors = $massage; 
    }
    elseif(empty ($_POST[$filed_name])){
        $errors[$filed_name] = $massage; 
    }
    elseif(empty ($_POST[$filed_name])){
        $errors[$filed_name] = $massage; 
    }
    elseif(empty ($_POST[$filed_name])){
        $errors[$filed_name] = $massage; 
    }
    elseif(empty ($_POST[$filed_name])){
        $errors[$filed_name] = $massage; 
    }
    
}

if (count($errors)==0){
    $fName = $_POST['fName'];
    $lName= $_POST['lName'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $admin_role = $_POST['admin_role'];
    $password = $_POST['password'];
    $after_hash = password_hash ($password,PASSWORD_DEFAULT);
    // $cpassword = $_POST['cpassword'];
    date_default_timezone_set('Asia/Dhaka');
    $created_at = date ('d-m-y h:i:s');

    $select_users ="Select COUNT(*) as email_exist FROM users WHERE email='$email'";
    $select_users_result = mysqli_query ($db_connect, $select_users);
    $after_assoc = mysqli_fetch_assoc ($select_users_result );

    if( $after_assoc['email_exist'] == 0){
        $uploaded_file = $_FILES['profile_image'];
        $after_explode = explode ('.', $uploaded_file['name']);
        $extention = end ($after_explode);
        $allowed = array ('jpg','jpeg','png','gif','PNG');
        if(in_array($extention , $allowed)){
            if($uploaded_file['size'] < 2000000){
                
                $insert = "INSERT INTO `users`(`fName`, `lName`, `email`, `date`, `password`, `role`) VALUES ('$fName','$lName','$email','$created_at','$after_hash','$admin_role')";
                $insert_result=mysqli_query($db_connect, $insert);

                $user_id = mysqli_insert_id ($db_connect);
                $file_name = $user_id . '.'.$extention;
                $new_location = '../uploads/users/'. $file_name;
                move_uploaded_file($uploaded_file ['tmp_name'], $new_location);

                $update_user = "UPDATE users SET profile_photo='$file_name' WHERE id= $user_id";
                $update_user_result = mysqli_query ($db_connect, $update_user);
                $_SESSION ['success'] = 'Congratulation! your registration successful!!';
                header('location:register.php');
            }
            else{
                $_SESSION ['file_size'] = 'File size is too big';
            header('location:register.php');
                
            }
        }
        else {

            $_SESSION ['inv_ext'] = 'Invalid extention';
            header('location:register.php');
            
        }
    }
    else {

        $_SESSION ['email_exits'] = 'Your email already exits';
        header('location:register.php');
    }  
}
else{
    $_SESSION['errors']=$errors;
    $_SESSION['fName']=$_POST['fName'];
    $_SESSION['lName']=$_POST['lName'];
    $_SESSION['email']=$_POST['email'];
    $_SESSION['date']=$_POST['date'];
    $_SESSION['password']=$_POST['password'];
    // $_SESSION['cpassword']=$_POST['cpassword'];
  
    header('location:register.php');
}


?>