<?php

use \app\controllers\recipesController;

include_once '../app/controllers/recipesController.php';


switch ($_GET['recipes']):

    case 'index':
        recipesController\indexAction($connexion);
        break;
endswitch;