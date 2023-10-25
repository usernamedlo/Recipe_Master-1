<?php

use \app\controllers\recipesController;

include_once '../app/controllers/recipesController.php';


switch ($_GET['recipes']):

    case 'index':
        include_once '../app/controllers/recipesController.php';
        recipesController\indexAction($connexion);
        break;
endswitch;