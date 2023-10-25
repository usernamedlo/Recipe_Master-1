<?php
// ROUTER PRINCIPAL

// if (isset($_SESSION['user'])) {
//     echo $_SESSION['user']['name'];
// } else {
//     echo "Guest";
// }

// ROUTE DES USERS
if (isset($_GET["users"])):
    include_once '../app/routeurs/users.php';
    //ROUTE PAR DEFAUT
else:
    include_once "../app/controllers/usersController.php";
    \App\Controllers\UsersController\dashboardAction($connexion);
endif;

