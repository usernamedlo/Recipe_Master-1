<?php

use \app\controllers\recipesController;

include_once '../app/controllers/recipesController.php';


switch ($_GET['recipes']):

    case 'index':
        recipesController\indexAction($connexion);
        break;

        case 'addForm':
            recipesController\addFormAction($connexion);
            break;
        
            case 'add':
            recipesController\addAction($connexion, $_POST);
            break;
endswitch;

