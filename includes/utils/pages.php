<?php

    function locate()
    {
        $session = _G('session');

        $pages = get_pages();

        $location = 'index';

        if(!$session->isEmpty('page'))
            $location = $session->getVar('page');

        if(isset($pages[$location]))
            require($pages[$location]);
        else
            echo error_404();
    }