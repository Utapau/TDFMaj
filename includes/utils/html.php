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

        $str .= '<script src="scripts/form.js"></script>';

        $str .= '<script src="scripts/error.js"></script>';
        
        $str .= '<script src="scripts/console.js"></script>';
        
        $str .= '<script src="scripts/bootstrap.js"></script>';

        return $str;
    }

    function get_footer()
    {
        $str = '</body>';

        $str .= '</html>';

        return $str;
    }

    function get_navbar()
    {
        $session = _G('session');

        $pages = get_pages();

        $str = '<ul class="nav nav-tabs">';

        foreach($pages as $page => $path)
        {
            if($session->getVar('location') == $page)
                $str .= '<li class="active">';
            else
                $str .= '<li>';

            $str .= '<a href="pages.php?l=' . $page . '">' . $page . '</a>';

            $str .= '</li>';
        }

        $str .= '</nav>';

        return tidy($str);
    }