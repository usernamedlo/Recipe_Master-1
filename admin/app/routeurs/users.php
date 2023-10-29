<?php
use \App\Controllers\UsersController;

include_once '../app/controllers/UsersController.php';

switch ($_GET['users']):

    case 'logout':
        UsersController\logoutAction();
        break;

    case 'addForm':
        UsersController\addFormAction($connexion);
        break;

    case 'add':
        UsersController\addAction($connexion, $_POST);
        break;

    default:
        UsersController\indexAction($connexion);
        break;
endswitch;
