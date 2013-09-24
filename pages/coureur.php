<?php
    $session = _G('session');

    echo get_header('Index');

    echo get_navbar();

    $session->display();

    echo get_footer();