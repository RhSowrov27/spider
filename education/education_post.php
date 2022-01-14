<?php
    session_start();
    require'../db.php';
    $title = $_POST['title'];
    $year =$_POST['year'];
    $percentage =$_POST['percentage'];




   $insert_education=" INSERT INTO `education`( `year`, `title`, `percentage`) VALUES ('$year','$title','$percentage')";
   $insert_education_result= mysqli_query($db_connect, $insert_education);
   $_SESSION ['education'] = 'Education Added';
   header('location:add_education.php');
?>