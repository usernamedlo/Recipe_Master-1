<?php

namespace App\Controllers\UsersController;

use App\Models\UsersModel;
use App\Models\RecipesModel;


function allAction(\PDO $connexion)
{
    include_once '../app/models/usersModel.php';
    $allUsers = UsersModel\findAllUsers($connexion); // Une fonction qui récupère TOUS les utilisateurs, sans LIMIT.

    global $title, $content;
    $title = "Tous les chefs";
    ob_start();
    include '../app/views/users/index.php'; // Utilisez le même fichier de vue ou créez-en un différent si nécessaire.
    $content = ob_get_clean();
}
function indexAction(\PDO $connexion, $id = null)
{
    include_once '../app/models/usersModel.php';
    $allUsers = usersModel\findAllUsers($connexion);

    $recipesByUser = [];
    if ($id !== null) {
        include_once '../app/models/recipesModel.php';
        $recipesByUser = RecipesModel\findAllByUserId($connexion, $id);
    }

    global $title, $content;
    $title = "Users";
    ob_start();
    include '../app/views/users/index.php';
    $content = ob_get_clean();
}


function showAction(\PDO $connexion, int $id)
{
    include_once '../app/models/usersModel.php';
    $user = UsersModel\findOneById($connexion, $id);

    // Chargement des recettes pour l'utilisateur
    include_once '../app/models/recipesModel.php';
    $recipesByUser = RecipesModel\findAllByUserId($connexion, $id);

    global $title, $content;
    $title = $user['user_name']; //vient de la bdd
    // avec le tampon, on inclut la vue dans le $content
    ob_start();
    include '../app/views/users/show.php';
    $content = ob_get_clean();
}

function loginFormAction(\PDO $connexion)
{
    // je charge la vue loginForm dans $content
    include_once '../app/models/usersModel.php';
    global $title, $content;
    $title = TITRE_USERS_LOGINFORM;
    ob_start();
    include '../app/views/users/loginForm.php';
    $content = ob_get_clean();
}