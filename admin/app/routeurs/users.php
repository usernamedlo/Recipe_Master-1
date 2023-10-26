<?php
use \App\Controllers\UsersController;

include_once '../app/controllers/UsersController.php';

switch ($_GET['users']):

    case 'logout':
        UsersController\logoutAction();
        break;

    case 'addForm':
        UsersController\addFormAction();
        break;

    default:
        UsersController\indexAction($connexion);
        break;
endswitch;
