<?php
        echo get_header('Login');

        $session = _G('session');

        $login = new Fieldset('Login');

        $login->addField(new Input('text', 'Username', 'id', 'Username'));

        $login->addField(new Input('password', 'Password', 'password', 'Password'));

        $login->addField(new Input('text', 'Instance', 'instance', 'Oracle Instance'));

        $login->addField(new Input('checkbox', 'Remember Me', 'remember'));
        
        $login->addField(new Button('submit', 'Submit', 'btn btn-primary'));

        $login->addField(new Button('reset', 'Reset', 'btn btn-danger'));

        $form = new Form('post', 'login.php');

        $form->addFieldSet($login);

        echo '<div id="login-form">';

        $form->display();

        if($session->exists('error'))
                echo '<div class="alert alert-error">Error : ' . $session->getVar('error') . '</div>';

        echo '</div>';

        echo get_footer();