<?php

namespace App\Controllers\UsersController;

use App\Models\UsersModel;

function dashboardAction(\PDO $connexion)
{
    // je charge la vue dashBoard dans $content
    global $title, $content;
    $title = TITRE_USERS_DASHBOARD;
    ob_start();
    include '../app/views/users/dashboard.php';
    $content = ob_get_clean();
}

function logoutAction()
{
    // Je tue la variable de session user

    unset($_SESSION['user']);

    // Je redirige vers le site public

    header('location: ' . PUBLIC_ROOT);

}