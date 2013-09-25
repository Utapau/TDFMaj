<?php

    function error_404()
    {
        $session = _G("session");

        $session->display();

        echo $session->getVar('page');

        return 'It seems your page was not found ._.';
    }

    function get_header($location)
    {
        $str = '<!DOCTYPE html>';

        $str .= '<head>';

        $str .= '<title>TDF - '. $location . '</title>';

        $str .= '<meta content="text/html; charset=utf-8" http-equiv="Content-Type">';

        $str .= '<link rel="stylesheet" type="text/css" href="design/bootstrap.css" />';

        $str .= '<link rel="stylesheet" type="text/css" href="design/default.css" />';

        $str .= '</head>';

        $str .= '<body>';

        $str .= '<script src="scripts/jquery.js"></script>';

        $str .= '<script src="scripts/tabs.js"></script>';
        
        $str .= '<script src="scripts/bootstrap.js"></script>';

        return $str;
    }

    function get_footer()
    {
        $str = '</body>';

        $str .= '</html>';

        return $str;
    }

    function get_navbar($active)
    {
        $session = _G('session');

        if($session->isEmpty())
            exit;

        $pages = array();

        $pages['index'] = 'index.php';
        $pages['coureur'] = 'coureur.php';

        $str = '<div id="navbar">';

        $str .= '<div id="userbar">';

        $str .= 'User : <span id="username">' . $session->getVar("id") . ' </span>';

        $str .= 'Instance : <span id="instance">' . $session->getVar("instance") . ' </span>';

        $str .= '<a style="float:right" class="btn btn-danger" href="logout.php">Logout</a>' . '<br>';

        $str .= '</div>';

        $str .= '<ul id="tabs" class="inline">';

        foreach($pages as $name => $page)
        {
            $class = 'btn';

            if($active == $name)
                $class .= ' btn-primary';

            $str .= '<li><a class="' . $class . '" href="' . $page . '">' . $name . '</a></li>';
        }

        $str .= '</ul>';

        $str .= '</div>';

        return $str;
    }