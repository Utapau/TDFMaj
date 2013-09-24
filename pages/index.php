<?php
    $session = $GLOBALS['session'];

    if(!$session->isEmpty())
    {
        echo get_header('Index');

        echo get_navbar();

        $page = '<a href="logout.php">Logout</a>' . '<br>';

        echo $page;

        echo get_footer();
    }
    else
    {
        
    }