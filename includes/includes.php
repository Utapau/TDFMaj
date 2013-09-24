<?php
    /**
     *  Options/Settings
     */

    // If debug is activated or not
    define('DEBUG', true);

    // Set error reporting based on DEBUG
    if(DEBUG)
        error_reporting(E_ALL);
    else
        error_reporting(0);

    /**
     *  Some utilities to include
     */

    // htmLawed
    require_once 'htmLawed/htmLawed.php';
    
    // Misc functions
    require_once 'utils/misc.php';
    
    // Some display functions
    require_once 'utils/display.php';

    // Html functions
    require_once 'utils/html.php';

    /**
     *  Some useful classes
     */

    // Session
    require_once 'classes/session.php';

    // Form
    require_once 'classes/form.php';

    // Connection
    require_once 'classes/connection.php';
?>