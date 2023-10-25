<?php
// ROUTER PRINCIPAL

// ROUTE DES USERS
if (isset($_GET["users"])):
    include_once '../app/routeurs/users.php';

    // ROUTE DES RECETTES
elseif (isset($_GET["recipes"])):
    include_once '../app/routeurs/recipes.php';

    // ROUTE DES CATEGORIES
elseif (isset($_GET["categories"])):
    include_once '../app/routeurs/categories.php';

    // ROUTE DES INGREDIENTS
elseif (isset($_GET["ingredients"])):
    include_once '../app/routeurs/ingredients.php';

    //ROUTE PAR DEFAUT
else:
    include_once "../app/controllers/usersController.php";
    \App\Controllers\UsersController\dashboardAction($connexion);
endif;

