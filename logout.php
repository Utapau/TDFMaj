<?php
    require_once 'header.php';
    
    $session = new Session('user');

    $session->open();

    $session->destroy();

    header("Location:index.php");
?>