<?php
    $add = new FieldSet('Add');

    $add->addField(new Input('text', 'Nom Coureur', 'nom_coureur', 'Nom Coureur'));

    $add->addField(new Button('submit', 'Submit', 'btn btn-primary'));

    $form = new Form('post', 'post/add_coureur.php');

    $form->addFieldset($add);

    echo '<div class="content" id="add">';

    echo $form->toHtml();

    echo '</div>';