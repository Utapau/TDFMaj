<?php
        echo get_header('Login');

        $login = new Fieldset('Login');

        $login->addField(new Input('text', 'Username', 'id','Username'));

        $login->addField(new Input('password', 'Password', 'password', 'Password'));

        $login->addField(new Input('text', 'Instance', 'instance', 'Oracle Instance'));

        $login->addField(new Input('checkbox', 'Remember Me', 'remember'));
        
        $login->addField(new Button('submit', 'Submit', 'btn btn-primary'));

        $login->addField(new Button('reset', 'Reset', 'btn btn-danger'));

        $form = new Form('post', 'login.php');

        $form->addFieldSet($login);

        $form->display();

        echo get_footer();