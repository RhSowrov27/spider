<?php
    session_start();
    require'../db.php';
    $title = $_POST['title'];
    $description =$_POST['description'];




   $insert_skill=" INSERT INTO `about_me`(`title`, `description`) VALUES ('$title','$description')";
   $insert_skill_result= mysqli_query($db_connect, $insert_skill);
   $_SESSION ['aboutme'] = 'About Me Added';
   header('location:add_aboutme.php');
?>