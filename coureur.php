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
        $conn = new Connection($session->getVar("id"), $session->getVar("password"), $session->getVar("instance"));

        $conn->connect();

        if(!$conn->connected())
            exit;

        $conn->execute('SELECT * from tdf_coureur order by n_coureur');

        echo  get_header('Coureur');

        echo get_navbar('coureur');

        echo get_tabs(array('add', 'modify', 'delete'));     

        echo '<div id="container">';

        include 'includes/pages/coureur/add.php';

        include 'includes/pages/coureur/modify.php';

        echo '</div>';

        echo get_footer();

        $conn->close();
    }

    $session->close();