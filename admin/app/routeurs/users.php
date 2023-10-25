<?php
use \App\Controllers\UsersController;

include_once '../app/controllers/UsersController.php';

switch ($_GET['users']):

    case 'logout':
        \App\Controllers\UsersController\logoutAction();
        break;


    default:
        \App\Controllers\UsersController\indexAction($connexion);
        break;
endswitch;
