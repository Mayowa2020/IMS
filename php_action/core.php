<?php
    session_start();

    require_once 'db_connect.php';

    // echo $_SESSION['id'];

    if(!$_SESSION['id']) {
        header('location: http://localhost/inventory%20management%20system/index.php');
    }
?>