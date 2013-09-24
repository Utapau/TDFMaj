<?php
    if(!isset($_GET['l']))
        header('Location:index.php');

    require_once 'header.php';

    $session = new Session('user');

    $session->open();

    $session->saveVar('page', $_GET['l']);

    $session->close();

    header('Location:index.php');