<?php
    global $session;

    require_once 'header.php';    

    $session = new Session('user');

    $session->open();

    $session->regenerate();

    if(!$session->getVar('logged'))
    {
        include('pages/login.php');
    }
    else
    {
        include('pages/index.php');
    }
    
    $session->close();

?>