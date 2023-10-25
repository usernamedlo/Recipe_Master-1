<?php

use \app\controllers\categoriesController;

include_once '../app/controllers/categoriesController.php';

switch ($_GET['categories']):

    case 'index':
        CategoriesController\indexAction($connexion);
        break;
endswitch;