<?php
    session_start();

    session_destroy();


    $_SESSION['logout_success'] = 'logout successfully';
    header('location:../kufa/login.php');
?>