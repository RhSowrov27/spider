<?php
session_start();
if(!isset($_SESSION['login'])){
    header('location:../../CLASS 1/login.php');
}
?>