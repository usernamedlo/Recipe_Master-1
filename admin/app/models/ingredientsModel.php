<?php

namespace App\Models\IngredientsModel;

function findAllIngredients(\PDO $connexion): array
{
    $sql = "SELECT id AS ingr_id,
            name AS ingr_name,
            unit AS ingr_unit
            FROM ingredients 
            ORDER BY ingr_name ASC;";

    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}