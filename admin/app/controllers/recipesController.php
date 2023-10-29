<?php

namespace App\Controllers\RecipesController;

use App\Models\RecipesModel;
use App\Models\UsersModel;
use App\Models\CategoriesModel;
use App\Models\IngredientsModel;


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


function addFormAction(\PDO $connexion)
{
    // je recherche les chefs
    include_once '../app/models/usersModel.php';
    $allUsers = \App\Models\UsersModel\findAllUsers($connexion);

    // je recherche les categories
    include_once '../app/models/categoriesModel.php';
    $allCategories = \App\Models\CategoriesModel\findAllCategories($connexion);
    
    // je recherche les ingrédients
    include_once '../app/models/ingredientsModel.php';
    $allIngredients = \App\Models\IngredientsModel\findAllIngredients($connexion);

    // Je charge la vue recipes/addForm dans $content
    global $title, $content;
    $title = "TITRE_RECIPES_ADDFORM";
    ob_start();
        include '../app/views/recipes/addForm.php';
    $content = ob_get_clean();
}


function addAction(\PDO $connexion,  array $data = null)
{
    // Je demande au modèle d'ajouter la recette
    include_once '../app/models/recipesModel.php';
    
    $id = RecipesModel\insert($connexion, $data);

    // Si des ingrédients ont été cochés
    if (isset($data['ingredients']) && is_array($data['ingredients'])) {
        foreach ($data['ingredients'] as $ingredientId) {
            $quantity = $data['quantity-' . $ingredientId];
            RecipesModel\insertDishIngredients($connexion, $id, $ingredientId, $quantity);
        }
    }


    // Je redirige vers la liste des recettes
    header('location: ' . ADMIN_ROOT . '/recipes');
}
