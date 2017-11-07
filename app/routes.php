<?php

$router->get('posts/', function (){ 
    echo 'Voici la liste des posts';
});
$router->get('post/:id', function ($id) {
    echo 'Voici le post N '.$id;
});

$router->get('post/:id', function ($id) {
    echo 'Voici la validation pour le post N '.$id;
});

