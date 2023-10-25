<?php

use \app\controllers\ingredientsController;

include_once '../app/controllers/ingredientsController.php';

switch ($_GET['ingredients']):

    case 'index':
        ingredientsController\indexAction($connexion);
        break;
endswitch;