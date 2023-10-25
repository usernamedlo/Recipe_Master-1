<?php

namespace App\Controllers\RecipesController;

use App\Models\RecipesModel;
use App\Models\CommentsModel;



function indexAction(\PDO $connexion)
{
    // Je demande la liste des recettes au modèle
    include_once '../app/models/recipesModel.php';
    $allRecipes = recipesModel\findAllRecipes($connexion);

    // Je charge la vue index dans $content
    global $title, $content;
    $title = "TITRE_RECIPES_INDEX";
    ob_start();
    include '../app/views/recipes/index.php';
    $content = ob_get_clean();

}

function showAction(\PDO $connexion, int $id)
{
    include_once '../app/models/recipesModel.php';
    $recipe = RecipesModel\findOneById($connexion, $id);

    include_once '../app/models/commentsModel.php';
    $comments = CommentsModel\findAllCommentsByDishId($connexion, $id);

    global $title, $content;
    $title = $recipe['dish_name']; //vient de la bdd
    // avec le tampon, on inclut la vue dans le $content
    ob_start();

    include '../app/views/recipes/show.php';
    $content = ob_get_clean();
}