<?php
    global $session;

    require_once 'header.php';    

    $session = new Session('user');

    $session->open();

    $session->regenerate();

    if(!$session->getVar('logged'))
    {
        header('Location:index.php');
    }
    else
    {
        $page =  get_header('Index');

        $page .= get_navbar('index');

        $page .= '<div id="container">';

        $page .= 'Hello !';

        $page .= '</div>';

        $page .= get_footer();

        echo $page;
    }

    $session->close();