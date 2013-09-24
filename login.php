<?php
    require_once('header.php');

    $session = new Session('user');

    $session->open();

    if(!empty($_POST))
    {
        $id = $session->saveVar('id', safe($_POST['id']));

        $pass = $session->saveVar('password', sha1(safe($_POST['password'])));

        $insta = $session->saveVar('instance', safe($_POST['instance']));

        $connect = new Connection($id, $pass, $insta);

        $connect->connect();

        if($connect->connected())
            $session->saveVar('logged', true);
        else
            $session->saveVar('logged', false);
    }

    if($session->getVar('logged'))
        $session->close();
    else
        $session->close();

    header("Location:index.php");
?>