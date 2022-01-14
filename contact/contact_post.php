<?php
    session_start();
    require'../db.php';
    $contact_information = $_POST['contact_information'];
    $address =$_POST['address'];
    $phone =$_POST['phone'];
    $place =$_POST['place'];
    $email =$_POST['email'];




   $insert_education=" INSERT INTO `contacts`( `contact_information`, `address`, `phone`,`place`,`email`) VALUES ('$contact_information','$address','$phone','$place','$email')";
   $insert_education_result= mysqli_query($db_connect, $insert_education);
   $_SESSION ['education'] = 'Contact Added';
   header('location:add_contact.php');
?>