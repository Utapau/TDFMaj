<?php
    
    // Lua nostalgy
    function _G($index)
    {
        return $GLOBALS[$index];
    }

    function get_pages()
    {
        $files = scandir('pages');

        $pages = array();

        foreach($files as $file)
        {
            if(!is_dir($file))
                $pages[basename($file, '.php')] = 'pages/' . $file;
        }

        print_r($pages);
        
        return $pages;
    }