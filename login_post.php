<?php 
session_start();
require 'db.php';
$email = $_POST['email'];
$password = $_POST['password'];


$select_email = "SELECT COUNT(*)as email_exist, fName, role,  profile_image FROM users WHERE email='$email'";
$select_email_result = mysqli_query($db_connect, $select_email);
$after_assoc = mysqli_fetch_assoc($select_email_result);

if ($after_assoc['email_exist']==1){
    $select_email2 = "SELECT * FROM users WHERE email='$email'";
    $select_email_result2 = mysqli_query($db_connect, $select_email2);
    $after_assoc2 = mysqli_fetch_assoc($select_email_result2);    
    
    if(password_verify($password, $after_assoc2['password'])){
        $_SESSION['login_success'] = 'Login Successfuly';
        $_SESSION['login'] = 'Login Successfuly';
        $_SESSION['fName'] = $after_assoc2['fName'];
        $_SESSION['login_id'] = $after_assoc2['id'];
        $_SESSION['role'] = $after_assoc2['role'];
        $_SESSION['profile_image'] = $after_assoc2['profile_image'];
        header('location:admin.php');
        

    }
    else{
        $_SESSION['wrong_pass'] = 'Wrong Password!';
    header('location:login.php');
    }

}
else {
    $_SESSION['email_exist'] = 'Invalid Email';
    header('location:login.php');
}


?>