<?php
function ape_create_membre_role()
{
    add_role('membreape', 'Membre APE', get_role('editor')->capabilities);
}

function ape_remove_membre_role()
{
    remove_role('membreape');
}