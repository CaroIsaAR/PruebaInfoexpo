<?php 
    session_start();

    if(!isset($_SESSION['sesion'])){
        header("location: ../index.php");
        die();
    }

    if($_SESSION['sesion'] != "ADMIN" && $_SESSION['sesion']!="NORMAL"){
        header("location: ../index.php");
        die();
    }
?>