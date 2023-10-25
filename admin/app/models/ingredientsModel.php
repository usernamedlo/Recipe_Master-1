<?php

namespace App\Models\IngredientsModel;

function getAllIngredients(\PDO $connexion): array
{
    $sql = "SELECT id, name, unit
            FROM ingredients 
            ORDER BY created_at DESC;";

    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}