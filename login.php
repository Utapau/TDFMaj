<?php
    require_once('header.php');

    $session = new Session('user');

    $session->open();

    if(!empty($_POST))
    {
        $id = $session->saveVar('id', safe($_POST['id']));

        $pass = $session->saveVar('password', safe($_POST['password']));

        $insta = $session->saveVar('instance', safe($_POST['instance']));

        $connect = new Connection($id, $pass, $insta);

        $connect->connect();

        if($connect->connected())
            $session->saveVar('logged', 1);
        else
        {
            $session->saveVar('logged', 0);
            $session->saveVar('error', 'Wrong username/password');
        }
    }

    $session->display();

    $session->close();

    $session->close();

    header("Location:index.php");
?>