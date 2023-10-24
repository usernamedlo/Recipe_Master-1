<?php

$user_id = isset($_GET['id']) ? $_GET['id'] : null;

switch ($_GET['users']):

    case 'show':
        include_once '../app/controllers/usersController.php';
        \App\Controllers\UsersController\showAction($connexion, $user_id);
        break;

    default:
        include_once '../app/controllers/usersController.php';
        \App\Controllers\UsersController\indexAction($connexion);
        break;
endswitch;
