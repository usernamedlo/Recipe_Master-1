<?php

namespace App\Models\getAllIngredientsModel;

function getAllIngredients(\PDO $connexion): array {
    $sql = "SELECT id, name 
            FROM ingredients 
            ORDER BY name ASC;";

    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}