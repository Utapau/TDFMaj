<?php
    function tidy($dirtyHtml)
    {
        return htmLawed($dirtyHtml, array('tidy' => '4s4n'));
    }

    function safe($dirtyInput)
    {
        return htmLawed($dirtyInput, array('safe' => 1));
    }

    function debug($line)
    {
        echo tidy('<p>' . $line . '</p>');
    }
?>