<?php
    global $session;

    require_once 'header.php';    

    $session = new Session('user');

    $session->open();

    $session->regenerate();
    
    if(!$session->getVar('logged'))
    {
        include('pages/login.php');
    }
    else
    {
        $conn = new Connection($session->getVar("id"), $session->getVar("password"), $session->getVar("instance"));

        $conn->connect();

        if(!$conn->connected())
            exit;

        $conn->execute('SELECT * from tdf_coureur order by n_coureur');

        $page =  get_header('Coureur');

        $page .= get_navbar('coureur');

        $page .= '<div id="container">';

        $page .= '<table class="table table-striped">';

        while(($row = $conn->fetch(OCI_BOTH)))
        {
            $page .= '<tr>';

            $page .= '<td>' . $row['N_COUREUR'] . '</td>';

            $page .= '<td>' . $row['NOM'] . '</td>';

            $page .= '<td>' . $row['PRENOM'] . '</td>';
            
            $page .= '</tr>';
        }

        $page .= '</table>';

        $page .= '</div>';

        $page .= get_footer();

        echo $page;
    }

    $session->close();