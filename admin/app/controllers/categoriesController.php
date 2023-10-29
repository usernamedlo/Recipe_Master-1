<?php

namespace App\Controllers\CategoriesController;

use App\Models\CategoriesModel;

/**
 * Summary of App\Controllers\CategoriesController\indexAction
 * @param \PDO $connexion
 * @return void
 */
function indexAction(\PDO $connexion)
{
    include_once '../app/models/categoriesModel.php';
    $allCategories = CategoriesModel\findAllCategories($connexion);

    global $title, $content;
    $title = "Categories";
    ob_start();
    include '../app/views/categories/index.php';
    $content = ob_get_clean();

}
