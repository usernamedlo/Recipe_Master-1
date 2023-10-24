<?php
// ROUTER PRINCIPAL

// USERS: ROUTER DES USERS
// PATTERN: ?users=xxx
if (isset($_GET['users'])):
    include_once '../app/routeurs/users.php';

    // RECIPES: ROUTER DES RECIPES
// PATTERN: ?recipes=xxx
elseif (isset($_GET['recipes'])):
    include_once '../app/routeurs/recipes.php';


    // PATTERN: /
// CTRL: pagesController
// ACTION: home
// VIEW: pages/home.php
else:
    include_once '../app/controllers/pagesController.php';
    \App\Controllers\PagesController\homeAction($connexion);
endif;


/* <?php

// // ROUTEUR PRINCIPAL

// // RECETTES: ROUTER DES RECETTES
// // PATTERN: ?recipes=xx
// // CTRL: recipesController
// // ACTION: show
// // VIEW: recipes/show.php
// if (isset($_GET['id'])):
//     include_once '../app/controllers/recipesController.php';
//     \App\Controllers\RecipesController\showAction($connexion, $_GET['id']);

//     // ROUTE PAR DEFAUT 
// // PATTERN: /
// // CTRL: pagesController
// // ACTION: index
// // VIEW: pages/index.php
// else:
//     include_once '../app/controllers/pagesController.php';
//     \App\Controllers\PagesController\indexAction($connexion);
// endif;

// PROPOSITION DE CHATGPT:

if (isset($_GET['recipes'])):
    include_once 'routeur/recipes.php'; // Inclusion du routeur des recettes
else:
    if (isset($_GET['id'])):
        include_once '../app/controllers/recipesController.php';
        \App\Controllers\RecipesController\showAction($connexion, $_GET['id']);
    else:
        include_once '../app/controllers/pagesController.php';
        \App\Controllers\PagesController\indexAction($connexion);
    endif;
endif; */

