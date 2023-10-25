<?php

// Paramètres de connexion à la DB
define('DB_HOST', '127.0.0.1:3306');
define('DB_NAME', 'recipe_master');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');

// Initialisation des zones dynamiques
$title = '';
$content = '';

// Fichiers et Dossiers
define('PUBLIC_FOLDER', 'main');
define('ADMIN_FOLDER', 'admin');
define('DISPATCHER_NAME', 'index.php');

// Définissions des titres
define('TITRE_USERS_DASHBOARD', "Dashboard");
define('TITRE_RECIPES_INDEX', "Liste Des Recettes");
define('TITRE_USERS_INDEX', "Liste Des Users");
